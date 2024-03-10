<?php

namespace TextractApi\Routing\Providers\Routes;

interface RouteServiceProviderInterface
{
    /**
     * Register routes during service bootstrapping.
     */
    public function boot(): void;

    /**
     * Get the router callable.
     */
    public function getRouteCallback(): \Closure;
}
