<?php require __DIR__ . '/views/partials/header.php'; ?>

<div class="container-fluid px-4 mt-4">
    <div class="row g-4">

        <!-- Added Sidebar to the file -->
        <aside class="col-lg-3 col-xl-2">
            <?php include 'views/partials/sidebar.php'; ?>
        </aside>

        <!-- This is the main content -->
        <main class="col-lg-9 col-xl-10">
            <div class="card shadow-sm p-4">
                <p class="text-muted mb-0">
                    Select an option from the menu to begin.
                </p>
            </div>
        </main>

    </div>
</div>

<?php include 'views/partials/footer.php'; ?>
