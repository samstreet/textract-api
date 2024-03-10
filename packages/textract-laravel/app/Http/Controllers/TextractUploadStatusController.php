<?php

namespace App\Http\Controllers;

use App\Bridge\DTO\Integrations\AWS\TextractStatusDTO;
use App\Http\Requests\TextractUploadStatusRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use TextractApi\Core\Services\Interfaces\Integrations\AWS\TextractIntegrationServiceInterface;

class TextractUploadStatusController
{
    public function __construct(private readonly TextractIntegrationServiceInterface $textractIntegrationService)
    {
    }

    public function get(TextractUploadStatusRequest $request): JsonResponse
    {
        return new JsonResponse(
            new TextractStatusDTO($request->getUpload()->status, $request->getUpload()->uuid),
            Response::HTTP_OK
        );
    }

    public function delete(TextractUploadStatusRequest $request): JsonResponse
    {
        return new JsonResponse();
    }
}
