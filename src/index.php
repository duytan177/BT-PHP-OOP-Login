<?php
require_once('Controller.php');
$controller = new Controller();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    switch ($action) {
        case 'login':
            $controller->handleLogin();
            break;
        case 'logout':
            $controller->handleLogout();
            break;
      
    }
}