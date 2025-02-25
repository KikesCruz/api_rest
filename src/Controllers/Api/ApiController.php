<?php

declare(strict_types = 1);

namespace App\Controllers\Api;
use App\Response\JsonResponse;

final class ApiController
{
    public function __invoke(): void
    {
        JsonResponse::response(
            [
                'product' => [
                    'id' => 1,
                    'name' => 'Producto 1'
                ]
            ]
        );
      
    }
}