<?php
require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\AdministrationController;
use app\controllers\HomeController;
use app\controllers\ProductController;
use app\controllers\AuthController;
use app\core\Application;
use app\controllers\CartController;

$app = new Application();

$app->router->get("/", [AuthController::class, 'login']);
$app->router->get("/home", [HomeController::class, 'index']);
$app->router->get("/login", [AuthController::class, 'login']);
$app->router->get("/registration", [AuthController::class, 'registration']);
$app->router->get("/accessDenied", [AuthController::class, 'accessDenied']);
$app->router->get("/product/create", [ProductController::class, 'create']);
$app->router->get("/administration/users", [AdministrationController::class, 'users']);
$app->router->get("/api/administration/users", [AdministrationController::class, 'getAllUsers']);
$app->router->get("/logout", [AuthController::class, 'logout']);
$app->router->post("/registrationProcess", [AuthController::class, 'registrationProcess']);
$app->router->post("/createProductProcess", [ProductController::class, 'createProductProcess']);
$app->router->post("/loginProcess", [AuthController::class, 'loginProcess']);
$app->router->get("/api/getBooks",[ProductController::class,'getBooks']);

$app->router->get("/chart", [AdministrationController::class, 'showCharts']);
$app->router->get("/api/brojProdatihArtikala", [AdministrationController::class, 'brojProdatihArtikala']); 

$app->router->get("/api/chart3", [AdministrationController::class, 'chart3']); 

$app->router->get("/api/chart2", [AdministrationController::class, 'showChart2']);

$app->router->get("/cart",[CartController::class,'index']);

$app->router->post("/ajax",[CartController::class,'ajax']);
$app->run();