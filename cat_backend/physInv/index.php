<?php
require('../model/database.php');
require('../model/physInv_db.php');

$action = filter_input(INPUT_POST, 'action');

if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'under_construction';
    }
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

?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>