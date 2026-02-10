<?php

require_once '../models/products.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    Product::add(
        $_POST['productCode'],
        $_POST['name'],
        $_POST['version'],
        $_POST['releaseDate']
    );

    header('Location: ../views/admin/product_manager.php');
    exit;
}
