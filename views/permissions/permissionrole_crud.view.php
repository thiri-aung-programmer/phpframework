
<?php require 'views/partials/header.php'; 
    use controllers\PagesController;
    use controllers\PermissionsController;
    use controllers\UserController;
    use controllers\StockController;
    use core\App;


     $selected="HI";
    //  $permissions=[];     

?>        
 
 

                         

<div>
    

   
    <h2 class="text-success bg-secondary-subtle p-3 text-center fw-bold">The Roles and Their Permissions</h2>
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
           
            <th><?= $permission['ID'] ?? '';  ?></th>
            <th><?= $permission['Role']?? '';  ?></th>
             <th><?= $permission['Permission'] ?? '';  ?></th>
            <th><?= $permission['Feature'] ?? '';  ?></th>
            
            <th>
                <a href="" class="btn btn-warning p-1"><i class="bi bi-pencil-square"></i></a>
                <a href="" class="btn btn-danger p-1" onclick="return confirm('Are You Sure to delete?')"><i class="bi bi-trash3-fill"></i></a>
            </th>
        </tr>  

        <?php endforeach; ?>
    </table>



     <div class="w-75 m-auto">        


            <!-- --------- permisssion နဲ့ feature ကို checkbox နဲ့ ရွေးတဲ form ဆောက်တာ အစ--------------- -->
            <h2 class="text-success bg-secondary-subtle p-3 text-center fw-bold mt-3">Insert New Permission</h2>
             <!-- <form class="w-100 p-3 bg-light shadow-sm"   method="post" id="form1">
                
            </form> -->
    <!-- script နဲ့ php ထဲထည့်တာရောနှစ်ခုစလုံး စမ်းထည့်ကြည့် အစ -->

   
<!-- script အစ -->

<script>

</script>
 <!-- script အဆုံး -->

            
            
    <!-- script နဲ့ php ထဲထည့်တာရောနှစ်ခုစလုံး စမ်းထည့်ကြည့် အဆုံး -->
                       <!-- Checkbox list -->      
            <!-- <div id="permissionContainer" class="row"> -->
                    <!-- JS က ဒီနေရာမှာ checkbox list generate လုပ်မယ် -->
            <!-- </div> -->
            <form class="w-100 p-3 bg-light shadow-sm" action="permissionrole_crud" method="post" id="form2">
                    <!-- ဒီနေရာက Role ကို selectbox ထည့်ထားတဲ့ဟာ အဲဒါကို အပေါ်မှာ ခဏထည့်တာ  -->
                       <!-- <input type="text" value="//$_POST['selected_value'] ?? ''" id="role" name="role">        -->
                    <div class="row m-3">
                    <div class="col-md-4  col-10">
                         <label for="">Role</label> 
                    </div>
                    <div class="col-md-8 col-10">
                        <select name="role_id" id="role_id" class="form-control mb-2" onchange="changeRole();">
                            <!-- <option  selected hidden disabled>Choose Your Role</option> -->
                            <?php foreach ($roles as $role): ?>
                                <option value="<?= $role->id;  ?>"><?= htmlspecialchars($role->name) ?? ''; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>                    
                 </div>
                 <?php 
                // $selectedPermissions=[];
                            // echo $selected;
                    // if(isset($_POST['selected_value'])) {
                   
                    //     echo $_POST['selected_vlaue'];
                       // $selectedPermissions=App::get('database')->selectAllPermissionsByRoleId($_POST['selected_value']);
                       
                   //}
                     
                    // }
                 ?>
                     <!-- <p id="msg"></p> -->
                <h3 class="text-secondary bg-light mt-3 p-3 text-center">Permissions And Features</h3>
                
                
                    <div class="row">
                        <?php foreach ($permission_features as $per_feature): ?>
                        <div class="col-md-3 p-2">
                                <!-- checkbox အစ  -->
                            <label class="form-control">
                                <?php if(in_array($per_feature['id'][0],$selectedPermissions,true)): ?>
                                     <input  type="checkbox" name="permissions[]" id="permissions[]" value="<?= $per_feature['id'][0]; ?>" checked>
                               
                                <?php else : ?>
                                    <input  type="checkbox" name="permissions[]" id="permissions[]" value="<?= $per_feature['id'][0]; ?>">   
                                <?php endif; ?>                      
                                <?= $per_feature['name'][0]; ?> , <?= $per_feature['name'][1]; ?> 
                            </label>
                             <!-- checkbox အဆုံး  -->
                        </div>
                            <?php endforeach; ?>
                    </div>
                   
                

                
                 
                    <div class="row m-3 g-4 text-center justify-content-center">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Insert</button>
                        <button type="reset" class="btn btn-danger">Clear</button>
                    </div>                    
                </div>
                    

                 
            </form>
             <!-- --------- permisssion နဲ့ feature ကို checkbox နဲ့ ရွေးတဲ form ဆောက်တာ အဆုံး--------------- -->
    </div>
    
</div>

