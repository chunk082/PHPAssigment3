<?php include '../partials/header.php'; ?>

<pre><?php print_r($incident); ?></pre>


<div class="container-fluid mt-4 px-4">
    <div class="row">

        <!-- Added the sidebar -->
        <aside class="col-lg-3 col-xl-2 mb-4">
            <?php include '../partials/sidebar.php'; ?>
        </aside>

        <!-- This is the main content -->
        <main class="col-lg-9 col-xl-10">

            <h2 class="mb-4">Assign Incident</h2>

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
                    <p><strong>Title:</strong> <?= htmlspecialchars($incident['title']) ?></p>
                    <p><strong>Description:</strong><br>
                        <?= nl2br(htmlspecialchars($incident['description'])) ?>
                    </p>
                    <p><strong>Date Opened:</strong> <?= $incident['dateOpened'] ?></p>
                    <p><strong>Date Closed:</strong>
                        <?= $incident['dateClosed'] ?? 'Open' ?>
                    </p>
                </div>
            </div>

            <!-- Assign Form -->
            <div class="card">
                <div class="card-header">Assign Technician</div>
                <div class="card-body">

                    <form action="../controllers/incidents_controller.php" method="post">

                        <input type="hidden" name="action" value="assign_incident">
                        <input type="hidden" name="incidentID" value="<?= $incident['incidentID'] ?>">

                        <!-- Technician -->
                        <div class="mb-3">
                            <label for="techID" class="form-label">Technician</label>
                            <select name="techID" id="techID" class="form-select" required>
                                <option value="">-- Select Technician --</option>
                                <?php foreach ($technicians as $tech) : ?>
                                    <option value="<?= $tech['techID'] ?>"
                                        <?= ($incident['techID'] == $tech['techID']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($tech['firstName'] . ' ' . $tech['lastName']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
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

                        <!-- This is the button to save the -->
                        <div class="d-flex justify-content-between">
                            <a href="incident_list.php" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                Save Incident
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </main>
    </div>
</div>

<?php include '../partials/footer.php'; ?>
