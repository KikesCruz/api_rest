<?php

declare(strict_types=1);

use Pecee\SimpleRouter\SimpleRouter as Router;

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../routes/api.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

Router::setDefaultNamespace('\App\Controllers\Api');
Router::start();
