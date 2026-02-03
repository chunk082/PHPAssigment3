<?php include '../partials/header.php'; ?>

<div class="container-fluid mt-4 px-4">
    <div class="row">

        <!-- This is the sidebar -->
        <div class="col-lg-2">
            <?php include '../partials/sidebar.php'; ?>
        </div>

        <!-- This is the main content -->
        <main class="col-lg-10">
            <div class="card shadow-sm p-4">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="mb-0">Customer List</h2>
                    <button class="btn btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#customerModal">
                        Add Customer
                    </button>
                </div>

                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($customers)): ?>
                            <tr>
                                <td colspan="3" class="text-center text-muted">
                                    No customers found.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($customers as $customer): ?>
                                <tr>
                                    <td>
                                        <?= htmlspecialchars($customer['firstName'] . ' ' . $customer['lastName']) ?>
                                    </td>
                                    <td><?= htmlspecialchars($customer['email']) ?></td>
                                    <td><?= htmlspecialchars($customer['phone']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>

            </div>
        </main>

    </div>
</div>

<!-- Added Modal that is associated with bootstrap -->
<div class="modal fade" id="customerModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <form method="post" action="../../controllers/add_customer.php" class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Add Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">First Name</label>
            <input name="firstName" class="form-control" required>
          </div>

          <div class="col-md-6">
            <label class="form-label">Last Name</label>
            <input name="lastName" class="form-control" required>
          </div>

          <div class="col-md-6">
            <label class="form-label">Email</label>
            <input name="email" type="email" class="form-control" required>
          </div>

          <div class="col-md-6">
            <label class="form-label">Phone</label>
            <input name="phone" class="form-control">
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button class="btn btn-primary">Save Customer</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Cancel
        </button>
      </div>

    </form>
  </div>
</div>

<?php include '../partials/footer.php'; ?>
