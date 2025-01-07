<?php

namespace App\Service;

use App\Entity\Post;
use App\Entity\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileService
{
    private Client $client;
    private string $cloud;
    private ParameterBagInterface $params;

    public function __construct(Client $client, string $cloud, ParameterBagInterface $params)
    {
        $this->client = $client;
        $this->cloud = $cloud;
        $this->params = $params;
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

    public function setImagesUrl(array $posts): void
    {
        $imageServerUrl = $this->params->get('image_server_url');
        foreach ($posts as $post) {
            $post->setImgUrl($imageServerUrl);
            error_log($post->getImgUrl());
        }
    }

}