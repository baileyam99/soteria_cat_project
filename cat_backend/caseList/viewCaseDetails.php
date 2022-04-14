
<?php
session_start();
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
header("Location: http://localhost:3000/casedetails?codename=$codename");
header('Content-type: application/json');
echo json_ecode($json_array);

?>

