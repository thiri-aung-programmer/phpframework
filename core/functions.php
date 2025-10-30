<?php

// function dbConnection() {
//    ဒါမှန်ပြီးသား ဖတ်ရတာမလှလို့ class ဆောက်ပြီးထည့်လိုက်တာ
//     try{
//         return $pdo=new PDO("mysql:host=localhost;port=3308;dbname=test","root","");
//     }catch(PDOException $e){
//         echo $e->getMessage();
//     }
    
// }

function dd($data){
    echo "<prep>";
    die(var_dump($data));   
}
function view($n,$data=[]){
    extract($data); // သူက သယ်လာတဲ့ arraykey ကို variable အဖြစ်ပြောင်းပေးတာ
    return require "views/$n.view.php";
}
function redirect($uri){
    header("Location: $uri");
}
function request($name){                 
    if($_SERVER['REQUEST_METHOD']==='POST'){
        return $_POST[$name];
    }
    if($_SERVER['REQUEST_METHOD']==='GET'){
        return $_GET[$name];
    }
}


//in_array("user",$_SESSION["feature"],true) && in_array("crud",$_SESSION["permission"],true)
function isPermission($feature,$permission){
    return (in_array($feature,$_SESSION["feature"],true) && in_array($permission,$_SESSION["permission"],true))&&(array_search($feature,$_SESSION["feature"])==array_search($permission,$_SESSION["permission"]));
}
// function fetchTasks($pdo){
//        ဒါမှန်ပြီးသား ရေးပုံကအသေဖြစ်နေလို့ class ခွဲရေးလိုက်တာ
//     $statement=$pdo->prepare("select * from tasks");
//     $statement->execute();
//     return  $statement->fetchAll(PDO::FETCH_OBJ);
// }