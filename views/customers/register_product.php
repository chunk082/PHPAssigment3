<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require '../../db/database.php';
require '../../models/customer.php';
require '../../models/products.php';

$action = $_POST['action'] ?? '';
$error_message = '';
$success_message = '';

/* ============================
   NOT LOGGED IN → LOGIN VIEW
============================ */
if (!isset($_SESSION['customer'])) {

    if ($action === 'login') {
        $email = $_POST['email'] ?? '';
        $customer = Customer::getByEmail($email);

        if ($customer) {
            $_SESSION['customer'] = $customer;
            header('Location: register_product.php');
            exit;
        } else {
            $error_message = 'Invalid email address.';
        }
    }

    include '../partials/header.php';
    ?>

    <div class="container mt-5">
        <h2>Customer Login</h2>
        <p>You must log in before you can register a product.</p>

        <?php if ($error_message): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($error_message) ?>
            </div>
        <?php endif; ?>

        <form method="post">
            <input type="hidden" name="action" value="login">

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <button class="btn btn-primary">Login</button>
        </form>
    </div>

    <?php
    include '../partials/footer.php';
    exit;
}

/* ============================
   LOGGED IN → REGISTER PRODUCT
============================ */
$customer = $_SESSION['customer'];
$products = Product::getAll();

if ($action === 'register_product') {
    $productCode = $_POST['productCode'];

    Product::register($customer['customerID'], $productCode);

    $success_message = "Product <strong>$productCode</strong> was registered successfully.";
}

include '../partials/header.php';
?>

<div class="container-fluid mt-4 px-4">
    <div class="row">

        <aside class="col-lg-3 col-xl-2 mb-4">
            <?php include '../partials/sidebar.php'; ?>
        </aside>

        <main class="col-lg-9 col-xl-10">

            <h2 class="mb-4">Register Product</h2>

            <?php if ($success_message): ?>
                <div class="alert alert-success">
                    <?= $success_message ?>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">Register Product</div>
                <div class="card-body">

                    <form method="post">
                        <input type="hidden" name="action" value="register_product">

                        <div class="mb-3">
                            <label class="form-label">Customer</label>
                            <div class="form-control bg-light">
                                <?= htmlspecialchars($customer['firstName'] . ' ' . $customer['lastName']) ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Product</label>
                            <select name="productCode" class="form-select" required>
                                <?php foreach ($products as $product): ?>
                                    <option value="<?= $product['productCode'] ?>">
                                        <?= htmlspecialchars($product['name'] . ' ' . $product['version']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <button class="btn btn-primary">
                            Register Product
                        </button>
                    </form>

                </div>
            </div>

        </main>
    </div>
</div>

<?php include '../partials/footer.php'; ?>
