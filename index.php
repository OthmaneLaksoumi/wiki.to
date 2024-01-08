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
        case 'my_wikis':
            WikisController::my_wikis();
            break;
        case 'edit_wiki':
            WikisController::edit_wiki();
            break;
        case 'edit_wiki_action':
            WikisController::edit_wiki_action();
            break;
        case 'delete_wiki':
            WikisController::delete_wiki();
            break;
        
    }
} else {
    WikisController::affiche_all_wiki();
}
