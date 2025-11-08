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
   
     
    
    public function check(){                       
        $table="admin_users";     
        $email=request('email');
        $pswd=MD5(request('password'));
        // $roleid=request('role');        
        $id=App::get("database")->userChecker([
        'email' => request("email"),
        'password' => request("password")
        // 'roleid' => request("role")
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
             $userID=App::get("database")->selectUserId([
                 'email' => request("email"),
                'password' => request("password")        
                ],"admin_users");
              $permissions=App::get("database")->selectPermissions($userID);
              $num=0;$num1=0;
            //    var_dump($permissions);
            //    die();
              foreach($permissions as $p)
              {
                // echo $p["email"];
                // echo $p["name"][0]."<br>";
                // echo $p["name"][1]."<br>";
                // echo $p["name"][2]."<br>";
                $_SESSION['permission'][$num++]=$p["name"][0];
                $_SESSION['feature'][$num1++]=$p["name"][1];
              }

            
             $_SESSION['email']=$email;
             $_SESSION['id']=$userID;
             $_SESSION['role']=$rolename;


            //    echo "Permission Array In Session<prep>";
            //   print_r($_SESSION['permission']);
            //   echo "<br>";
            //    echo "Feature Array In Session<prep>";
            //    print_r($_SESSION['feature']);
            //      print_r($_SESSION['role']);
            //      echo "id = ".$userID;
            //   die();
            //  redirect($rolename);
             
                view("all");
           
        }                               
      
    }
       
     public function noaccess(){
        view("noaccess");
    }
   

    
    
    public function logout(){
        session_unset();
       redirect("/");
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
    
} 