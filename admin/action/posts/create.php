<?php
require_once('../../../app/config.php');
require_once('../../../database/connection.php');
require_once('../../../app/helpers.php');
require_once('../../../app/validations.php');


$title =sanitize($_POST['title']);
$publisher =sanitize($_POST['publisher']);
$content =sanitize($_POST['content']);


//validation



//insert into database
$errors =[];



   if (requiredInput($title) ) {
            $errors[] = "title is required !";
        }elseif( minInput($title,5) || maxInput($title,15)){
             $errors[] = "please enter a valid title !";
        }


           if (requiredInput($publisher) ) {
            $errors[] = "publisher is required !";
        }elseif( minInput($publisher,3) || maxInput($publisher,25)){
             $errors[] = "please enter a valid publisher !";
        }


           if (requiredInput($content) ) {
            $errors[] = "content is required !";
        }elseif( minInput($content,20) ){
             $errors[] = "content must be grater than this !";
        }elseif(maxInput($publiscontenther,10000)){
         $errors[] = "content must be smaller  than this !";

        }


    if ($_SERVER['REQUEST_METHOD'] == "POST") {


        if (empty($errors)) {
            $user_id=$_SESSION['auth']['id'];
            $sql ="INSERT INTO `posts`(`title`,`publisher`,`content`,`user_id`) 
            VALUES('$title','$publisher','$content','$user_id')";
            $result= mysqli_query($conn,$sql);

            if (mysqli_affected_rows($conn)) {
                $_SESSION['success'] = "data inserted sucssfully ";
                
                // echo "tamam ";
            }
            
            
            
        }else {
            $_SESSION['errors'] = $errors;
            
        }
        
        redirect(URL. "/admin/posts/create.php"); 


    }else{
        die("this method is not supported");
    }


    

?>