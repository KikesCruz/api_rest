<?php

declare(strict_types = 1);

namespace App\Services;

use PDO;
use PDOException;

final class DBConnection
{
    private static ?PDO $connection = null;

    private function __construct()
    {
    }

    public static function getConnection(): ?PDO
    {
        try {
            if (! self::$connection) {
                self::$connection = new PDO(
                    dsn: $_ENV['DB_DSN'],
                    username: $_ENV['DB_USERNAME'],
                    password: $_ENV['DB_PASSWORD'],
                );
            }
        } catch (PDOException $e) {
            echo match ($e->getCode()) {
                1049    => 'Base de datos no encontrada',
                1045    => 'Acceso denegado',
                2002    => 'Conexión rechazada',
                default => 'Error desconocido',
            };
        }

        return self::$connection;
    }

    private function __clone()
    {
    }
}
