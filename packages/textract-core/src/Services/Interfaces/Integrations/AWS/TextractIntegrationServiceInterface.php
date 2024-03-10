<?php

namespace TextractApi\Core\Services;

use TextractAPI\Core\Bridge\DTO\Integrations\AWS\ExtractedWords;
use TextractApi\Core\Services\Interfaces\CoreServiceInterface;

interface TextractIntegrationServiceInterface extends CoreServiceInterface
{
    /** Upload the base64 encoded pdf to the AWS textract service */
    public function upload(string $pdf): bool;

    /** Get a status for an upload */
    public function status(string $uuid): string;

    /** get the extracted words from an upload */
    public function extractedData(string $uuid): ExtractedWords;
}
