<?php

session_start();


define("URL","http://127.0.0.1/eraasoft%20backend%20php/lec_7/Blog_website");
require_once('../../../database/connection.php');
require_once('../../../app/helpers.php');
require_once('../../../app/validations.php');


// $title =sanitize($_POST['title']);
// $publisher =sanitize($_POST['publisher']);
// $content =sanitize($_POST['content']);


foreach ($_POST as $key => $value) {
    $$key = sanitize($value);
}

//validation
//username validation=>requierd,<3,>15
//passord validation =>requierd,<6,>15


//insert into database
$errors =[];
    if ($_SERVER['REQUEST_METHOD'] == "POST") {


if (requiredInput($username) || requiredInput($password)) {

 
    
            $errors[] = "please enter the requier data!";
        } 




            if (!empty($errors)) {
                            $_SESSION['errors'] = $errors;
                            redirect(URL."/auth/login.php");
                        }
        if (empty($errors)) {

               $sql="SELECT *FROM `users` where `username`='$username'";
                $result=mysqli_query($conn,$sql);
                $user =mysqli_fetch_assoc($result);


    if (password_verify($password,$user['password'])) {
        $_SESSION['auth'] = $user; 


        if ($user['role'] == 'admin' ||$user['role'] == 'writer' ) {
           
            redirect(URL."/admin/index.php");
        }else {
            redirect(URL);

        }


 
    }else{
        $errors[] = "user name or password not correct!";
        $_SESSION['errors'] = $errors;
                
            redirect(URL."/auth/login.php");
    }

            
        }



        
     
        


    }else{
        die("this method is not supported");
    }


    

?>