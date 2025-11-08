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
         $all_permissions=App::get("database")->selectAllPermissions();    
          $roles=App::get("database")->selectAll("roles");
           $features=App::get("database")->selectAll("features");

         if (!isset($_SESSION['role']) ){
            view("noaccess");
             }
        else{
             if(isPermission("permissions","crud")){
                view("permissions/permissions_crud",["allpermissions"=>$all_permissions,
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
                 view("permissions/features_crud",["all_features"=>$all_features]);
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

        view("permissions/permissions_crud",["allpermissions"=>$all_permissions,
                                        "roles"=>$roles,
                                        "features"=>$features
                                        ]);    

    }
    
}