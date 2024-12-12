<?php

namespace App\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileService
{
    private Client $client;
    private string $cloud;

    public function __construct(Client $client, string $cloud)
    {
        $this->client = $client;
        $this->cloud = $cloud;
    }

    public function uploadImage(UploadedFile $file): string
    {
        // Validar el archivo
        if (!in_array($file->getMimeType(), ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'], true)) {
            throw new FileException('Unsupported file type');
        }

        try {
            // Subir la imagen al servidor externo
            $response = $this->client->request('POST', $this->cloud, [
                'multipart' => [
                    [
                        'name' => 'image', // Este nombre debe coincidir con $_FILES['image'] en el script remoto
                        'contents' => fopen($file->getPathname(), 'rb'),
                        'filename' => $file->getClientOriginalName(),
                    ],
                ],
            ]);

            // Verificar si la respuesta fue exitosa
            if ($response->getStatusCode() !== 200) {
                throw new FileException('Failed to upload file to remote server');
            }

            // Decodificar la respuesta del servidor remoto
            $responseBody = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

            // Retornar el nombre del archivo subido
            return $responseBody['filename'];
        } catch (GuzzleException $e) {
            throw new FileException('Failed to upload file to remote server: ' . $e->getMessage());
        } catch (\JsonException $e) {
            throw new FileException('Failed to decode server response: ' . $e->getMessage());
        }
    }


    public function getImageUrl(string $fileName): string
    {
        $timestamp = time();
        return rtrim($this->cloud, '/') . '/' . ltrim($fileName, '/') . '?t=' . $timestamp;
    }

    public function setFileAsImage(UploadedFile $file): string
    {
        try {
            $fileName = $this->uploadImage($file);
            return json_encode([
                'id' => $fileName,
                'url' => $this->getImageUrl($fileName),
            ], JSON_THROW_ON_ERROR);
        } catch (FileException $e) {
            throw new FileException('Failed to upload file');
        } catch (\JsonException $e) {
            throw new FileException('Failed to encode response');
        }
    }


    public function listImages(): array
    {
        try {
            $response = $this->client->request('GET', $this->cloud);
            $responseBody = $response->getBody()->getContents();

            // Load the HTML response into DOMDocument
            $dom = new \DOMDocument();
            @$dom->loadHTML($responseBody);

            // Use DOMXPath to query the image filenames
            $xpath = new \DOMXPath($dom);
            $imageNodes = $xpath->query('//tr[td/a[contains(@href, ".png") or contains(@href, ".jpg") or contains(@href, ".jpeg") or contains(@href, ".gif")]]');

            $images = [];
            foreach ($imageNodes as $node) {
                $name = $xpath->query('td/a', $node)->item(0)->getAttribute('href');

                $images[] = [
                    'name' => $name,
                    'url' => $this->getImageUrl($name),
                ];
            }

            // Assign indices
            foreach ($images as $index => $image) {
                $images[$index]['id'] = $index + 1;
            }

            return $images;
        } catch (GuzzleException $e) {
            throw new \RuntimeException('Failed to fetch images from server');
        }
    }

}