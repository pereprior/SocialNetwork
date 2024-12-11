<?php

namespace App\Controller;

use App\Service\FileService;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/image')]
class ApiImageController
{
    private FileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    #[Route('/upload', name: 'api_upload_image', methods: ['POST'])]
    public function uploadImage(Request $request): JsonResponse
    {
        $file = $request->files->get('image');

        if (!$file) {
            return new JsonResponse(['error' => 'No file provided'], Response::HTTP_BAD_REQUEST);
        }

        $fileName = $this->fileService->uploadImage($file);
        $id = uniqid('', true);
        return new JsonResponse(['id' => $id, 'url' => $this->fileService->getImageUrl($fileName)], Response::HTTP_OK);
    }

    #[Route('/{id}/', name: 'api_view_image', methods: ['GET'])]
    public function viewImage(int $id): BinaryFileResponse
    {
        $images = $this->fileService->listImages();
        $image = array_filter($images, static fn($image) => $image['id'] === $id);
        error_log(print_r($image, true));

        if (empty($image)) {
            throw new NotFoundHttpException('Image not found');
        }

        $filePath = array_values($image)[0]['url'];
        return new BinaryFileResponse($filePath);
    }

    #[Route('/', name: 'api_images', methods: ['GET'])]
    public function listImages(): JsonResponse
    {
        $images = $this->fileService->listImages();
        return new JsonResponse(['images' => $images], Response::HTTP_OK);
    }
}