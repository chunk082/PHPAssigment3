<?php
require_once '../models/incident.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    Incident::create(
        $_POST['customerID'],
        $_POST['productCode'],
        $_POST['techID'],
        $_POST['title'],
        $_POST['description']
    );

    header('Location: ../views/admin/display_incident.php');
    exit;
}
