<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../models/customer.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    Customer::add(
        $_POST['firstName'],
        $_POST['lastName'],
        $_POST['email'],
        $_POST['phone']
    );

    header('Location: ../views/admin/manage_customer.php');
    exit;
}
