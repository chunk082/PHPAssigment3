<?php
require_once '../models/technicians.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    Technician::add(
        $_POST['firstName'],
        $_POST['lastName'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['password']
    );

    header('Location: ../views/admin/manage_technicians.php');
    exit;
}
