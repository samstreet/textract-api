<?php

namespace App\Http\Controllers;

use App\Bridge\DTO\Integrations\AWS\TextractStatusDTO;
use App\Http\Requests\TextractUploadStatusRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

readonly class TextractUploadStatusController
{
    public function get(TextractUploadStatusRequest $request): JsonResponse
    {
        return new JsonResponse(
            new TextractStatusDTO($request->getUpload()->status, $request->getUpload()->uuid),
            Response::HTTP_OK
        );
    }
}
