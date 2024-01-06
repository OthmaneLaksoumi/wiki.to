<?php

require('Controllers/loginController.php');


if(isset($_GET['action'])) {

    $action = $_GET['action'];
    switch($action) {
        case 'sign_up':
            include('Views/signUp.php');
            break;
        case 'sign_up_action':
            loginController::add_user();
            break;
        case 'login':
            include('Views/login.php');
    }


} else {
    include('Views/home.php');
}


?>