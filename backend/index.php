<?php
    require_once 'controllers/UserController.php';

    $userController = new UserController();

    switch($_SERVER["REQUEST_METHOD"]) {
        case 'POST':
            $userController->login();
            break;
    }
?>