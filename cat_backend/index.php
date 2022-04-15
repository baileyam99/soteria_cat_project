<?php
require('CORS.php');
session_start();
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'home';
    }
}

if ($action == 'home' && $_SESSION == null) {
    header("Location: ./home/index.php?action=landing_page");
}

?>