<?php

namespace TextractApi\Core\Providers;

use TextractApi\Core\Services\TextractIntegrationService;
use TextractApi\Core\Services\TextractIntegrationServiceInterface;

final class CoreServiceProvider extends ServiceProvider
{
    public array $singletons = [
        TextractIntegrationService::class,

    ];

    public array $bindings = [
        TextractIntegrationServiceInterface::class,

    ];
}
