<?php

namespace TextractApi\Core\Providers;

use TextractApi\Routing\Providers\Concerns;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

abstract class ServiceProvider extends BaseServiceProvider
{
    use Concerns\HasRouter;

    public array $singletons = [];
    public array $bindings = [];

    public function provides(): array
    {
        return array_merge(array_values($this->singletons), array_values($this->bindings));
    }
}
