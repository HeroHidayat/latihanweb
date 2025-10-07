<?php
// db.php - koneksi database
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'db_smk';


$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($mysqli->connect_errno) {
http_response_code(500);
echo "Gagal koneksi ke database: " . $mysqli->connect_error;
exit;
}
$mysqli->set_charset('utf8mb4');
?>