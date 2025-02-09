<?php 
declare(strict_types= 1);

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::get("/", function () {
    return "Hello world";
});