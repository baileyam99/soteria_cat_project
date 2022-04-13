<?php

require('../model/database.php');
require("../model/user_db.php");
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'home';
    }
}

// display landing page
if ($action == 'landing_page') {
    include("landing_page.php");
}

// display homepage
if ($action == 'home' && !($_SESSION == null)) {
    header("Location: home.php");
}

// if not already logged in, display login page
if ($action == 'home' && $_SESSION == null) {
    include('login.php');
}

// login function
if ($action == 'login' ) {
    $username = filter_input(INPUT_POST, 'username');
    
    // set session varaibles if not already set
    if ($_SESSION == null) {
        $login = select($username);
        foreach ($login as $part) {
            $_SESSION["username"] = $part['username'];
            $_SESSION["admin"] = $part['admin'];
        }
    }
    
    // error checking
    if ($_SESSION == null && ($username == NULL || $username == false ||
            $_SESSION["username"] == NULL || $_SESSION["username"] == false)) {
        $error = "Login unsuccessful";
        include('../errors/error.php');
    }
    
    // display home page
    else {
        header("Location: ./home.php?usrnme=$usrnme&admin=$admin");
    }
}

// logout function
if ($action == 'logout') {
    $_SESSION = null;
    session_destroy();
    header("Location: ./index.php?action=home");
}



?>