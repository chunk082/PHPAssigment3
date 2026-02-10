<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../db/database.php';
require '../models/customer.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    Customer::update(
        $_POST['customerID'],
        $_POST['firstName'],
        $_POST['lastName'],
        $_POST['email'],
        $_POST['phone'] ?? null,
        $_POST['address'] ?? null,
        $_POST['city'] ?? null,
        $_POST['state'] ?? null,
        $_POST['postalCode'] ?? null,
        $_POST['countryCode'] ?? null
    );

    header('Location: ../views/admin/manage_customer.php');
    exit;
}
