    <?php require 'partials/header.php';
    use controllers\PagesController;
    use controllers\PermissionsController;
    use controllers\UserController;
    use controllers\StockController;
    
    ?>
   
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
                        <input type="text" class="form-control" id="role" name="role">
                    </div>                    
                 </div>

                <div class="row m-3 g-4 text-center justify-content-center">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-danger">Clear</button>
                    </div>                    
                </div>
            </form>

    </div>
    
</div>


            