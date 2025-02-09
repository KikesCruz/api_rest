<?php 

declare(strict_types=1);

namespace App\Controllers\Api;

final class ApiController
{
    public function __invoke():void{
        response()
            ->json([
                'message' => 'Esta es la entrada de nuestra api rest',
        ]);
    }

}