<?php 
session_start();
require_once('./database/connection.php');
require_once('./app/helpers.php');
require_once('./app/validations.php');


    //check form request


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = sanitize($_POST['name']);
        $email = sanitize($_POST['email']);
        $phone = sanitize($_POST['phone']);
        $message = sanitize($_POST['message']);

        $errors =[];


        // //validation
        // //name validation=>required,<3,>15

        
        if (requiredInput($name) ) {
            $errors[] = "name is required !";
        }elseif( minInput($name,3) || maxInput($name,15)){
             $errors[] = "please enter a valid name !";
        }

        

        // //rules ->required , email

        if (requiredInput($email)) {
            $errors[] = "email is required !";
        }elseif(emailInput($email)){
             $errors[] = "please enter a valid email !";
        }


        // //phone validation=>required,int,<6,>12

        if (requiredInput($phone)) {
                    $errors[] = "phone is required !";
                }elseif (isNotDigits($phone)) {
                    $errors[] = "phone must contain digits only!";
                }elseif( minInput($phone,6) || maxInput($phone,12) ){
                    $errors[] = "please enter a valid phone !";
                }

        // //messags validation=>required
        if (requiredInput($message)) {
            $errors[] = "message is required !";
        }elseif(maxInput($name,20) ){
             $errors[] = "the message is to short !";
        }


  


        if (empty($errors)) {
            $sql ="INSERT INTO `messages`(`name`,`email`,`phone`,`content`) 
            VALUES('$name','$email','$phone','$message')";
            $result= mysqli_query($conn,$sql);

            if (mysqli_affected_rows($conn)) {
                $_SESSION['success'] = "message sent successfully ";
                
                // echo "tamam ";
            }
            
            
            
        }else {
            $_SESSION['errors'] = $errors;
            
        }
        
        redirect("index.php?url=contact"); 


    }else{
        die("this method is not supported");
    }


    

?>