<?php

namespace TextractApi\Core\Services\Integrations\AWS;

use Aws\AwsClient;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

final class AWSClientService
{
    private AwsClient $client;

    public function __construct()
    {
    }

    public function extractPDFContent(string $pdf): Collection
    {
        $response = $this->client->analyzeDocument([
            'Document' => [
                'Bytes' => $pdf
            ],
            'FeatureTypes' => ['TABLES', 'FORMS', 'QUERIES'],
        ]);

        return new Collection();
    }
}
