<?php
require_once('../../../app/config.php');
require_once('../../../database/connection.php');
require_once('../../../app/helpers.php');
require_once('../../../app/validations.php');


// $name =sanitize($_POST['name']);
// $username =sanitize($_POST['username']);
// $password =sanitize($_POST['password']);

$errors =[];


foreach ($_POST as $key => $value) {
    $$key = sanitize($value);
}

//validation

if (requiredInput($name) ) {
    
            $errors[] = "Name is requierd!";
        } elseif( minInput($name,3) || maxInput($name,15)){
             $errors[] = "please enter a valid name !";
        }



if (requiredInput($username)) {
            
            
            $errors[] = "User Name is requierd!";
    
        } elseif( minInput($username,3) || maxInput($username,15)){
             $errors[] = "please enter a valid name !";
        }




if (requiredInput($password)) {

            $errors[] = "password is requierd!";
        } elseif( minInput($password,6) ){
             $errors[] = "password must be grater than this !";
        }elseif(maxInput($password,10)){
         $errors[] = "password must be smaller  than this !";

        }


        if (requiredInput($role)) {
            
            
            $errors[] = "role  is requierd!";
    
        } elseif(!in_array($role, ['admin', 'writer'])){
             $errors[] = "Invalid role selected!";
        }


//insert into database

    if ($_SERVER['REQUEST_METHOD'] == "POST") {


            $check_sql="SELECT * FROM `users` WHERE `username`='$username' ";
        $check_result = mysqli_query($conn,$check_sql);

        if (mysqli_num_rows($check_result) > 0) {
                    $errors[] = "Username already exists. Please choose another one.";

        }

        if (empty($errors)) {
            $password = password_hash($password,PASSWORD_DEFAULT);
            $sql ="INSERT INTO `users`(`name`,`username`,`password`,`role`) 
            VALUES('$name','$username','$password','$role')";
            $result= mysqli_query($conn,$sql);

            if (mysqli_affected_rows($conn)) {
                $_SESSION['success'] = "User inserted sucssfully ";
                
                // echo "tamam ";
            }
            
            
            
        }else {
            $_SESSION['errors'] = $errors;
            
        }
        
        redirect(URL. "/admin/users/create.php"); 


    }else{
        die("this method is not supported");
    }


    

?>