
 <?php 

    use controllers\PagesController;
    use controllers\PermissionsController;
    use controllers\UserController;
    use controllers\StockController;
    use core\App;
    //  $pdo = new PDO("mysql:host=localhost;port=3308,dbname=intern","root","");
    header('Content-Type: application/json; charset=utf-8');

// JSON input ကိုဖတ်မယ်
$input = file_get_contents('php://input');
$data = json_decode($input, true);



$roleId = $data['roleId'] ?? null;
$permissions[]=null;
if (!$roleId) {
    throw new Exception('Role ID not found!');
}
else{
   
    //  
    // print_r($role);
    // die();
     $permissions=App::get('database')->selectAllPermissionsByRoleId($roleId);
     
    echo json_encode(['permissions'=>$permissions]);

    exit; 
} 

