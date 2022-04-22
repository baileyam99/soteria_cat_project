<?php
require('../model/database.php');
require('../model/physInv_db.php');
require('../CORS.php');

$action = filter_input(INPUT_POST, 'action');

if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'under_construction';
    }
}

// Get Physical Evidence
if($action == 'getevi'){
    $codename = filter_input(INPUT_GET, 'codename');
    $result = viewPhysEvidence($codename);

    $json_array = array();
    while ($row = $result->fetch_assoc()) {
        $json_array[] = $row;
    }
    $json = json_encode($json_array);
    file_put_contents("phyevidence.json", $json);
    header("Location: http://localhost:3000/cases/view_physical_evidence?codename=$codename");
}

// View Physical Evidence
if ($action == 'viewevi') {
    header('Content-type: application/json');
    include('phyevidence.json');
}

if ($action === 'Return to List'){
    $codename = filter_input(INPUT_POST, 'codename');

    if ($codename != false) {
        header("Location: viewPhysEvidence.php?codename=$codename");
     }
}

if ($action === 'Intake Physical Evidence'){
    $codename = filter_input(INPUT_POST, 'codename');
    header("Location: addPhysEvidence.php?codename=$codename");
}

if ($action === 'Add Physical Evidence'){
    $codename = filter_input(INPUT_POST, 'codename');
    $identifier = filter_input(INPUT_POST, 'identifier');
    $description = filter_input(INPUT_POST, 'description');
    $disposition = filter_input(INPUT_POST, "disposition");
    $username = filter_input(INPUT_POST, 'username');


    // $timestamp = strtotime($modDate);
    // $date = $date->setTimestamp($timestamp);
    // $modDate= $date->format('F j, Y, g:i a');

    addPhysEvidence($codename, $identifier, $description, $disposition, $username);
    header("Location: viewPhysEvidence.php?codename=$codename");
}

if ($action === 'Edit'){
    $codename = filter_input(INPUT_POST, 'codename');
    $idNum = filter_input(INPUT_POST, 'idNum');
    $identifier = filter_input(INPUT_POST, 'identifier');
    $description = filter_input(INPUT_POST, 'description');
    $disposition = filter_input(INPUT_POST, 'disposition');
    $collector = filter_input(INPUT_POST, 'collector');
    include('editPhysEvidence.php');
}

if ($action === 'Update'){
    $codename = filter_input(INPUT_POST, 'codename');
    $idNum = filter_input(INPUT_POST, 'idNum');
    $identifier = filter_input(INPUT_POST, 'identifier');
    $description = filter_input(INPUT_POST, 'description');
    $disposition = filter_input(INPUT_POST, 'disposition');
    $collector = filter_input(INPUT_POST, 'username');
    updatePhysEvidence($codename, $idNum, $identifier, $description, $disposition, $collector);
    header("Location: viewPhysEvidence.php?codename=$codename");
}

if ($action === 'Delete'){
    $codename = filter_input(INPUT_POST, 'codename');
    $idNum = filter_input(INPUT_POST, 'idNum');
    deletePhysEvidence($codename, $idNum);
    header("Location: viewPhysEvidence.php?codename=$codename");
}

if ($action === 'Return to Details'){
    $codename = filter_input(INPUT_POST, 'codename');
    header("Location: ../caseList/viewCaseDetails.php?codename=$codename");
}
