<?php
require_once('../../../app/config.php');
require_once('../../../app/db.php');
require_once('../../../database/connection.php');

require_once('../../../app/helpers.php');
require_once('../../../app/validations.php');

// $post = getRow("posts",$_GET['id']);
// $id=$_GET['id'];


$id = $_GET['id'] ?? $_POST['id'] ?? null;

if (!$id || !is_numeric($id)) {
    $_SESSION['errors'] = [' Invalid or missing user ID'];
    redirect(URL . "/admin/users/index.php");
    exit;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

foreach ($_POST as $key => $value){
    $$key = sanitize($value);
}


 
        if (requiredInput($name) ) {
            $errors[] = "name is required !";
        }elseif( minInput($name,3) || maxInput($name,15)){
             $errors[] = "please enter a valid name !";
        }

       


            $newPasswordSQLUpdate = "`name`='$name', `username`='$username'";;

            if (!requiredInput($name)) {

                 $hashed_password= password_hash($password,PASSWORD_DEFAULT);


                 $newPasswordSQLUpdate .=", `password` = '$hashed_password'";

            }


 if (empty($errors)) {


    $sql = "UPDATE `users` 
    SET `name`='$name',
    `username`='$username',
     $newPasswordSQLUpdate
    WHERE `id`='$id'";

    $result = mysqli_query($conn,$sql);
    if (mysqli_affected_rows($conn)) {
        $_SESSION['success']="User updated successfuly";
            redirect(URL."/admin/users/index.php");


    }else{
        $errors = ["update error"]; 
    }
        }

            $_SESSION['errors'] = $errors;


                redirect(URL."/admin/action/users/update.php?id=$id");
        }else{
                 $user = getRow("users", $id);

                redirect(URL."/admin/users/edit.php?id=$id");


                // die("not allowed method");
            }

    // redirect(URL."/admin/posts/index.php");
