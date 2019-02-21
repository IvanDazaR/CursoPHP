<?php

ini_set('display_errors', 1);
ini_set('display_starup_error', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;


$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'cursophp',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);
$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();

$map->get('index', '/cursoPHP/', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'indexAction'
]);
$map->get('addJobs', '/cursoPHP/jobs/add', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction'
]);
$map->post('saveJobs', '/cursoPHP/jobs/add', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction'
]);

$map->get('addProjects', '/cursoPHP/projects/add', [
    'controller' => 'App\Controllers\ProjectsController',
    'action' => 'getAddProjectAction'
]);
$map->post('saveProjects', '/cursoPHP/projects/add', [
    'controller' => 'App\Controllers\ProjectsController',
    'action' => 'getAddProjectAction'
]);
$map->get('addUsers', '/cursoPHP/users/add', [
    'controller' =>'App\Controllers\UsersController',
    'action' => 'getAddUserAction'
]);
$map->post('saveUsers', '/cursoPHP/users/add', [
    'controller' =>'App\Controllers\UsersController',
    'action' => 'getAddUserAction'
]);
$map->get('loginForm', '/cursoPHP/login', [
    'controller' =>'App\Controllers\AuthController',
    'action' => 'getLogin'
]);
$map->post('auth', '/cursoPHP/auth', [
    'controller' =>'App\Controllers\AuthController',
    'action' => 'postLogin'
]);

// $map->get('addProjects', '/cursoPHP/projects/add', '../addProject.php');
$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

function printElement($job) {
    // if($job->visible == false) {
    //   return;
    // }
  
    echo '<li class="work-position">';
    echo '<h5>' . $job->title . '</h5>';
    echo '<p>' . $job->description . '</p>';
    echo '<p>' . $job->getDurationAsString() . '</p>';
    echo '<strong>Achievements:</strong>';
    echo '<ul>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '</ul>';
    echo '</li>';
  }


if (!$route) {
    # code...
    echo 'No route';
}else {
    # code...
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];

    $controller = new $controllerName;
    $response = $controller->$actionName($request);

    echo $response->getBody();
}


// $route = $_GET['route'] ?? '/';

// if ($route == '/') {
//     # code...
//     require '../index.php';
// } elseif ($route == 'addJob') {
//     # code...
//     require '../addJob.php';
// }
