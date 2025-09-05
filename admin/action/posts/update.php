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
    $_SESSION['errors'] = [' Invalid or missing post ID'];
    redirect(URL . "/admin/posts/index.php");
    exit;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

foreach ($_POST as $key => $value){
    $$key = sanitize($value);
}


        // if($error = validateTitle($title)) {$errors[]=$error;}
        // if($error = validatePublisher($publisher)) {$errors[]=$error;}
        // if($error = validateContent($content)) {$errors[]=$error;}


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


        


        if (empty($errors)) {
            
            
                $sql = "UPDATE `posts` 
                SET `title`='$title',
                `publisher`='$publisher',
                `content`='$content' 
                WHERE `id`='$id'";
            
                $result = mysqli_query($conn,$sql);
                if (mysqli_affected_rows($conn)) {
                    $_SESSION['success']="data updated successfuly";
                        redirect(URL."/admin/posts/index.php");

            
                }else{
                    $errors = ["update error"];
                }
            }
            $_SESSION['errors'] = $errors;


                redirect(URL."/admin/action/posts/update.php?id=$id");

            }else{
                 $post = getRow("posts", $id);

                redirect(URL."/admin/posts/edit.php?id=$id");


                // die("not allowed method");
            }


