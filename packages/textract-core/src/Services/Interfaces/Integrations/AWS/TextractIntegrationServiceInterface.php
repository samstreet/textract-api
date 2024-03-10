<?php

namespace TextractApi\Core\Services\Interfaces\Integrations\AWS;

use TextractAPI\Core\Bridge\DTO\Integrations\AWS\ExtractedWords;
use TextractApi\Core\Services\Interfaces\CoreServiceInterface;
use TextractApi\Core\Storage\Entity\Uploads;

interface TextractIntegrationServiceInterface extends CoreServiceInterface
{
    /** Upload the base64 encoded pdf to the AWS textract service */
    public function upload(string $pdf): bool;

    /** Get a status for an upload */
    public function status(string $uuid): string;

    /** get the extracted words from an upload */
    public function extractedData(string $uuid): ExtractedWords;

    public function findByUUID(string $uuid): ?Uploads;
}
