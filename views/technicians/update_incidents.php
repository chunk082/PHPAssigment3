<?php include '../partials/header.php'; ?>

<div class="container-fluid mt-4 px-4">
    <div class="row">

        <!-- This is the sidebar -->
        <aside class="col-lg-3 col-xl-2 mb-4">
            <?php include '../partials/sidebar.php'; ?>
        </aside>

        <!-- Main Content of the site -->
        <main class="col-lg-9 col-xl-10">

            <h2 class="mb-4">Update Incident</h2>

            <?php if (!empty($error_message)) : ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($error_message) ?>
                </div>
            <?php endif; ?>

            <!-- Incident Details -->
            <div class="card mb-4">
                <div class="card-header">Incident Details</div>
                <div class="card-body">
                    <p><strong>Incident ID:</strong> <?= $incident['incidentID'] ?></p>
                    <p><strong>Customer:</strong>
                        <?= htmlspecialchars($incident['customerFirstName'] . ' ' . $incident['customerLastName']) ?>
                    </p>
                    <p><strong>Product:</strong> <?= htmlspecialchars($incident['productCode']) ?></p>
                    <p><strong>Title:</strong> <?= htmlspecialchars($incident['title']) ?></p>
                    <p><strong>Date Opened:</strong> <?= $incident['dateOpened'] ?></p>
                    <p><strong>Date Closed:</strong>
                        <?= $incident['dateClosed'] ?? 'Open' ?>
                    </p>
                </div>
            </div>

            <!-- Update Form -->
            <div class="card">
                <div class="card-header">Update Incident</div>
                <div class="card-body">

                    <form action="../controllers/incidents_controller.php" method="post">

                        <input type="hidden" name="action" value="update_incident">
                        <input type="hidden" name="incidentID" value="<?= $incident['incidentID'] ?>">

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description"
                                      id="description"
                                      class="form-control"
                                      rows="5"
                                      required><?= htmlspecialchars($incident['description']) ?></textarea>
                        </div>

                        <!-- Close Incident -->
                        <div class="form-check mb-3">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="closeIncident"
                                   id="closeIncident"
                                   value="1"
                                <?= $incident['dateClosed'] ? 'checked disabled' : '' ?>>
                            <label class="form-check-label" for="closeIncident">
                                Close this incident
                            </label>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                Update Incident
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </main>
    </div>
</div>

<?php include '../partials/footer.php'; ?>
