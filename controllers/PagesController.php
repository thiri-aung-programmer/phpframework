<?php
namespace controllers;
use core\App;

class PagesController{   
    public function home(){                           
        // indexController ထဲကဟာ အကုန်ကူးလာ                                         
        $users=App::get("database")->selectAll("admin_users");  
        // $pswd=MD5("mgmg123");
    //    $check=App::get("database")->userChecker("‌admin_users","mgmg123@gmail.com",$pswd,1);       
          $roles=App::get("database")->selectAll("roles");  
         view("index",["users"=>$users,
                        "roles"=>$roles
                        ]); // အပေါ်က $users ကိုပါ သယ်လာတာ။ 
                       
                       
    }
   
     public function user_crud(){
        

         if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
                 view("noaccess");
             }
        else{
             if(in_array("user",$_SESSION["permission"],true) && in_array("crud",$_SESSION["feature"],true))
            {
                 $allinfos=App::get("database")->selectAllInfo("admin_users","roles");  
             view("user_crud",["allinfos"=>$allinfos]); 
            }   
            else{
                 view("noaccess");
            }
         }       
        
         // view("admin/user");  
        // view("admin/user",["allinfos"=>App::get("database")->selectAllInfo("admin_users","roles")]);                                        
    }
    public function user_read(){

        $allinfos=App::get("database")->selectAllInfo("admin_users","roles");      
        

         if (!isset($_SESSION['role']) ) {
                view("noaccess");
        }
        else{
                view("user_read",["allinfos"=>$allinfos]);
                                              
            }
    }
    public function check(){                       
        $table="admin_users";     
        $email=request('email');
        $pswd=MD5(request('password'));
        $roleid=request('role');        
        $id=App::get("database")->userChecker([
        'email' => request("email"),
        'password' => request("password"),
        'roleid' => request("role")
    ],"admin_users");  
        // echo $id;
        // print_r($roles["id"]);
        if($id=="") {
            $error="<h1 class='text-danger text-center fw-bold'>Please Try Again!!</h1>";
             $roles=App::get("database")->selectAll("roles");
              view("index",["roles"=>$roles,"error"=>$error]);
        }  
        else{
             $rolename=App::get("database")->selectRole($id);
              $permissions=App::get("database")->selectPermissions($id);
              $num=0;
            //    var_dump($permissions);
            //    die();
              foreach($permissions as $p)
              {
                // echo $p["email"];
                // echo $p["name"][0]."<br>";
                // echo $p["name"][1]."<br>";
                // echo $p["name"][2]."<br>";
                $_SESSION['permission'][$num++]=$p["name"][0];
                $_SESSION['feature'][$num++]=$p["name"][1];
              }
            //   die();
             $_SESSION['email']=$email;
             $_SESSION['id']=$id;
             $_SESSION['role']=$rolename;
             redirect($rolename);
             

           
        }                               
      
    }
    public function admin(){
        
        if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
        view("noaccess");
    }
    else{
        view("admin");     
    }


                              
    }

    public function user_permissions(){
        
        $allinfos=App::get("database")->selectAllUsersByPermissions();   

         if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
        view("noaccess");
             }
        else{
             view("user_permissions",["allinfos"=>$allinfos]);    
         }


                              
    }
    public function waiter(){
        if (!isset($_SESSION['role']) || $_SESSION['role'] != 'waiter') {
        view("noaccess");
    }
    else{
        view("waiter");     
    }
                                 
    }
    public function logout(){
        session_unset();
       redirect("/");
    }
    public function chef(){
         if (!isset($_SESSION['role']) || $_SESSION['role'] != 'chef') {
        view("noaccess");
        }
        else{
        view("chef");    
    }
                                 
    }
   
    public function crud(){
        view("crud");
    }
    
    public function about(){                                   
        view("about");                
    }
    public function contact(){
        view("contact");
    }
    public function createUser(){
        
        App::get("database")->insert([
    // 'uname' => $_POST['name']
    'uname' => request("name")
    ],"users");
 
    // header("Location:/"); ဒါက အသေမို့ အောက်ကလို dynamically ပြင်ရေး
        redirect("/");
    }
}