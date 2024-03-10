<?php

namespace TextractApi\Routing\Providers\Concerns;

use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Routing\Router;

trait HasRouter
{
    /**
     * @throws BindingResolutionException
     */
    public function getRouter(): Router
    {
        return Container::getInstance()->make('router');
    }
}
