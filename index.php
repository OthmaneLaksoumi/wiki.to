<?php
namespace Controllers;
session_start();

require('autoloader.php');

if (isset($_GET['action'])) {

    $action = $_GET['action'];
    switch ($action) {
        case 'sign_up':
            include('Views/signUp.php');
            break;
        case 'sign_up_action':
            loginController::add_user();
            break;
        case 'login':
            include('Views/login.php');
            break;
        case 'login_action':
            loginController::check_user();
            break;
        case 'logout':
            loginController::logout();
            break;
        case 'wiki_page':
            WikisController::affiche_one_wiki();
            break;
        case 'add_wiki':
            WikisController::add_wiki();
            break;
        case 'add_wiki_action':
            WikisController::add_wiki_action();
            break;
        
    }
} else {
    WikisController::affiche_all_wiki();
}
