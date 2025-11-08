<?php
namespace controllers;
use core\App;
class UserController{
    public function index(){

        // indexController ထဲကဟာ အကုန်ကူးလာ
         $users=App::get("database")->selectAll("users");  
         view("index",["users"=>$users]); // အပေါ်က $users ကိုပါ သယ်လာတာ။ 
    }

    public function admin(){
        
        if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
        view("noaccess");
    }
    else{
        view("users/admin");     
    }
                              
    }


    public function chef(){
         if (!isset($_SESSION['role']) || $_SESSION['role'] != 'chef') {
        view("noaccess");
        }
        else{
        view("users/chef");    
    }
                                 
    }

    public function waiter(){
        if (!isset($_SESSION['role']) || $_SESSION['role'] != 'waiter') {
        view("noaccess");
    }
    else{
        view("users/waiter");     
    }
                                 
    }

     public function create_user(){
        
        App::get("database")->insert([
    // 'uname' => $_POST['name']
    //admin_users(name,username,role_id,phone,email,address,pswd,gender,is_active)
    'name' => request("name"),
    'username'=>request("username"),
    'role_id'=>request("role_id"),
    'phone'=>request("phone"),
    'email'=>request("email"),
    'address'=>request("address"),
    'pswd'=>md5(request("pswd")),
    'gender'=>request("gender"),
    'is_active'=>request("is_active")
    ],"admin_users");
 
                 $allUsers=App::get("database")->selectAllInfo("admin_users","roles");  
                 $roles=App::get("database")->selectAll("roles");  
        view("users/user_crud",["allinfos"=>$allUsers,"roles"=>$roles]); 
    }

    public function user_read(){

        $all_Infos=App::get("database")->selectAllInfo("admin_users","roles");      
        

         if (!isset($_SESSION['role']) ) {
                view("noaccess");
        }
        else{
            if(isPermission("user","read")){
                view("users/user_read",["allinfos"=>$all_Infos]);
            }
            else{
                view("noaccess");
            }
               
            
                                              
            }
    }

    public function user_crud(){
        

         if (!isset($_SESSION['role'])) {
                 view("noaccess");
             }
        else{
            // echo array_search("crud",$_SESSION["permission"]);
            // die();
             if(isPermission("user","crud"))
            {
                 $allUsers=App::get("database")->selectAllInfo("admin_users","roles");  
                 $roles=App::get("database")->selectAll("roles");  
             view("users/user_crud",["allinfos"=>$allUsers,"roles"=>$roles]); 
            }   
            else{
                 view("noaccess");
            }
         }                                        
        
         // view("admin/user");  
        // view("admin/user",["allinfos"=>App::get("database")->selectAllInfo("admin_users","roles")]);                                        
    }


}