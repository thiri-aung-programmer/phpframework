<?php

    use controllers\PagesController;
    use controllers\PermissionsController;
    use controllers\UserController;
    use controllers\StockController;

$router->post('check',[PagesController::class,"check"]); 
$router->get('',[PagesController::class,"home"]);
$router->get('logout',[PagesController::class,"logout"]);
$router->get('admincrud',[PagesController::class,"crud"]);
$router->get('about',[PagesController::class,"about"]);
$router->get('contactus',[PagesController::class,"contact"]);
$router->get('noaccess',[PagesController::class,"noaccess"]);




$router->get('admin',[UserController::class,"admin"]);
$router->get('chef',[UserController::class,"chef"]);
$router->get('waiter',[UserController::class,"waiter"]);
$router->get('user_read',[UserController::class,"user_read"]);
$router->get('user_crud',[UserController::class,"user_crud"]);
$router->post('user_crud',[UserController::class,"create_user"]);
// $router->get('users',[UserController::class,"index"]);

$router->get('features_crud',[PermissionsController::class,"features_crud"]);
$router->post('features_crud',[PermissionsController::class,"create_feature"]);
$router->get("permissions_crud",[PermissionsController::class,"permissions_crud"]);
$router->post("permissions_crud",[PermissionsController::class,"create_permission"]);
$router->get("roles_crud",[PermissionsController::class,"roles_crud"]);
$router->post("roles_crud",[PermissionsController::class,"create_role"]);
$router->get('permissions_read',[PermissionsController::class,"permissions_read"]);

$router->get("stock_crud",[StockController::class,"stock_crud"]);
$router->get("stock_read",[StockController::class,"stock_read"]);
$router->get("stock_readupdate",[StockController::class,"stock_readupdate"]);