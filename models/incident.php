<?php
require_once __DIR__ . '/../db/database.php';

class Incident
{
    // Get all the incidents
    public static function getAll()
    {
        global $db;

        $sql = "SELECT * FROM incidents
                ORDER BY dateOpened DESC";

        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // create the new incidnets
    public static function create(
        $customerID,
        $productCode,
        $techID,
        $title,
        $description
    ) {
        global $db;

        $sql = "INSERT INTO incidents
                (customerID, productCode, techID, dateOpened, title, description)
                VALUES
                (:customerID, :productCode, :techID, NOW(), :title, :description)";

        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':customerID'  => $customerID,
            ':productCode' => $productCode,
            ':techID'      => $techID,
            ':title'       => $title,
            ':description' => $description
        ]);
    }

    // Close Incidents 
    public static function close($incidentID)
    {
        global $db;

        $sql = "UPDATE incidents
                SET dateClosed = NOW()
                WHERE incidentID = :incidentID";

        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':incidentID' => $incidentID
        ]);
    }
}
