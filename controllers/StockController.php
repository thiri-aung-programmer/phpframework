<?php
namespace controllers;
use core\App;

class StockController{   
   
    

    
     public function stock_crud(){
         

         if (!isset($_SESSION['role'])) {
            view("noaccess");
             }
        else{

            if(isPermission("stock","crud")){
                 view("stock_crud");
            }
            else{
                view("noaccess");
            }                
         }
    }
     public function stock_read(){
         

         if (!isset($_SESSION['role'])) {
            view("noaccess");
             }
        else{

            if(isPermission("stock","read")){
                 view("stock_read");
            }
            else{
                view("noaccess");
            }                
         }
    }
     public function stock_readupdate(){
         

         if (!isset($_SESSION['role'])) {
            view("noaccess");
             }
        else{

            if(isPermission("stock","readupdate")){
                 view("stock_readupdate");
            }
            else{
                view("noaccess");
            }                
         }
    }

   
    

    
    
    
} 