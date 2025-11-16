<?php


class QueryBuilder{
    protected $pdo;
    public function __construct($pdo){
        $this->pdo=$pdo;
    }
    public function userChecker($dataArr,$table)
    {
        //SELECT EXISTS( SELECT 1 FROM `admin_users` WHERE email = "mgmg123@gmail.com" AND pswd = MD5("mgmg123") AND role_id = 1 ) AS user_exists; 
        // print_r($table);
        // print_r($roleid);
        // die();
        $getDataValues=array_values($dataArr);
        $getDataValues[1]=MD5( $getDataValues[1]);
        $statement=$this->pdo->prepare("SELECT role_id as roleid FROM $table WHERE email = ? AND pswd = ?");
        $statement->execute($getDataValues);

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        // echo $row['role_id'];  

        if($row){
             return  $row['roleid'];
        }
        else{
            return "";
        }
        // $statement->execute();
        //  return  $statement->fetchAll(PDO::FETCH_OBJ);
        // return $statement->fetch();
    }
    public function selectUserId($dataArr,$table)
    {
        //SELECT EXISTS( SELECT 1 FROM `admin_users` WHERE email = "mgmg123@gmail.com" AND pswd = MD5("mgmg123") AND role_id = 1 ) AS user_exists; 
        // print_r($table);
        // print_r($roleid);
        // die();
        $getDataValues=array_values($dataArr);
        $getDataValues[1]=MD5( $getDataValues[1]);
        $statement=$this->pdo->prepare("SELECT id as userid FROM $table WHERE email = ? AND pswd = ?");
        $statement->execute($getDataValues);

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        // echo $row['role_id'];  

        if($row){
             return  $row['userid'];
        }
        else{
            return "";
        }
        // $statement->execute();
        //  return  $statement->fetchAll(PDO::FETCH_OBJ);
        // return $statement->fetch();
    }
    public function selectRole($id){
        $statement=$this->pdo->prepare("select name from roles where id=$id");
        $statement->execute();
        $row=$rolename=$statement->fetch();
        return $row['name']; 
    }
    public function selectPermissions($id){
        $statement=$this->pdo->prepare("SELECT p.name,f.name
                                        FROM admin_users u 
                                        JOIN roles r ON u.role_id=r.id 
                                        JOIN role_permissions rp ON r.id =rp.role_id 
                                        JOIN permissions p ON p.id =rp.permissions_id
                                        JOIN features f ON f.id=p.feature_id WHERE u.id=$id;");
        $statement->execute();
        $row=$statement->fetchAll(PDO::FETCH_NAMED);
        return $row; 
    }
    public function selectAll($table){

        $statement=$this->pdo->prepare("select * from $table");
        $statement->execute();
        return $count=$statement->fetchAll(PDO::FETCH_OBJ);
    }
    public function selectAllInfo($table1,$table2)
    {
        // $getDataValues=array_values($dataArr);
        // $table1=$getDataValues[0];
        // $table2=$getDataValues[1];
         $statement=$this->pdo->prepare("SELECT * from $table1 JOIN $table2 ON $table1.role_id=$table2.id");
        // $statement=$this->pdo->prepare("select * from admin_users JOIN roles ON admin_users.role_id=roles.id;");
        $statement->execute();
        // return $statement->fetchAll(PDO::FETCH_ASSOC);
        return $statement->fetchAll(PDO::FETCH_NAMED);

    }
    public function selectAllUsersByPermissions(){
         $statement=$this->pdo->prepare("SELECT roles.name AS Role, f.name AS Feature, p.name AS Permission
                                        FROM permissions p JOIN features f ON p.feature_id = f.id
                                        JOIN role_permissions rp ON rp.permissions_id = p.id 
                                        JOIN roles ON rp.role_id = roles.id; 
                                        ");
       
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_NAMED);
    }

     public function selectAllPermissionsFeatures(){
         $statement=$this->pdo->prepare("SELECT p.id,f.id,f.name,p.name 
                                         FROM features as f, permissions as p 
                                         WHERE f.id=p.feature_id;  
                                        ");
       
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_NAMED);
    }

    public function selectAllPermissions(){
         $statement=$this->pdo->prepare("SELECT rp.id AS ID,roles.name AS Role, f.name AS Feature, p.name AS Permission
                                        FROM permissions p JOIN features f ON p.feature_id = f.id
                                        JOIN role_permissions rp ON rp.permissions_id = p.id 
                                        JOIN roles ON rp.role_id = roles.id ORDER BY roles.name,p.name; 
                                        ");
       
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_NAMED);
    }
    public function selectAllPermissionsByRoleId($roleid){
        // dd($roleid);
         $statement=$this->pdo->prepare("SELECT rp.id AS ID,roles.name AS Role, f.name AS Feature, p.name AS Permission
                                        FROM permissions p JOIN features f ON p.feature_id = f.id
                                        JOIN role_permissions rp ON rp.permissions_id = p.id 
                                        JOIN roles ON rp.role_id = roles.id WHERE roles.id=$roleid; 
                                        ");
       
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_NAMED);
    }
    public function selectAllFeatures(){
         $statement=$this->pdo->prepare("SELECT * FROM features;");
       
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_NAMED);
    }
    public function selectFeature($fid){
         $statement=$this->pdo->prepare("SELECT * FROM features WHERE id=$fid;");
       
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_NAMED);
    }
    public function updateFeature($table,$name,$id){
          $data=[$name,$id];
        $sql="UPDATE $table SET name=? WHERE id=?";       
        $statement=$this->pdo->prepare($sql);
        $statement->execute($data);
    }
    
    public function selectAllRoles(){
         $statement=$this->pdo->prepare("SELECT * FROM roles;");
       
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_NAMED);
    }
    public function insert($dataArr,$table){

        //         $database->insert([
        //     'uname' => $_POST['name']
        //         ],"users");
        //insert into users(name)values ("Kyaw Kyaw");
        $getDataKeys=array_keys($dataArr); //ထည့်ပေးလိုက်တဲ့ table ထဲက column nameတွေချည်းယူလိုက်တာ 
        $cols=implode(",",$getDataKeys); // ရလာတဲ့ colname တွေကို , ခံပြီး  string ပြောင်းပေးတာ
        $qMarks=""; // ? တွေ ထည့်ထားဖို့
        foreach($getDataKeys as $key){
            $qMarks.="?,";
        }
        $qMarks=rtrim($qMarks,","); // နောက်ဆုံးက ","ကို ဖြုတ်ဖို့
        $sql="insert into $table($cols) values($qMarks)";
        $getDataValues=array_values($dataArr);
        $statement=$this->pdo->prepare($sql);
        $statement->execute($getDataValues);

        
    }
    public function delete($table,$did){

        
        $sql="DELETE FROM $table WHERE id=$did";       
        $statement=$this->pdo->prepare($sql);
        $statement->execute();

        
    }

     public function update($dataArr,$table,$id){

        //         $database->insert([
        //     'uname' => $_POST['name']
        //         ],"users");
        //insert into users(name)values ("Kyaw Kyaw");
        $getDataKeys=array_keys($dataArr); //ထည့်ပေးလိုက်တဲ့ table ထဲက column nameတွေချည်းယူလိုက်တာ 
       // $cols=implode(",",$getDataKeys); // ရလာတဲ့ colname တွေကို , ခံပြီး  string ပြောင်းပေးတာ
        $qMarks=""; // ? တွေ ထည့်ထားဖို့
        foreach($getDataKeys as $key){
           // dd($key);
            $qMarks.="$key=?,";
        }
        
        $qMarks=rtrim($qMarks,","); // နောက်ဆုံးက ","ကို ဖြုတ်ဖို့
        // dd($qMarks);
        $sql="update $table set $qMarks WHERE id=$id";
        $getDataValues=array_values($dataArr);
        $statement=$this->pdo->prepare($sql);
        $statement->execute($getDataValues);

        
    }
     
    public function insertReturnID($dataArr,$table){

        //         $database->insert([
        //     'uname' => $_POST['name']
        //         ],"users");
        //insert into users(name)values ("Kyaw Kyaw");
        $getDataKeys=array_keys($dataArr); //ထည့်ပေးလိုက်တဲ့ table ထဲက column nameတွေချည်းယူလိုက်တာ 
        $cols=implode(",",$getDataKeys); // ရလာတဲ့ colname တွေကို , ခံပြီး  string ပြောင်းပေးတာ
        $qMarks=""; // ? တွေ ထည့်ထားဖို့
        foreach($getDataKeys as $key){
            $qMarks.="?,";
        }
        $qMarks=rtrim($qMarks,","); // နောက်ဆုံးက ","ကို ဖြုတ်ဖို့
        $sql="insert into $table($cols) values($qMarks)";
        $getDataValues=array_values($dataArr);
        $statement=$this->pdo->prepare($sql);
        $statement->execute($getDataValues);

        return $this->pdo->lastInsertId();

        
    }
}
          