<?php require 'views/partials/adminheader.php'; ?>
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
         
           print_r(implode("",$_SESSION['permission']) . "\n");
           print_r(implode("",$_SESSION['feature']) . "\n");
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
    
</div>