<?php include '../partials/header.php'; ?>

<div class="container-fluid mt-4 px-4">
    <div class="row">

        <aside class="col-lg-3 col-xl-2 mb-4">
            <?php include '../partials/sidebar.php'; ?>
        </aside>

        <main class="col-lg-9 col-xl-10">

            <h2 class="mb-4">Register Product</h2>

            <?php if (!empty($error_message)) : ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($error_message) ?>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">Register Product</div>
                <div class="card-body">

                    <form action="../controllers/customers_controller.php" method="post">
                        <input type="hidden" name="action" value="register_product">
                        <input type="hidden" name="customerID" value="<?= $customer['customerID'] ?>">

                        <div class="mb-3">
                            <label class="form-label">Customer</label>
                            <div class="form-control bg-light">
                                <?= htmlspecialchars($customer['firstName'] . ' ' . $customer['lastName']) ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="productCode" class="form-label">Product</label>
                            <select name="productCode" id="productCode" class="form-select" required>
                                <?php foreach ($products as $product) : ?>
                                    <option value="<?= $product['productCode'] ?>">
                                        <?= htmlspecialchars($product['name'] . ' ' . $product['version']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Register Product
                        </button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include '../partials/footer.php'; ?>
