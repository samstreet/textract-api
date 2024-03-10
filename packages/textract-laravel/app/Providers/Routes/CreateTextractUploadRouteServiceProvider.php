<?php

namespace App\Providers\Routes;

use App\Http\Controllers\CreateTextractUploadController;
use TextractApi\Routing\Providers\Routes\RouteServiceProvider;
use Symfony\Component\HttpFoundation\Request;

class CreateTextractUploadRouteServiceProvider extends RouteServiceProvider
{
    protected array $attributes = [
        'prefix' => '/api/textract',
        'middleware' => null,
    ];

    protected array $allowedMethods = [
        Request::METHOD_HEAD,
        Request::METHOD_OPTIONS,
        Request::METHOD_POST,
    ];

    protected string $controller = CreateTextractUploadController::class;

    protected string $routeNamePrefix = 'textract.upload';
}
