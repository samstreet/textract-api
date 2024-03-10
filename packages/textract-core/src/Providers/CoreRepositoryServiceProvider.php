<?php

namespace TextractApi\Core\Providers;

use TextractApi\Core\Storage\Repository\CoreRepository;
use TextractAPI\Core\Storage\Repository\Integrations\AWS\TextractIntegrationRepository;
use TextractAPI\Core\Storage\Repository\Integrations\AWS\TextractIntegrationRepositoryInterface;
use TextractApi\Core\Storage\Repository\Interfaces\CoreRepositoryInterface;

class CoreRepositoryServiceProvider extends ServiceProvider
{
    public array $singletons = [
        CoreRepositoryInterface::class => CoreRepository::class,
        TextractIntegrationRepositoryInterface::class => TextractIntegrationRepository::class
    ];

    public function provides(): array
    {
        return [
            CoreRepositoryInterface::class,
            TextractIntegrationRepositoryInterface::class
        ];
    }
}
