<?php
require_once('../../../app/config.php');
require_once('../../../database/connection.php');
require_once('../../../app/helpers.php');
$id=$_GET['id'];
// var_dump(URL."/admin/messages.php");
// die;

$sql ="DELETE FROM `posts` WHERE `id`='$id' ";

$result = mysqli_query($conn,$sql);

if (mysqli_affected_rows($conn)) {
    $_SESSION['success'] = "item deleted successfully";
  redirect(URL."/admin/posts/index.php");
}else{
    echo "mish tmam";
}

?> 