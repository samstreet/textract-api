<?php

namespace TextractApi\Core\Services;

use Aws\AwsClient;

final class AWSClientService
{
    private AwsClient $client;

    public function __construct()
    {
    }
}
