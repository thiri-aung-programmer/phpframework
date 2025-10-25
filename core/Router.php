<?php

class Router{
    public $routes=[];
    // public $routes=[
    //     "GET"=>["/"=>"controllers/IndexController.php"],
    //     "GET"=>["about"=>"controllers/AboutController.php"],
    //     "GET"=>["cotactus"=>"controllers/ContactController.php"],
    //     "POST"=>["names"=>"controllers/add-name.php"],
    // ];
    public static function load($filename){
        $router=new Router;
        require $filename;
        return $router; // index ဘက်ကခေါ်သုံးတော့ အောက်က direct function ကိုပါ ဆက်ခေါ်တာမို့  return ပြန်ပြီးဆက်ခေါ်တာ
    }
    public function register($routes){
        $this->routes=$routes;
    }
    public function get($uri,$controller){
        $this->routes['GET'][$uri]=$controller;
    }
    public function post($uri,$controller){
        $this->routes['POST'][$uri]=$controller;
    }
    // public function showMyRoutes(){
    //     var_dump($this->routes);
    // }
    public function direct($uri,$method)
    {
        // if(array_key_exists($uri,$this->routes[$method])){
        //     return $this->routes[$method][$uri];
        // }
        // die("<h2>404 Page</h2>");

        if(!array_key_exists($uri,$this->routes[$method])){
            die("<h2>404 Page</h2>");            
        }
            // $explosion=explode("@",$this->routes[$method][$uri]); ဒါက Laravel 7 ပုံစံကို ရအောင်ရေးထားတာ
              $explosion=$this->routes[$method][$uri];
            $this->callMethod($explosion[0],$explosion[1]);
        // return $this->routes[$method][$uri];
       
    }
    public function callMethod($class,$method){
        //class ထဲက method ကိုခေါ်‌ေးရမှာ
        $class=new $class;
        $class->$method();
    }
}
