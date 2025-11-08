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
         
        //   print_r($allinfos);
           
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
                <a href="" disable="disable" class="btn btn-dark" onclick="alert('Sorry You can do nothing')">View Only</a>
            </th>
        </tr>  

        <?php endforeach; ?>
    </table>
    
</div>