<?php

namespace App\Providers\Routes;

use App\Http\Controllers\TextractUploadStatusController;
use Symfony\Component\HttpFoundation\Request;
use TextractApi\Routing\Providers\Routes\RouteServiceProvider;

class TextractUploadStatusRouteServiceProvider extends RouteServiceProvider
{
    protected array $attributes = [
        'prefix' => '/api/textract/{uuid}/status',
        'middleware' => 'cache.headers:public;max_age=8600;etag',
    ];

    protected array $allowedMethods = [
        Request::METHOD_HEAD,
        Request::METHOD_OPTIONS,
        Request::METHOD_GET
    ];

    protected string $controller = TextractUploadStatusController::class;

    protected string $routeNamePrefix = 'textract.upload.status';
}
