<?php require 'views/partials/header.php'; 
    use controllers\PagesController;
    use controllers\PermissionsController;
    use controllers\UserController;
    use controllers\StockController;
?>
<div>

   
    <h2 class="text-success bg-secondary-subtle p-3 text-center fw-bold">All Of The Permissions</h2>
    <table class="table table-striped table-light w-75 m-auto text-center">
        <tr>
            <th>PermissionID</th>  
            <th>Role</th>          
            <th>Permissions</th>
             <th>Features</th>
            <th></th>
        </tr>
            <prep>
         <?php 
         
        //    print_r(implode("",$_SESSION['permission']) . "\n");
        //    print_r(implode("",$_SESSION['feature']) . "\n");
         ?>
         </prep>
        <?php foreach ($allpermissions as $permission): ?>
        <tr>
           
            <th><?= $permission['ID']; ?></th>
            <th><?= $permission['Role']; ?></th>
             <th><?= $permission['Permission']; ?></th>
            <th><?= $permission['Feature']; ?></th>
            
            <th>
                <a href="" class="btn btn-warning p-1"><i class="bi bi-pencil-square"></i></a>
                <a href="" class="btn btn-danger p-1" onclick="return confirm('Are You Sure to delete?')"><i class="bi bi-trash3-fill"></i></a>
            </th>
        </tr>  

        <?php endforeach; ?>
    </table>


     <div class="w-75 m-auto">
        <h2 class="text-success bg-secondary-subtle p-3 text-center fw-bold mt-3">Insert New Permission</h2>
            <form class="w-100 p-3 bg-light shadow-sm" action="permissions_crud" method="post">

                 


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

                 <div class="row m-3">
                    <div class="col-md-4  col-10">
                         <label for="">Feature</label>
                    </div>
                    <div class="col-md-8 col-10">
                        <select name="feature_id" class="form-control mb-2">
                            <!-- <option  selected hidden disabled>Choose Your Feature</option> -->
                            <?php foreach ($features as $feature): ?>
                                <option value="<?= $feature->id; ?>"><?= htmlspecialchars($feature->name); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>                    
                 </div>


                 <div class="row m-3">
                    <div class="col-md-4  col-10">
                         <label for="">Name</label>
                    </div>
                    <div class="col-md-8 col-10">
                         <input type="text" class="form-control" id="name" name="name">
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