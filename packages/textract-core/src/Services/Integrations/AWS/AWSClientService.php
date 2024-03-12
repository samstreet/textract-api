<?php

namespace TextractApi\Core\Services\Integrations\AWS;

use Aws\AwsClient;

final class AWSClientService
{
    private AwsClient $client;

    public function __construct()
    {
        $this->client = new AwsClient([]);
    }

    public function extractPDFContent(string $pdf)
    {

    }
}
