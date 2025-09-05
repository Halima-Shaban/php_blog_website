<?php
session_start();
define("URL", "http://127.0.0.1/eraasoft%20backend%20php/lec_7/Blog_website");


require_once('./database/connection.php'); ?>

<?php require_once('./inc/header.php') ?>


<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative ">

        <!-- Login Form -->
        <div class="container d-flex justify-content-center align-items-center ">
            <div class="card shadow p-4 rounded-4" style="width: 400px;">
                <h3 class="text-center mb-4">Login</h3>
                <form method="POST" action="<?php echo URL . "/admin/action/auth/login.php" ?>">
                    <?php require_once('./inc/alert.php') ?>

                    <div class="mb-3">
                  <label class="form-label">User Name</label>
                  <input type="text" name="username" class="form-control" placeholder="Enter username">
                </div>
                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Enter password">
                </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                    <p class="text-center mt-3 mb-0 text-dark">
                        Don’t have an account? <a href="index.php?url=register">Register</a>
                    </p>
                </form>
            </div>
        </div>

    </div>
</header>





<?php require_once('./inc/footer.php') ?>