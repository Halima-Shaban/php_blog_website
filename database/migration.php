<?php
 require_once ('connection.php') ;
//file connection




mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 0");

mysqli_query($conn, "DROP TABLE IF EXISTS `messages`");
mysqli_query($conn, "DROP TABLE IF EXISTS `posts`");
mysqli_query($conn, "DROP TABLE IF EXISTS `site_info`");
mysqli_query($conn, "DROP TABLE IF EXISTS `users`");

mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 1");





//create table (message)
// $sql = "DROP TABLE IF EXISTS `messages`";
// mysqli_query($conn,$sql);


$sql = "CREATE TABLE IF NOT EXISTS `messages`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(80) NOT NULL,
    `email` VARCHAR(20) NOT NULL,
    `phone` VARCHAR(80) NOT NULL,

    `content` VARCHAR(200) NOT NULL


); 
";

mysqli_query($conn,$sql);



//create table (users)
// $sql = "DROP TABLE IF EXISTS `users`";
// mysqli_query($conn,$sql);


$sql = "CREATE TABLE IF NOT EXISTS `users`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(80) NOT NULL,
    `username` VARCHAR(80) NOT NULL UNIQUE,
    `password` VARCHAR(200) NOT NULL,
    role ENUM('admin', 'writer') DEFAULT 'writer'



); 
";

mysqli_query($conn,$sql);





//create table (POSTS)
// $sql = "DROP TABLE IF EXISTS `posts`";
// mysqli_query($conn,$sql); 

$sql = "CREATE TABLE IF NOT EXISTS `posts`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(150) NOT NULL,
    `publisher` VARCHAR(20) NOT NULL,
    `content` TEXT NOT NULL,
    `user_id` INT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE

     


); 
";

mysqli_query($conn,$sql);







//create table (site_ifo)
// $sql = "DROP TABLE IF EXISTS `site_info`";
// mysqli_query($conn,$sql);

$sql = "CREATE TABLE IF NOT EXISTS `site_info`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `site_name` VARCHAR(150) NOT NULL,
    `phone` VARCHAR(80) NOT NULL,
    `linked_in` VARCHAR(150) NOT NULL,
    `facebook` VARCHAR(150) NOT NULL,
    `twetter` VARCHAR(150) NOT NULL,
    `bio` TEXT NOT NULL


); 
";

mysqli_query($conn,$sql);


require_once 'seeder.php';

?>
