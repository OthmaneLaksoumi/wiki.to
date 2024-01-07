<?php
session_start();
require 'autoloader.php';


if(isset($_GET['action'])) {

    $action = $_GET['action'];
    switch($action) {
        case 'sign_up':
            include('Views/signUp.php');
            break;
        case 'sign_up_action':
            Controllers\loginController::add_user();
            break;
        case 'login':
            include('Views/login.php');
            break;
        case 'login_action':
            Controllers\loginController::check_user();
            break;
        case 'wiki_page':
            // Controllers\loginController::wiki_page();
            // break;

    }


} else {
    include('Views/home.php');
}


?>