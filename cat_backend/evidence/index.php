<?php
require('../model/database.php');
require('../model/evidence_db.php');

$action = filter_input(INPUT_POST, 'action');

if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'under_construction';
    }
}

// Get Evidence
if($action == 'getevi'){
    $codename = filter_input(INPUT_GET, 'codename');
    $result = viewEvidence($codename);

    $json_array = array();
    while ($row = $result->fetch_assoc()) {
        $json_array[] = $row;
    }
    $json = json_encode($json_array);
    file_put_contents("evidence.json", $json);
    header("Location: http://localhost:3000/cases/view_evidence?codename=$codename");
}

// View Evidence
if ($action == 'viewevi') {
    header('Content-type: application/json');
    include('evidence.json');
}

// Add Evidence
if ($action === 'add'){
    $codename = filter_input(INPUT_POST, 'codename');
    $filename = filter_input(INPUT_POST, 'filename');
    $descriptor = filter_input(INPUT_POST, 'descriptor');
    $size = filter_input(INPUT_POST, "size");
    $modDate = filter_input(INPUT_POST, 'datemodified');
    $hash = filter_input(INPUT_POST, 'itemhash');
    $username = filter_input(INPUT_POST, 'username');


    // $timestamp = strtotime($modDate);
    // $date = $date->setTimestamp($timestamp);
    // $modDate= $date->format('F j, Y, g:i a');

    addEvidence($codename, $filename, $descriptor, $size, $modDate, $hash, $username);
    header("Location: http://localhost/soteria_cat_project/cat_backend/evidence/index.php?action=getevi&codename=$codename");
}

// Edit Evidence
if ($action === 'edit'){
    $codename = filter_input(INPUT_POST, 'codename');
    $idNum = filter_input(INPUT_POST, 'idNum');
    $fileName = filter_input(INPUT_POST, 'fileName');
    $descriptor = filter_input(INPUT_POST, 'descriptor');
    $size = filter_input(INPUT_POST, 'size');
    $dateModified = filter_input(INPUT_POST, 'dateModified');
    $itemHash = filter_input(INPUT_POST, 'itemHash');
    $collector = filter_input(INPUT_POST, 'collector');
    include('editEvidence.php');
}

// Update Evidence
if ($action === 'update'){
    $codename = filter_input(INPUT_POST, 'codename');
    $idNum = filter_input(INPUT_POST, 'idNum');
    $fileName = filter_input(INPUT_POST, 'filename');
    $descriptor = filter_input(INPUT_POST, 'descriptor');
    $size = filter_input(INPUT_POST, 'size');
    $dateModified = filter_input(INPUT_POST, 'datemodified');
    $itemHash = filter_input(INPUT_POST, 'itemhash');
    $collector = filter_input(INPUT_POST, 'username');
    updateEvidence($codename, $idNum, $fileName, $descriptor, $size, $dateModified, $itemHash, $collector);
    header("Location: viewEvidence.php?codename=$codename");
}

// Delete Evidence
if ($action === 'Delete'){
    $codename = filter_input(INPUT_POST, 'codename');
    $idNum = filter_input(INPUT_POST, 'idNum');
    deleteEvidence($codename, $idNum);
    header("Location: http://localhost/soteria_cat_project/cat_backend/evidence/index.php?action=getevi&codename=$codename");
}
