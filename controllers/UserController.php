<?php
namespace controllers;
class UserController{
    public function index(){

        // indexController ထဲကဟာ အကုန်ကူးလာ
         $users=App::get("database")->selectAll("users");  
         view("index",["users"=>$users]); // အပေါ်က $users ကိုပါ သယ်လာတာ။ 
    }
}