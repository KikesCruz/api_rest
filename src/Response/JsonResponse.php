<?php 
declare(strict_types = 1);

namespace App\Response;

final class JsonResponse
{
    private const SUCCESS = 'success';
    private const ERROR = 'error';

    private static function statusByHttpCode(int $httpCode): string
    {
        if($httpCode >= 400){
            return self::ERROR;
        }

        return self::SUCCESS;
    }

    private static function success(?array $data = null ){

        if(!$data){
            response()
            ->httpCode(204)
            ->json([
                'status' => self::SUCCESS
            ]);
        }

        response()
        ->httpCode(204)
        ->json([
            'status' => self::SUCCESS,
            'data' => $data,
        ]);
    }

    private static function error(string $message, int $httpCode = 400){
        response()
        ->httpCode($httpCode)
        ->json([
            'status' => self::ERROR,
            'message' => $message,
        ]);
    }

    public static function response(?array $data = null, int $httpCode = 200){
        if(self::statusByHttpCode($httpCode) === self::SUCCESS){
            self::success($data);
        }else{
            self::error($data['message'], $httpCode);
        }
    }
}
