<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Admin Blog Site</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold text-primary" href="<?php echo URL;?>/admin/index.php">Blog Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo URL;?>/index.php"> Main Site</a>
            </li>
            <?php 
            if ( $_SESSION['auth']['role'] == "admin") {?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URL;?>/admin/messages/messages.php"> Messages</a>
            </li>
            <?php }?>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="postsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Posts
              </a>
              <ul class="dropdown-menu" aria-labelledby="postsDropdown">
                <li><a class="dropdown-item" href="<?php echo URL ?>/admin/posts/create.php"> Add New</a></li>
                <li><a class="dropdown-item" href="<?php echo URL ?>/admin/posts/index.php"> View All</a></li>
              </ul>
            </li>

            <?php 
            if ( $_SESSION['auth']['role'] == "admin") {?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="usersDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Users
            </a>
               <ul class="dropdown-menu" aria-labelledby="usersDropdown" >
                <li><a class="dropdown-item" href="<?php echo URL ?>/admin/users/create.php"> Add New</a></li>
                <li><a class="dropdown-item" href="<?php echo URL ?>/admin/users/index.php"> View All</a></li>
              </ul>
            </li>

           <?php }?>
             



            <li class="nav-item">
              <a class="nav-link text-danger" href="<?php echo URL;?>/admin/auth/logaout.php"> Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-cE03Q7xLkiBl5T6R9UZpLOvlhZwrG7iY++8sSGjlBt6dHjddJmwk2b6EU6RTtFMk" 
            crossorigin="anonymous"></script>
  </body>
</html>
