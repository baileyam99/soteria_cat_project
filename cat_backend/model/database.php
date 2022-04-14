<?php 
require('../CORS.php');

$dsn2 = 'localhost';
$dbn = 'soteria_cat';
$username = 'cliff';
$password = 'pass';

global $db2;
$db2 = new mysqli($dsn2, $username, $password, $dbn);

$dsn = 'mysql:host=localhost;dbname=soteria_cat';

try {
    $db = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
}

?>