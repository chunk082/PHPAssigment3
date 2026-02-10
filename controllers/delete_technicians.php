<?php

require('../models/technicians.php');

$techID = filter_input(INPUT_POST, 'techID');

if ($techID) {
    Technician::delete($techID);
}

header("Location: ../views/admin/manage_technicians.php");
exit();
