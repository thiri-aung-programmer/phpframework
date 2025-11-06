<?php require 'partials/welcomeheader.php'; ?>
   
           
            
            
            <form action="/check" method="post" class="form mt-2 p-5 bg-dark-subtle w-50 m-auto text-center rounded rounded-2 shadow">
                <h1 class="text-center text-light bg-danger w-100 m-auto mt-3 p-2 rounded">Please Login First!!!</h1>
                <div class="row p-2">
                    <input type="text" name="email" id="" class="form-control mb-2" placeholder="abc@gmail.com" require>
                    <input type="password" name="password" id="" class="form-control mb-2" placeholder="*******" require>

                    <!-- <select name="role" class="form-control mb-2">
                        <option  selected hidden disabled>Choose Your Role</option>
                        <?php //foreach ($roles as $role): ?>
                             <option value="<? //= $role->id; ?>"><?//= htmlspecialchars($role->name); ?></option>
                        <?php //endforeach; ?>
                    </select> -->

                    <input type="submit" value="Login" class="btn btn-danger">
                </div>
            </form>
                        <?php if(isset($error)){
                            echo $error;
                        }
                        ?>
             
   <?php require 'partials/footer.php'; ?>