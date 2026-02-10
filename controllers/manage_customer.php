<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// controllers/manage_customers.php

require '../db/database.php';
require '../models/customer.php';

$customerModel = new Customer($db);
$customers = $customerModel->getAll();


require '../views/admin/manage_customer.php';
?>