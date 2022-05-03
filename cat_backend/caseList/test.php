<?php
require('../CORS.php');

$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);
$codename = $_POST['codename'];

$case = selectCase($codename);
    
$json_array = array();
while ($row = $case->fetch_assoc()) {
    $json_array[] = $row;
}
header('Content-type: application/json');
echo json_encode($json_array);

?>