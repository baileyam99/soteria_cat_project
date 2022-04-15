
<?php
session_start();
require('../CORS.php');
require('../model/database.php');
require('../model/case_db.php');
$codename= filter_input(INPUT_GET, 'codename');

global $db2;
$query = "SELECT * FROM caselist WHERE codename = " . "'" . $codename . "'";
$case = mysqli_query($db2, $query);


$json_array = array();
while ($row = $case->fetch_assoc()) {
    $json_array[] = $row;
}
$json = json_encode($json_array);
file_put_contents("details.json", $json);
header("Location: http://localhost:3000/cases/casedetails?codename=$codename");

?>

