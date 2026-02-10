<?php
require_once __DIR__ . '/../db/database.php';

class Technician
{
    // Get all the technicians
    public static function getAll()
    {
        global $db;

        $sql = "SELECT techID, firstName, lastName, email, phone FROM technicians";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add Technicians
    public static function add($firstName, $lastName, $email, $phone, $password)
    {
        global $db;

        $sql = "INSERT INTO technicians
                (firstName, lastName, email, phone, password)
                VALUES (:firstName, :lastName, :email, :phone, :password)";

        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':firstName' => $firstName,
            ':lastName'  => $lastName,
            ':email'     => $email,
            ':phone'     => $phone,
            ':password'  => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }

    // Deletes the Technians
    public static function delete($techID)
    {
        global $db;

        $sql = "DELETE FROM technicians WHERE techID = :techID";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':techID' => $techID
        ]);
    }
}
