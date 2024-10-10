<?php
session_start(); // iniciamos sesion
require_once 'app/controllers/shirt.controller.php';
require_once 'app/controllers/auth.controller.php';
// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}


// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
        case 'home':
            $controller = new shirtController();
            $controller->showShirts();
            break;
        case 'description':
            $controller = new shirtController();
            $controller->showDetail($params[1]);
            break;
        case 'showLogin':
            $controller = new authController();
            $controller->showLogin();
            break;
        case 'login':
            $controller = new authController();
            $controller->login();
            break;
        default: 
        echo "404 Page Not Found"; // deberiamos llamar a un controlador que maneje esto
        break;
}
