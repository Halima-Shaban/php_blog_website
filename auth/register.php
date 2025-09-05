<?php
session_start();

require_once('database/connection.php'); ?>

<?php require_once('./inc/header.php') ?>


<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative ">

<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow p-4 rounded-4" style="width: 400px;">
    <h3 class="text-center mb-4">Register</h3>
    <form>
      <div class="mb-3">
        <label for="fullname" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="fullname" placeholder="Enter full name">
      </div>
      <div class="mb-3">
        <label for="regEmail" class="form-label">Email address</label>
        <input type="email" class="form-control" id="regEmail" placeholder="Enter email">
      </div>
      <div class="mb-3">
        <label for="regPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="regPassword" placeholder="Password">
      </div>
      <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm password">
      </div>
      <button type="submit" class="btn btn-success w-100">Register</button>
      <p class="text-center mt-3 mb-0">
        Already have an account? <a href="login.html">Login</a>
      </p>
    </form>
  </div>
</div>


 </div>
</header>





<?php require_once('inc/footer.php') ?>