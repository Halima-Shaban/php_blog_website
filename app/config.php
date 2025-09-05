<?php 
session_start();


define("URL","http://127.0.0.1/eraasoft%20backend%20php/lec_7/Blog_website");

//  echo '<pre>' . URL . '/admin/index.php' . '</pre>'; 

if (!$_SESSION['auth']) {
   header("location:".URL."/admin/auth/login.php");
   die;
}

?>

