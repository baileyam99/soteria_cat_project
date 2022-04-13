<?php

require('../model/database.php');
require('../model/user_db.php');
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'home';
    }
}

if ($action == 'home' && $_SESSION["admin"] == 1) {
    include("admin.php");
}

if ($action == 'home' && $_SESSION["admin"] == 0) {
    include("notAuthorized.php");
}

if ($action == 'newUser') {
    include("createNewUser.php");
}

if ($action == 'editCred') {
    include("editCredentials.php");
}

if ($action == 'new') {
    $username = filter_input(INPUT_POST, 'username');
    $admin = filter_input(INPUT_POST, 'admin');
    newUser($username, $admin);
    $select = select($username);

    foreach ($select as $part) {
        $_SESSION['userAdd'] = $part['username'];
    }
    
    include("newUserSuccess.php");
}

if ($action == 'edit') {
    $username = filter_input(INPUT_POST, 'username');
    $admin = filter_input(INPUT_POST, 'admin');
    editUser($username, $admin);
    $select = select($username);

    foreach ($select as $part) {
        $newUsername = $part['username'];
        $newAdmin = $part['admin'];
    }
    
    header("Location: ./editUserSuccess.php?username=$newUsername&admin=$newAdmin");
}