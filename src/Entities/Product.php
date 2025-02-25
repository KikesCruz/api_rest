<?php 

use App\Services\DBConnection;
use PDO;

final class Product
{
    private PDO $db;

    public function __construct()
    {
        $this -> db = DBConnection::getConnection();

        $this -> createTable();
    }

    private function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS products(
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            description VARCHAR(255) NOT NULL,
            price  DECIMAL(10,2) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        $this -> db -> exec($sql);
    }

    private function create(array $data): false | string {
        $sql = "INSERT INTO products (name, description, price) VALUES (:name, :description, :price)";

        $stmt = $this -> db -> prepare($sql);
        $stmt->execute($data);

        return $this -> db -> lastInsertId();

    }

    public function get(): array
    {
        $sql = "SELECT * FROM products";
        $stmt = $this -> db -> prepare($sql);
        $stmt -> execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id): array|false
    {
        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $this -> db -> prepare($sql);
        $stmt -> execute(['id' => $id]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete(int $id): void
    {
        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $this -> db -> prepare($sql);
        $stmt -> execute(['id' => $id]);
        
        $stmt->fetch(PDO::FETCH_ASSOC);
    }


}