<?php

declare(strict_types = 1);

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::group(
    ['prefix' => 'api'],
    function (): void {
        Router::get('/', 'ApiController@__invoke');
    }
);
