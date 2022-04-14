
<?php
require('../model/database.php');
require('../model/case_db.php');
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'under_construction';
    }
}

if ($action == 'view'){
    $cases = view();
    $json_array = array();
    while ($row = $cases->fetch_assoc()) {
        $json_array[] = $row;
    }
    header('Content-type: application/json');
    echo json_encode($json_array);
}

if($action == 'Details'){
    $codename = filter_input(INPUT_POST, 'codename');
    $case = selectCase($codename);


    if ($codename != false) {
       $json_array = array();
       while ($row = $case->fetch_assoc()) {
           $json_array[] = $row;
        }

        header("Location: http://localhost:3000/casedetails");
        header('Content-type: application/json');
        echo json_encode($json_array);
    }

}
if($action == 'opencase'){
    // Get the product data
    $codename = filter_input(INPUT_POST, 'codename');
    $clientName = filter_input(INPUT_POST, 'clientname');
    $casetype = filter_input(INPUT_POST, 'casetype');
    $lead = filter_input(INPUT_POST, 'lead');
    $description = filter_input(INPUT_POST, 'description');

    // Validate inputs
    if ($codename == null || $clientName == null) {
        $error = "Invalid case data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        $open_date = date('Y-m-d H:i:s');
        openCase($codename, $clientName, $casetype, $lead, $description, $open_date);

        // Display the Product List page
        include('caseListView.php');
    }
}

if ($action === 'viewevidence'){
    $codename = filter_input(INPUT_POST, 'codename');

    if ($codename != false) {
        header("Location: ../evidence/viewEvidence.php?codename=$codename");
    }
}

if ($action === 'View Physical Inventory'){
    $codename = filter_input(INPUT_POST, 'codename');

    if ($codename != false) {
        header("Location: ../physInv/viewPhysEvidence.php?codename=$codename");
     }
}


if($action == 'View Notes'){
    $codename = filter_input(INPUT_POST, 'codename');
    header("Location: notes.php?codename=$codename");
}

if($action == 'Add Note'){
    $codename = filter_input(INPUT_POST, 'codename');
    $username = filter_input(INPUT_POST, 'username');
    $body = filter_input(INPUT_POST, 'body');
    $date = date('Y-m-d H:i:s');
    addNote($codename, $username, $date, $body);
    header("Location: notes.php?codename=$codename");
    
}

if ($action == 'under_construction') {
    include('../under_construction.php');
}