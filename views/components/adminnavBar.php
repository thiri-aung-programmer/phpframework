<!-- <nav class="w-50 m-auto nav navbar bg-light">
    <a href="/" class="btn btn-primary">Home</a>
    <a href="/about"class="btn btn-primary">About</a>
    <a href="/contactus" class="btn btn-primary">ContactUs</a>
</nav> -->


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">

        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="menu1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Management
          </a>
          <ul class="dropdown-menu" aria-labelledby="menu1">
            <li><a class="dropdown-item" href="user_crud">AllUsers</a></li>
            <li><a class="dropdown-item" href="admincrud">Insert Update Delete</a></li>
           
          </ul>
        </li>

       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="menu2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Permission Management
          </a>
          <ul class="dropdown-menu" aria-labelledby="menu2">
            <li><a class="dropdown-item" href="user_permissions">Users and Their Roles By Permission</a></li>
            <li><a class="dropdown-item" href="#">Features</a></li>
            <li><a class="dropdown-item" href="#">permissions</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle bg-success text-light rounded rounded-4" href="#" id="menu2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <i class="bi bi-person-circle"></i>
          <?php  if(isset($_SESSION["email"])) : ?>
           <?= $_SESSION["email"]; ?>
           <?php endif ; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="menu2">
            <li ><a class="dropdown-item" href="?p=urp">Profile <i class="bi bi-person-fill-down text-end"></i></a></li>
            <li ><a class="dropdown-item" href="logout" onclick="return confirm('Are You Sure to Leave out?')">LogOut <i class="bi bi-shield-lock-fill text-end"></i></a></li>
            
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>



</body>
</html>




</nav>
