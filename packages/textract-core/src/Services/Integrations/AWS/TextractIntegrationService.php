<?php

namespace TextractApi\Core\Services\Integrations\AWS;

use Psy\Exception\ThrowUpException;
use TextractAPI\Core\Bridge\DTO\Integrations\AWS\ExtractedWords;
use TextractApi\Core\Services\Interfaces\Integrations\AWS\TextractIntegrationServiceInterface;
use TextractApi\Core\Services\CoreService;
use TextractApi\Core\Storage\Entity\Uploads;
use TextractAPI\Core\Storage\Repository\Integrations\AWS\TextractIntegrationRepositoryInterface;

class TextractIntegrationService extends CoreService implements TextractIntegrationServiceInterface
{
    public const string UPLOAD_IN_PROGRESS = 'in_progress';
    public const string UPLOAD_FAILED = 'failed';
    public const string UPLOAD_SUCCESS = 'success';

    public function __construct(private readonly TextractIntegrationRepositoryInterface $repository)
    {
    }

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
            $upload = $this->repository->findUsingUUID($uuid);
            return $upload->status;
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

    public function findByUUID(string $uuid): ?Uploads
    {
        try {
            return $this->repository->findUsingUUID($uuid);
        } catch (\Throwable $exception) {
            logger()->error(__METHOD__, ['error' => $exception->getMessage()]);
            return null;
        }
    }
}
