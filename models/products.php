<?php
require_once __DIR__ . '/../db/database.php';

class Product
{
    // Gets all the products
    public static function getAll()
    {
        global $db;

        $sql = "SELECT productCode, name, version, releaseDate
                FROM products
                ORDER BY name";

        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Adds the products
    public static function add($productCode, $name, $version, $releaseDate)
    {
        global $db;

        $sql = "INSERT INTO products
                (productCode, name, version, releaseDate)
                VALUES (:productCode, :name, :version, :releaseDate)";

        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':productCode' => $productCode,
            ':name'        => $name,
            ':version'     => $version,
            ':releaseDate' => $releaseDate
        ]);
    }

    // Deletes the Product
    public static function delete($productCode)
    {
        global $db;

        $sql = "DELETE FROM products WHERE productCode = :productCode";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':productCode' => $productCode
        ]);
    }
}
