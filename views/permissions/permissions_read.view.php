<?php require 'views/partials/header.php'; 
    use controllers\PagesController;
    use controllers\PermissionsController;
    use controllers\UserController;
    use controllers\StockController;

?>
<div>
    <h2 class="text-success bg-secondary-subtle p-3 text-center fw-bold">Permissions By Roles</h2>
    <table class="table table-striped table-light w-75 m-auto text-center">
        <tr>
            <th>No.</th>
            <th>Role</th>
            <th>Feature</th>    
            <th>Permission</th>       
        </tr>
            <prep>
         <?php 
         $no=1;
                // var_dump($allinfos);
                // die();
        //    print_r(implode("",$_SESSION['permission']) . "\n");
        //    print_r(implode("",$_SESSION['feature']) . "\n");
         ?>
         </prep>
        <?php foreach ($allinfos as $info): ?>
        <tr>
            <th><?= $no++; ?></th>
            <th><?= $info['Role']; ?></th>
            <th><?= $info['Feature']; ?></th>
            <th><?= $info['Permission']; ?></th>
           
            
        </tr>  

        <?php endforeach; ?>
    </table>
    
</div>