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
             view("user_crud",["allinfos"=>$allUsers,"roles"=>$roles]); 
            }   
            else{
                 view("noaccess");
            }
         }                                        
        
         // view("admin/user");  
        // view("admin/user",["allinfos"=>App::get("database")->selectAllInfo("admin_users","roles")]);                                        
    }
    public function user_read(){

        $allInfos=App::get("database")->selectAllInfo("admin_users","roles");      
        

         if (!isset($_SESSION['role']) ) {
                view("noaccess");
        }
        else{
            if(isPermission("user","read")){
                view("user_read",["allinfos"=>$allinfos]);
            }
            else{
                view("noaccess");
            }
               
            
                                              
            }
    }
    public function check(){                       
        $table="admin_users";     
        $email=request('email');
        $pswd=MD5(request('password'));
        // $roleid=request('role');        
        $id=App::get("database")->userChecker([
        'email' => request("email"),
        'password' => request("password"),
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
              $permissions=App::get("database")->selectPermissions($id);
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

            //   echo "Permission Array In Session<prep>";
            //   print_r($_SESSION['permission']);
            //   echo "<br>";
            //    echo "Feature Array In Session<prep>";
            //    print_r($_SESSION['feature']);
            //   die();
             $_SESSION['email']=$email;
             $_SESSION['id']=$id;
             $_SESSION['role']=$rolename;
            //  redirect($rolename);
             
                view("all");
           
        }                               
      
    }
    

    public function permissions_read(){
        
        $all_infos=App::get("database")->selectAllUsersByPermissions();   
         

         if (!isset($_SESSION['role'])) {
            view("noaccess");
             }
        else{
            if(isPermission("permissions","read"))
            {
                view("permissions_read",["allinfos"=>$all_infos]);    
            }
            else{
                view("noaccess");
            }
             
         }


                              
    }
    
   
    
    
   

    public function permissions_crud(){
         $all_permissions=App::get("database")->selectAllPermissions();    
          $roles=App::get("database")->selectAll("roles");
           $features=App::get("database")->selectAll("features");

         if (!isset($_SESSION['role']) ){
            view("noaccess");
             }
        else{
             if(isPermission("permissions","crud")){
                view("permissions_crud",["allpermissions"=>$all_permissions,
                                        "roles"=>$roles,
                                        "features"=>$features
                                        ]);    
             }
             else{
                view("noaccess");
             }
             
         }

    }
   
     public function features_crud(){
        $all_features=App::get("database")->selectAllFeatures();   

         if (!isset($_SESSION['role'])) {
            view("noaccess");
             }
        else{
             if(isPermission("features","crud")){
                 view("features_crud",["all_features"=>$all_features]);
             }
             else{
                view("noaccess");
             }
                 
         }

    }
    

     public function roles_crud(){
         $all_roles=App::get("database")->selectAllRoles();   

         if (!isset($_SESSION['role'])) {
            view("noaccess");
             }
        else{

            if(isPermission("roles","crud")){
                 view("roles_crud",["all_roles"=>$all_roles]);
            }
            else{
                view("noaccess");
            }

                
         }

    }
    public function create_feature(){
        App::get('database')->insert([
            'name'=>request("name")
        ],"features");
        $all_features=App::get("database")->selectAllFeatures(); 
         view("features_crud",["all_features"=>$all_features]); 
    }

    public function create_role(){
        App::get('database')->insert([
            'name'=>request("name")
        ],"roles");
        $all_roles=App::get("database")->selectAllRoles(); 
         view("roles_crud",["all_roles"=>$all_roles]); 
    }
     public function create_permission(){
        $permission_id=App::get('database')->insertReturnID([
            'name'=>request("name"),
            "feature_id"=>request("feature_id")
        ],"permissions");
       
        App::get('database')->insert([
            'role_id'=>request("role_id"),
            'permissions_id'=>$permission_id
        ],"role_permissions");

         $all_permissions=App::get("database")->selectAllPermissions();    
          $roles=App::get("database")->selectAll("roles");
           $features=App::get("database")->selectAll("features");

        view("permissions_crud",["allpermissions"=>$all_permissions,
                                        "roles"=>$roles,
                                        "features"=>$features
                                        ]);    

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
        view("user_crud",["allinfos"=>$allUsers,"roles"=>$roles]); 
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
    public function admin(){
        
        if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
        view("noaccess");
    }
    else{
        view("admin");     
    }


                              
    }
} 