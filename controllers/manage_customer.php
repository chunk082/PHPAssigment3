<?php
// controllers/manage_customers.php

require '../db/database.php';
require '../models/Customer.php';

$customerModel = new Customer($db);
$customers = $customerModel->getAll();

require '../views/admin/manage_customers.php';
?>