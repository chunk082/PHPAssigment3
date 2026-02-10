<?php
require_once __DIR__ . '/../db/database.php';

class Country
{
    public static function getAll()
    {
        global $db;

        $sql = "SELECT countryCode, countryName FROM countries ORDER BY countryName";

        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
