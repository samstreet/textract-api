<?php

namespace App\Http\Controllers;

use App\Bridge\DTO\ErrorDTO;
use App\Bridge\DTO\Integrations\AWS\TextractUploadDTO;
use App\Http\Requests\TextractUploadRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use TextractApi\Core\Services\Interfaces\Integrations\AWS\TextractIntegrationServiceInterface;

readonly class CreateTextractUploadController
{
    public function __construct(private TextractIntegrationServiceInterface $textractIntegrationService)
    {
    }

    public function post(TextractUploadRequest $request): JsonResponse
    {
        if (! $upload = $this->textractIntegrationService->upload($request->getFileAsBase64EncodedString())) {
            return new JsonResponse(new ErrorDTO('An error occurred'), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return new JsonResponse(new TextractUploadDTO($upload), Response::HTTP_CREATED);
    }
}
