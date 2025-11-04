<?php


//www.localhost:8000 ဒါက default route
    
// $routes=[
// ];
// $router->register([
//     ""=>"controllers/IndexController.php",
//     "about"=>"controllers/AboutController.php",
//     "contactus"=>"controllers/ContactController.php",
//     "names"=>"controllers/add-name.php"

// ]);
// ဒါက Laravel 7 ရဲ့ route system 
// $router->get("","PagesController@home");
// $router->get("about","PagesController@about");
// $router->get("contactus","PagesController@contact");
// $router->post("names","PagesController@createUser");
// $router->get("users","UserController@index");

// ဒါက အခုနောက်ဆုံး Laravel 8 ရဲ့ ပုံစံ
use controllers\PagesController;
use controllers\UsersController;
$router->get('',[PagesController::class,"home"]);
$router->get('about',[PagesController::class,"about"]);
$router->get('contactus',[PagesController::class,"contact"]);
$router->post('user_crud',[PagesController::class,"createUser"]);
// $router->get('users',[UserController::class,"index"]);
$router->get('admin',[PagesController::class,"admin"]);
$router->get('noaccess',[PagesController::class,"noaccess"]);
$router->get('chef',[PagesController::class,"chef"]);
$router->get('waiter',[PagesController::class,"waiter"]);
$router->post('check',[PagesController::class,"check"]); 
$router->get('admincrud',[PagesController::class,"crud"]);
$router->get('logout',[PagesController::class,"logout"]);
$router->get('user_crud',[PagesController::class,"user_crud"]);
$router->get('user_read',[PagesController::class,"user_read"]);
$router->get('user_permissions',[PagesController::class,"user_permissions"]);
$router->get('features_crud',[PagesController::class,"features_crud"]);
$router->get("permissions_crud",[PagesController::class,"permissions_crud"]);