<?php
session_start();
require 'vendor/autoload.php';
require 'core/bootstrap.php';


// အစက ဒီနားမှာ ရှေ့က require ပါတယ် အခုမလိုတော့ဘူး
 Router::load("routes.php")
        ->direct(Request::uri(),$_SERVER['REQUEST_METHOD']);

// $router=new Router();
// require "routes.php"; 
// require $router->direct(trim($_SERVER['REQUEST_URI'],"/")); 
// ဒီသုံးကြောင်းရေးပုံကို မကြိုက်လို့ ပုံစံပြောင်းပြီး  static method နဲ့ခေါ်တဲ့ပုံစံရေးမယ်



//dbConnection အတွက်
// $pdo=dbConnection();
// $pdo=Connection::make(); 
//  ဒါလည်းမှန်ပြီးသား ရေးပုံမလှလို့ အောက်ကလိုပြင်လိုက်တာ

//fetchTasks အတွက် 
// $tasks=fetchTasks($pdo);

// ဒါက မှန်ပြီးသား မလိုလို့ ပိတ်ထားတာ
// echo "<prep>";
// print_r($tasks);// ဒါက မှန်ပြီးသား မလိုလို့ ပိတ်ထားတာ



//ဒီ $tasks နဲ့ index.view ကမှန်ပေမဲ့ controllerလုပ်ရမယ့်အလုပ်မို့ IndexController ထဲပြောင်းလိုက်တာ
// $tasks=$query->selectAll("tasks");  
// ဒါကျ class ကနေ obj ဆောက်ပြီးထည့်လိုက်တာမို့ အရှင်ဖြစ်သွားတာ

// require 'views/index.view.php';

//  require 'controllers/IndexController.php'; ဒါက အသေမို့ အောက်ကလို ပြင်ရေးတာ
// require 'controllers/AboutController.php';
    // dd($_SERVER['REQUEST_URI']);
// dd(trim($_SERVER['REQUEST_URI'],"/"));
//$uri = str_replace('/myproject', '', $_SERVER['REQUEST_URI']);echo $uri;



// $router->showMyRoutes();


// $base = basename(dirname($_SERVER['SCRIPT_NAME']));
// $orgRoute = str_replace('/' . $base, '', $_SERVER['REQUEST_URI']);
//  $orguri=trim($orgRoute,"/");
 

//require $router->direct(""); 
  
// ဘာမှမပါတာက default route ပြတာ ဒါကျ array ထဲကဟာနဲ့ 
// တိုက်စစ်ပြီး dynamically ခေါ်ြီ လုံးဝအရှင်မဟုတ်သေးပေမဲ့ အသေကြီးတော့မဟုတ်တော့ဘူး