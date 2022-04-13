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

if ($action === 'Return to List'){
    $codename = filter_input(INPUT_POST, 'codename');

    if ($codename != false) {
        header("Location: viewEvidence.php?codename=$codename");
     }
}

if ($action === 'Collect Evidence'){
    $codename = filter_input(INPUT_POST, 'codename');
    header("Location: addEvidence.php?codename=$codename");
}

if ($action === 'Add Evidence'){
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
    header("Location: viewEvidence.php?codename=$codename");
}

if ($action === 'Edit'){
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

if ($action === 'Update'){
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

if ($action === 'Delete'){
    $codename = filter_input(INPUT_POST, 'codename');
    $idNum = filter_input(INPUT_POST, 'idNum');
    deleteEvidence($codename, $idNum);
    header("Location: viewEvidence.php?codename=$codename");
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