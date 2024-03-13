<?php

namespace App\Http\Controllers;

use App\Bridge\DTO\ErrorDTO;
use App\Bridge\DTO\Integrations\AWS\TextractProcessDocumentDTO;
use App\Bridge\DTO\Integrations\AWS\TextractUploadDTO;
use App\Http\Requests\TextractUploadRequest;
use App\Jobs\Integrations\AWS\ProcessDocument;
use Aws\S3\S3Client;
use Aws\Textract\TextractClient;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;
use TextractApi\Core\Services\Integrations\AWS\TextractIntegrationService;
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

        /** @var S3Client $s3Client */
        $s3Client = App::make('aws')->createClient('S3', ['region' => 'eu-west-1']);
        $s3Client->upload("effect-test-uploads", "$upload->uuid.pdf", file_get_contents($request->file('pdf')));

        ProcessDocument::dispatch(
            new TextractProcessDocumentDTO(
                $upload,
                $request->getFileAsBase64EncodedString()
            )
        )->onQueue('tapi_default');

        return new JsonResponse(new TextractUploadDTO($upload), Response::HTTP_CREATED);
    }
}
