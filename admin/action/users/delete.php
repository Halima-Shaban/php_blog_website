<?php
require_once('../../../app/config.php');
require_once('../../../database/connection.php');
require_once('../../../app/helpers.php');
$id=$_GET['id'];


$sql ="DELETE FROM `users` WHERE `id`='$id' ";

// $sql ="DELETE `users`,`posts` FROM `users` LEFT JOIN `posts` ON `users`.`id`= `posts`.`user_id` WHERE `users`.id = '$id'";


$result = mysqli_query($conn,$sql);

if (mysqli_affected_rows($conn)) {
    $_SESSION['success'] = "User deleted successfully";
  redirect(URL."/admin/users/index.php");
}else{
    echo "sumthing went rong please try again!";
}

?> 