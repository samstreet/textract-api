<?php

namespace App\Providers\Routes;

use App\Http\Controllers\TextractUploadController;
use Symfony\Component\HttpFoundation\Request;
use TextractApi\Routing\Providers\Routes\RouteServiceProvider;

class TextractUploadRouteServiceProvider extends RouteServiceProvider
{
    protected array $attributes = [
        'prefix' => '/api/textract/{uuid}',
        'middleware' => null,
    ];

    protected array $allowedMethods = [
        Request::METHOD_HEAD,
        Request::METHOD_OPTIONS,
        Request::METHOD_GET,
        Request::METHOD_DELETE,
    ];

    protected string $controller = TextractUploadController::class;

    protected string $routeNamePrefix = 'textract.upload.singular';
}