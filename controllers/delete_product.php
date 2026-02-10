<?php

require('../models/products.php');

$productCode = filter_input(INPUT_POST, 'productCode');

if ($productCode) {
    Product::delete($productCode);
}

header("Location: ../views/admin/product_manager.php");
exit();
