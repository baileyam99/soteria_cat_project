<?php
require('../model/database.php');
require('../model/case_db.php');
require('../CORS.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = '404';
    }
}

// view cases
if ($action == 'view'){
    $cases = view();
    $json_array = array();
    while ($row = $cases->fetch_assoc()) {
        $json_array[] = $row;
    }
    header('Content-type: application/json');
    echo json_encode($json_array);
}

// get details of case
if ($action == 'Details'){
    $codename= filter_input(INPUT_POST, 'codename');
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
}

// view details of case
if ($action == 'viewdetails') {
    header('Content-type: application/json');
    include('details.json');
}

// search for a case
if ($action == 'search'){
    $param = filter_input(INPUT_POST, 'param');
    $srch = filter_input(INPUT_POST, 'srch');

    $result = search_case($param, $srch);
    $json_array = array();
    while ($row = $result->fetch_assoc()) {
        $json_array[] = $row;
    }
    $json = json_encode($json_array);
    file_put_contents("searchresults.json", $json);
    header("Location: http://localhost:3000/cases/case_list/search?search=$srch");
}

// view search results
if ($action === 'viewsearch'){
    header('Content-type: application/json');
    include('searchresults.json');
}

// get case types
if ($action == 'types') {
    global $db2;
    $query = "SELECT caseType FROM casetypes";
    $types = mysqli_query($db2, $query);

    $json_array = array();
    while ($row = $types->fetch_assoc()) {
        $json_array[] = $row;
    }
    header('Content-type: application/json');
    echo json_encode($json_array);
}

// get all usernames
if ($action == 'usernames') {
    global $db2;
    $query = "SELECT username FROM users";
    $usernames = mysqli_query($db2, $query);

    $json_array = array();
    while ($row = $usernames->fetch_assoc()) {
        $json_array[] = $row;
    }
    header('Content-type: application/json');
    echo json_encode($json_array);
}

// open new case
if ($action == 'opencase'){
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

        // Display the Case List page
        header("Location: http://localhost:3000/cases/case_list?added=$codename");
    }
}

// view case evidence
if ($action === 'viewevidence'){
    $codename = filter_input(INPUT_POST, 'codename');

    if ($codename != false) {
        header("Location: ../evidence/viewEvidence.php?codename=$codename");
    }
}

// view case physical inventory
if ($action === 'View Physical Inventory'){
    $codename = filter_input(INPUT_POST, 'codename');

    if ($codename != false) {
        header("Location: ../physInv/viewPhysEvidence.php?codename=$codename");
     }
}

// view a case's notes
if($action == 'View Notes'){
    $codename = filter_input(INPUT_POST, 'codename');
    header("Location: notes.php?codename=$codename");
}

// add a new note
if($action == 'Add Note'){
    $codename = filter_input(INPUT_POST, 'codename');
    $username = filter_input(INPUT_POST, 'username');
    $body = filter_input(INPUT_POST, 'body');
    $date = date('Y-m-d H:i:s');
    addNote($codename, $username, $date, $body);
    header("Location: notes.php?codename=$codename");
    
}

// page not found
if ($action == '404') {
    $error = "Error 404: Page Not Found!";
    include('../errors/error.php');
}