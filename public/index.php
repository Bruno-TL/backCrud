<?php

$rota = $_SERVER['REQUEST_URI'];
$parts = explode('/', $rota);

// require_once '../src/connection/db_connection.php';

include_once '../src/controllers/TodoController.php';
$controller = new TodoController();
echo $parts[1] ;
switch ($parts[1]) {
    case 'list':
        $controller->index();
        break;
    case 'create':
        $controller->create();
        break;
    case 'update':
        $todoId = intval($parts[2]);
        $controller->edit($todoId);
        break;
    case 'delete':
        $todoId = intval($parts[2]);
        $controller->delete($todoId);
    default:
        include_once '../src/controllers/ErrorController.php';
        $controller = new ErrorController();
        $controller->notFound();
        break;
}