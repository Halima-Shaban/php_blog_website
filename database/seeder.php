<?php
// $conn =mysqli_connect("localhost","root","","blog");
// if(!$conn) {
// die("conection error");
// };

//insert messages
 require_once ('connection.php') ;

    for ($i=1; $i <=30 ; $i++) { 
$sql = "INSERT INTO `messages` (`name`,`email`,`content`,`phone`)
        VALUES('test name $i','test@eraasoft.com','Lorem ipsum, dolor sit amet consectetur 
        adipisicing elit. Deleniti qui architecto incidunt ipsam perferendis
        assumenda eos totam, autem id reiciendis.','01117772224') ";
        $result =mysqli_query($conn,$sql);

    if ($result) {
        echo "insertig done successfully";
    }
    }


//insert users


    for ($i=1; $i <=10 ; $i++) { 

        $role = rand(0, 1) ? 'admin' : 'writer';

        $password = password_hash("123456",PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`name`,`password`,`username`,`role`)
        VALUES('test name $i','$password','username-$i','$role') ";
        $result =mysqli_query($conn,$sql);

    if ($result) {
        echo "insertig done successfully";
    }
    }
//insert posts

    for ($i=1; $i <=50 ; $i++) { 
        $user =rand(1,10);
        $sql = "INSERT INTO `posts` (`title`,`publisher`,`content`,`user_id`)
        VALUES('test titel $i','test publisher $i','Lorem ipsum dolor sit amet consectetur
         adipisicing elit. Iure alias dolor deserunt 
         quisquam laudantium ex amet quos? Inventore magni
          consectetur autem alias voluptates quos quaerat
           culpa sapiente nobis cum totam sunt quas tempora 
           quia temporibus, aperiam porro ducimus corrupti
            dicta repellendus? Quod rem odit ipsa tenetur?
             Alias voluptatem illo pariatur.','$user' )";



        $result =mysqli_query($conn,$sql);

    if ($result) {
        echo "insertig done successfully";
    }
    };


//insert ito site_info
    $sql = "INSERT INTO `site_info` (`site_name`,`phone`,`linked_in`,`facebook`,`twetter`,`bio`)
        VALUES('Blog Data',
        '01162258865',
        'https://www.linkedin.com/in/halima-shaban-abdelghany/',
        'https://www.facebook.com/?locale=ar_AR',
        'https://x.com/',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit,
         veritatis!Lorem ipsum dolor sit amet consectetur adipisicing elit. 
         Fugit, veritatis!Lorem ipsum dolor sit amet consectetur adipisicing 
         elit. Fugit, veritatis!') ";



        $result =mysqli_query($conn,$sql);

    // if ($result) {
    //     echo "insertig done successfully";
    // }

    ?>
 