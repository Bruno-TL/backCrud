<?php

$rota = $_SERVER['REQUEST_URI'];
$parts = explode('/', $rota);

include_once '../src/controllers/TodoController.php';
$controller = new TodoController();
switch ($parts[1]) {
    case 'list':
        $controller->index();
        break;
    case 'item':
        $itemId = !empty($parts[2]) ? intval($parts[2]) : 0;
        $controller->getItem($itemId);
        break;
    case 'create':
        $controller->create();
        break;
    case 'update':
        $itemId = !empty($parts[2]) ? intval($parts[2]) : 0;
        $controller->update($itemId);
        break;
    case 'delete':
        $itemId = !empty($parts[2]) ? intval($parts[2]) : 0;
        $controller->delete($itemId);
    default:
        include_once '../src/controllers/ErrorController.php';
        $controller = new ErrorController();
        $controller->notFound();
        break;
}