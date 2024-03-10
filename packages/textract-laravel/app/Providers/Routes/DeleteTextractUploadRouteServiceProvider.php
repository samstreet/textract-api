<?php

namespace App\Providers\Routes;

use App\Http\Controllers\CreateTextractUploadController;
use App\Http\Controllers\DeleteTextractUploadController;
use Symfony\Component\HttpFoundation\Request;
use TextractApi\Routing\Providers\Routes\RouteServiceProvider;

class DeleteTextractUploadRouteServiceProvider extends RouteServiceProvider
{
    protected array $attributes = [
        'prefix' => '/api/textract',
        'middleware' => 'cache.headers:public;max_age=8600;etag',
    ];

    protected array $allowedMethods = [
        Request::METHOD_HEAD,
        Request::METHOD_OPTIONS,
        Request::METHOD_DELETE,
    ];

    protected string $controller = DeleteTextractUploadController::class;

    protected string $routeNamePrefix = 'textract.upload';
}
