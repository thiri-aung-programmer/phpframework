<?php
namespace controllers;
use core\App;

class PermissionsController{   
    
    public function permissions_read(){
        
        $all_infos=App::get("database")->selectAllUsersByPermissions();   
         

         if (!isset($_SESSION['role'])) {
            view("noaccess");
             }
        else{
            if(isPermission("permissions","read"))
            {
                view("permissions/permissions_read",["allinfos"=>$all_infos]);    
            }
            else{
                view("noaccess");
            }
             
         }


                              
    }
    
   
    
    
   
    public function permissions_crud(){
          
          $permission_features=App::get("database")->selectAllPermissionsFeatures();         
           $features=App::get("database")->selectAll("features");
          

         if (!isset($_SESSION['role']) ){
            view("noaccess");
             }
        else{
             if(isPermission("permissions","crud")){
                view("permissions/permissions_crud",[
                                         "permission_features"=>$permission_features,
                                        "features"=>$features                                    
                                        ]);    
             }
             else{
                view("noaccess");
             }
             
         }

    }
    public function permission_delete(){
        $did=$_GET['did'];
        //  dd($did);
         App::get("database")->delete("permissions",$did);
         if(isPermission("permissions","crud"))
            {
                $permission_features=App::get("database")->selectAllPermissionsFeatures();         
                $features=App::get("database")->selectAll("features");
                  view("permissions/permissions_crud",[
                                         "permission_features"=>$permission_features,
                                        "features"=>$features                                    
                   ]);  
             
            }   
            else{
                 view("noaccess");
            }
    }
     public function role_delete(){
        $did=$_GET['did'];
        //  dd($did);
         App::get("database")->delete("roles",$did);
         if(isPermission("roles","crud"))
            {
               $all_roles=App::get("database")->selectAllRoles();   
                 view("permissions/roles_crud",["all_roles"=>$all_roles]);
             
            }   
            else{
                 view("noaccess");
            }
    }
    public function permissionrole_crud(){
          $all_permissions=App::get("database")->selectAllPermissions();    
          $roles=App::get("database")->selectAll("roles");
         
           $permission_features=App::get("database")->selectAllPermissionsFeatures(); 

         if (!isset($_SESSION['role']) ){
            view("noaccess");
             }
        else{
             if(isPermission("permissionrole","crud")){
                view("permissions/permissionrole_crud",["allpermissions"=>$all_permissions,
                                        "roles"=>$roles,                                       
                                         "permission_features"=>$permission_features
                                        ]);    
             }
             else{
                view("noaccess");
             }
             
         }
    }

    public function create_permission(){
        App::get('database')->insert([
            'name'=>request("name"),
            "feature_id"=>request("feature_id")
        ],"permissions");       
        

         $permission_features=App::get("database")->selectAllPermissionsFeatures();         
           $features=App::get("database")->selectAll("features");          
          

        view("permissions/permissions_crud",[
                                        "features"=>$features,
                                        "permission_features"=>$permission_features
                                        ]);    

    }
   
    public function create_permissionrole(){
        $permission_array=request("permissions");       
       if($permission_array!=null){
        foreach($permission_array as $per){
            App::get('database')->insert([
            'role_id'=>request("role_id"),
            'permissions_id'=>$per
        ],"role_permissions");
       }
       }
        

         $all_permissions=App::get("database")->selectAllPermissions();    
          $roles=App::get("database")->selectAll("roles");           

           $permission_features=App::get("database")->selectAllPermissionsFeatures(); 
          

        view("permissions/permissionrole_crud",["allpermissions"=>$all_permissions,
                                        "roles"=>$roles,                                       
                                        "permission_features"=>$permission_features
                                        ]);    

    }


     public function features_crud(){
        $all_features=App::get("database")->selectAllFeatures();   

         if (!isset($_SESSION['role'])) {
            view("noaccess");
             }
        else{
             if(isPermission("features","crud")){
                 view("permissions/features_crud",["all_features"=>$all_features]);
             }
             else{
                view("noaccess");
             }
                 
         }

    }
   
    public function feature_update(){
       
       $uid=$_GET['id'];
       $_SESSION['uid']=$_GET['id'];
       $updateInfo=App::get("database")->selectFeature($uid);
       $all_features=App::get("database")->selectAllFeatures(); 
        //     App::get("database")->update([
        //     'name'=>request("name")
        // ],"features",$uid);
         view("permissions/features_crud",["all_features"=>$all_features,
        "updateInfo"=>$updateInfo]); 
    }
    
    public function feature_realupdate(){
       
            
        if(isset($_SESSION['uid'])){
             $name=$_POST["name"];
             $id=$_SESSION['uid'];
             App::get("database")->updateFeature("features",$name,$id);
             unset($_SESSION['uid']);
            
        }
        else{
            App::get('database')->insert([
            'name'=>request("name")
        ],"features");
        
        }
        $all_features=App::get("database")->selectAllFeatures(); 
         view("permissions/features_crud",["all_features"=>$all_features]); 
        
            
        }
       

    
     public function feature_delete(){
         $did=$_GET['did'];
        //  dd($did);
         App::get("database")->delete("features",$did);
         if(isPermission("features","crud"))
            {
                  $all_features=App::get("database")->selectAllFeatures(); 
                view("permissions/features_crud",["all_features"=>$all_features,
             ]); 
            }   
            else{
                 view("noaccess");
            }
    }
    
     public function roles_crud(){
         $all_roles=App::get("database")->selectAllRoles();   

         if (!isset($_SESSION['role'])) {
            view("noaccess");
             }
        else{

            if(isPermission("roles","crud")){
                 view("permissions/roles_crud",["all_roles"=>$all_roles]);
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
         view("permissions/features_crud",["all_features"=>$all_features]); 
    }

    public function create_role(){
        App::get('database')->insert([
            'name'=>request("name")
        ],"roles");
        $all_roles=App::get("database")->selectAllRoles(); 
         view("permissions/roles_crud",["all_roles"=>$all_roles]); 
    }
     
    
}