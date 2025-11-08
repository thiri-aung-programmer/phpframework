<?php require 'views/partials/header.php'; 
 use controllers\PagesController;
    use controllers\PermissionsController;
    use controllers\UserController;
    use controllers\StockController;

?>
<div>

   
    <h2 class="text-success bg-secondary-subtle p-3 text-center fw-bold">All Of The Users Using Our Website</h2>
    <table class="table table-striped table-light">
        <tr>
            <th>UserID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Role</th>
            <th>Permission</th>
        </tr>
            <prep>
         <?php 
         
        //    print_r(implode("",$_SESSION['permission']) . "\n");
        //    print_r(implode("",$_SESSION['feature']) . "\n");
         ?>
         </prep>
        <?php foreach ($allinfos as $info): ?>
        <tr>
            <?Php 
                if($info['gender']==0){
                    $gender="Male";
                }
                else{
                    $gender="Female";
                }
             ?>
            <!-- $table1.id as userid,$table1.name as uname,email,phone,address,gender,$table2.name as rname -->
            <th><?= $info['id'][0]; ?></th>
            <th><?= $info['username']; ?></th>
            <th><?= $info['email']; ?></th>
            <th><?= $info['phone']; ?></th>
            <th><?= $info['address']; ?></th>
            <th><?= $gender; ?></th>
            <th><?= $info['name'][1]; ?></th>
            <th>
                <a href="" class="btn btn-warning p-1"><i class="bi bi-pencil-square"></i></a>
                <a href="" class="btn btn-danger p-1" onclick="return confirm('Are You Sure to delete?')"><i class="bi bi-trash3-fill"></i></a>
            </th>
        </tr>  

        <?php endforeach; ?>
    </table>


     <div class="w-75 m-auto">
        <h2 class="text-success bg-secondary-subtle p-3 text-center fw-bold mt-3">Insert New User</h2>
            <form class="w-100 p-3 bg-light shadow-sm" action="user_crud" method="post">

                 <div class="row m-3">
                    <div class="col-md-4  col-10">
                         <label for="">Name</label>
                    </div>
                    <div class="col-md-8 col-10">
                         <input type="text" class="form-control" id="name" name="name" require>
                    </div>
                 </div>

                 <div class="row m-3">
                    <div class="col-md-4  col-10">
                         <label for="">User Name</label>
                    </div>
                    <div class="col-md-8 col-10">
                         <input type="text" class="form-control" id="username" name="username" require>
                    </div>
                 </div>

                 <div class="row m-3">
                    <div class="col-md-4  col-10">
                         <label for="">Email</label>
                    </div>
                    <div class="col-md-8 col-10">
                         <input type="email" class="form-control" id="email" name="email" require>
                    </div>
                 </div>

                 <div class="row m-3">
                    <div class="col-md-4  col-10">
                         <label for="">Password</label>
                    </div>
                    <div class="col-md-8 col-10">
                         <input type="password" class="form-control" id="pswd" name="pswd" require>
                    </div>
                 </div>

                 <div class="row m-3">
                    <div class="col-md-4  col-10">
                         <label for="">Confirm Password</label>
                    </div>
                    <div class="col-md-8 col-10">
                         <input type="password" class="form-control" id="confirm" name="confirm" require onkeyup="checkPswd();">
                    </div>
                 </div>
                 <div class="row m-3">
                     <div class="col-md-4  col-10">
                         
                    </div>
                     <div class="col-md-8 col-10">
                         <label for="" id="message"></label>
                    </div>

                 </div>

                <div class="row m-3">
                    <div class="col-md-4  col-10">
                         <label for="">Phone</label>
                    </div>
                    <div class="col-md-8 col-10">
                         <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                 </div>

                 <div class="row m-3">
                    <div class="col-md-4  col-10">
                         <label for="">Address</label>
                    </div>
                    <div class="col-md-8 col-10">
                         <textarea name="address" id="address" rows="3" class="form-control"></textarea>
                    </div>
                 </div>

                <div class="row m-3">
                    <div class="col-md-4  col-10">
                         <label for="">Gender</label>
                    </div>
                    <div class="col-md-8 col-10">
                        <select name="gender" class="form-control mb-2">
                            
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            
                        </select>
                    </div>                    
                 </div>

                 <div class="row m-3">
                    <div class="col-md-4  col-10">
                         <label for="">Active</label>
                    </div>
                    <div class="col-md-8 col-10">
                        <select name="is_active" class="form-control mb-2">
                            
                                <option value="0">Active</option>
                                <option value="1">Inactive</option>
                            
                        </select>
                    </div>                    
                 </div>

                 <div class="row m-3">
                    <div class="col-md-4  col-10">
                         <label for="">Role</label>
                    </div>
                    <div class="col-md-8 col-10">
                        <select name="role_id" class="form-control mb-2">
                            <!-- <option  selected hidden disabled>Choose Your Role</option> -->
                            <?php foreach ($roles as $role): ?>
                                <option value="<?= $role->id; ?>"><?= htmlspecialchars($role->name); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>                    
                 </div>

                <div class="row m-3 g-4 text-center justify-content-center">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Insert</button>
                        <button type="reset" class="btn btn-danger">Clear</button>
                    </div>                    
                </div>
            </form>

    </div>
    
</div>