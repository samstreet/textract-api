<?php

namespace TextractApi\Routing\Providers\Routes;

use Illuminate\Support\ServiceProvider;
use TextractApi\Routing\Providers\Concerns;
use Symfony\Component\HttpFoundation\Request;

class RouteServiceProvider extends ServiceProvider implements RouteServiceProviderInterface
{
    use Concerns\HasRouter;

    protected array $attributes = [];
    protected array $allowedMethods = [];
    protected string $controller;
    protected string $routeNamePrefix;

    private array $approvedMethods = [
        Request::METHOD_HEAD,
        Request::METHOD_GET,
        Request::METHOD_OPTIONS,
        Request::METHOD_PATCH,
        Request::METHOD_POST,
        Request::METHOD_PUT,
        Request::METHOD_DELETE,
    ];

    public function boot(): void
    {
        $this->getRouter()->group($this->attributes, $this->getRouteCallback());
    }

    public function getRouteCallback(): \Closure
    {
        return function () {
            foreach ($this->allowedMethods as $method) {
                if ((!in_array($method, $this->approvedMethods))) {
                    logger()->error($this->controller . ' Contains Unsupported ' . $method . ' Method');
                }
                $this->getRouter()->addRoute($method, '/', [
                    'uses' => $this->controller . '@' . strtolower($method),
                    'as' => $this->routeNamePrefix . '.' . strtolower($method),
                    'methods' => implode(", ", $this->allowedMethods),
                ]);
            }
        };
    }

    protected function getRouteMethods($class): string
    {
        $m = $this->getApprovedMethods();
        $items = collect(get_class_methods($class))->reject(function ($value) use ($m) {
            return !in_array(strtoupper($value), $m);
        });

        return implode(', ', $items->toArray());
    }

    public function getApprovedMethods(): array
    {
        return $this->approvedMethods;
    }
}
