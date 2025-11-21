<?php require 'views/partials/header.php'; 
    use controllers\PagesController;
    use controllers\PermissionsController;
    use controllers\UserController;
    use controllers\StockController;
?>
<div>

   
    <h2 class="text-success bg-secondary-subtle p-3 text-center fw-bold">The Permissions For Various Features</h2>
    <table class="table table-striped table-light w-75 m-auto text-center">
        <tr>
            <th>PermissionID</th>            
             <th>Features</th>
              <th>Permissions</th>
            <th></th>
        </tr>
            <prep>
         <?php 
         
        //    print_r(implode("",$_SESSION['permission']) . "\n");
        //    print_r(implode("",$_SESSION['feature']) . "\n");
         ?>
         </prep>
        <?php foreach ($permission_features as $permission_feature): ?>
        <tr>
           
            <th><?= $permission_feature['id'][0]; ?></th>
           
             <th><?= $permission_feature['name'][0]; ?></th>
            <th><?= $permission_feature['name'][1]; ?></th>
            
            <th>
                <a href="permission_update?id=<?= $permission_feature['id'][0]?>" class="btn btn-warning p-1"><i class="bi bi-pencil-square"></i></a>
                <a href="permission_delete?did=<?= $permission_feature['id'][0]?>" class="btn btn-danger p-1" onclick="return confirm('Are You Sure to delete?')"><i class="bi bi-trash3-fill"></i></a>
            </th>
        </tr>  

        <?php endforeach; ?>
    </table>
            <?php 
            $uname="";
            $fid="";
                if(isset($updateInfo)){
                    foreach($updateInfo as $update){
                        $uname=$update['name'];
                        $fid=$update['feature_id'];
                        // dd($uname);
                    }

            }
            ?>

     <div class="w-75 m-auto">
        <h2 class="text-success bg-secondary-subtle p-3 text-center fw-bold mt-3">Insert New Permission</h2>
            <form class="w-100 p-3 bg-light shadow-sm" action="permission_update" method="post">

                 


                 

                 <div class="row m-3">
                    <div class="col-md-4  col-10">
                         <label for="">Feature</label>
                    </div>
                    <div class="col-md-8 col-10">
                        <select name="feature_id" class="form-control mb-2">
                            <!-- <option  selected hidden disabled>Choose Your Feature</option> -->
                            <?php foreach ($features as $feature): ?>
                                <?php if($feature->id==$fid): ?>
                                    <option value="<?= $feature->id; ?>" selected><?= htmlspecialchars($feature->name); ?></option>
                                <?php else : ?>
                                    <option value="<?= $feature->id; ?>"><?= htmlspecialchars($feature->name); ?></option>
                                <?php endif; ?>
                                
                            <?php endforeach; ?>
                        </select>
                    </div>                    
                 </div>


                 <div class="row m-3">
                    <div class="col-md-4  col-10">
                         <label for="">Name</label>
                    </div>
                    <div class="col-md-8 col-10">
                         <input type="text" class="form-control" id="name" name="name" value="<?= $uname;?>">
                    </div>
                 </div>


                 

                

                <div class="row m-3 g-4 text-center justify-content-center">
                    <div class="col-md-4">
                        <?php if(isset($updateInfo)):?>
                            <input type="submit" name="update"  class="btn btn-info" value="Update">
                            <!-- <button type="submit" class="btn btn-info">Update</button> -->
                        <?php else : ?>
                            <input type="submit" name="insert" class="btn btn-primary" value="Insert">
                            <!-- <button type="submit" class="btn btn-primary">Insert</button> -->
                        <?php endif;?>
                        <button type="reset" class="btn btn-danger">Clear</button>
                    </div>                    
                </div>
            </form>


                              
    </div>
    
</div>