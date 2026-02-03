<?php
// models/Customer.php

class Customer
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    // Gets all the customers
    public function getAll()
    {
        $sql = "SELECT customerID, firstName, lastName, email, phone
                FROM customers
                ORDER BY lastName, firstName";

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // create customer record
    public function create($firstName, $lastName, $email, $phone)
    {
        $sql = "INSERT INTO customers (firstName, lastName, email, phone)
                VALUES (:firstName, :lastName, :email, :phone)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':firstName' => $firstName,
            ':lastName'  => $lastName,
            ':email'     => $email,
            ':phone'     => $phone
        ]);
    }
}
