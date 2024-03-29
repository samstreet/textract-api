<?php

namespace App\Providers\Routes;

use App\Http\Controllers\CreateTextractUploadController;
use TextractApi\Routing\Providers\Routes\RouteServiceProvider;
use Symfony\Component\HttpFoundation\Request;

class CreateTextractUploadRouteServiceProvider extends RouteServiceProvider
{
    protected array $attributes = [
        'prefix' => '/api/textract',
        'middleware' => 'cache.headers:public;max_age=8600;etag',
    ];

    protected array $allowedMethods = [
        Request::METHOD_HEAD,
        Request::METHOD_OPTIONS,
        Request::METHOD_POST,
    ];

    protected string $controller = CreateTextractUploadController::class;

    protected string $routeNamePrefix = 'textract.upload';
}
