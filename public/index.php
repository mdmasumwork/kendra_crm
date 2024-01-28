<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../app/init.php';

$url = $_GET['url'] ?? '';
$controller = new App\controllers\ClientController();
$apiController = new App\controllers\api\ClientApiController();

$routes = [
    '' => ['controller' => 'App\controllers\ClientController', 'method' => 'clientView'],
    'clients' => ['controller' => 'App\controllers\ClientController', 'method' => 'clientView'],
    'add-client' => ['controller' => 'App\controllers\ClientController', 'method' => 'addClientView'],
    'edit-client' => ['controller' => 'App\controllers\ClientController', 'method' => 'updateClientView'],
    'activity' => ['controller' => 'App\controllers\ActivityController', 'method' => 'addActivityView'],
    'api/client/create' => ['controller' => 'App\controllers\api\ClientApiController', 'method' => 'createClient'],
    'api/client/update' => ['controller' => 'App\controllers\api\ClientApiController', 'method' => 'updateClient'],
    'api/client/delete' => ['controller' => 'App\controllers\api\ClientApiController', 'method' => 'deleteClient'],
    'api/activity/create' => ['controller' => 'App\controllers\api\ActivityApiController', 'method' => 'createActivity'],
    'api/activity/update' => ['controller' => 'App\controllers\api\ActivityApiController', 'method' => 'updateActivity'],
    'api/activity/delete' => ['controller' => 'App\controllers\api\ActivityApiController', 'method' => 'deleteActivity']
];

if (array_key_exists($url, $routes)) {
    $route = $routes[$url];
    $controller = new $route['controller']();
    $method = $route['method'];
    $controller->$method();
}