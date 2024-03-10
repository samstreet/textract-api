<?php

namespace TextractApi\Core\Providers;

use TextractApi\Core\Storage\Repository\Repository;
use TextractApi\Core\Storage\Repository\RepositoryInterface;

class CoreRepositoryServiceProvider extends ServiceProvider
{
    public array $singletons = [
        Repository::class
    ];

    public array $bindings = [
        RepositoryInterface::class
    ];
}