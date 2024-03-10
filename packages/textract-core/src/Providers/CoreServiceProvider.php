<?php

namespace TextractApi\Core\Providers;

use TextractApi\Core\Services\Integrations\AWS\TextractIntegrationService;
use TextractApi\Core\Services\Interfaces\Integrations\AWS\TextractIntegrationServiceInterface;

final class CoreServiceProvider extends ServiceProvider
{
    public array $singletons = [
        TextractIntegrationServiceInterface::class => TextractIntegrationService::class,

    ];

    public function provides(): array
    {
        return [
            TextractIntegrationServiceInterface::class
        ];
    }
}
