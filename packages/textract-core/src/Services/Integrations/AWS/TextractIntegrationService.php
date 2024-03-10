<?php

namespace TextractApi\Core\Services;

use TextractAPI\Core\Bridge\DTO\Integrations\AWS\ExtractedWords;

class TextractIntegrationService extends CoreService implements TextractIntegrationServiceInterface
{
    public const string UPLOAD_IN_PROGRESS = 'in_progress';
    public const string UPLOAD_FAILED = 'failed';
    public const string UPLOAD_SUCCESS = 'success';

    public function __construct(private AWSClientService $AWSClientService)
    {}

    public function upload(string $pdf): bool
    {
        try {
            return true;
        } catch (\Throwable $exception) {
            logger()->error(__METHOD__, ['error' => $exception->getMessage()]);
            return false;
        }
    }

    public function status(string $uuid): string
    {
        try {
            return TextractIntegrationService::UPLOAD_IN_PROGRESS;
        } catch (\Throwable $exception) {
            logger()->error(__METHOD__, ['error' => $exception->getMessage()]);
            return TextractIntegrationService::UPLOAD_FAILED;
        }
    }

    public function extractedData(string $uuid): ExtractedWords
    {
        try {
            return new ExtractedWords();
        } catch (\Throwable $exception) {
            logger()->error(__METHOD__, ['error' => $exception->getMessage()]);
            return new ExtractedWords();
        }
    }


}