<?php

namespace App\Http\Controllers;

use App\Bridge\DTO\ErrorDTO;
use App\Http\Requests\DeleteTextractUploadStatusRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use TextractApi\Core\Services\Interfaces\Integrations\AWS\TextractIntegrationServiceInterface;

readonly class DeleteTextractUploadController
{
    public function __construct(private TextractIntegrationServiceInterface $textractIntegrationService)
    {
    }

    public function delete(DeleteTextractUploadStatusRequest $request): JsonResponse
    {
        if (! $this->textractIntegrationService->deleteUpload($request->getUpload())) {
            return new JsonResponse(new ErrorDTO('Unable to delete'), Response::HTTP_BAD_REQUEST);
        }

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
