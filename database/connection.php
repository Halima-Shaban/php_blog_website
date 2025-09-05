<?php
$conn =mysqli_connect("localhost","root","","blog");
if(!$conn) {
die("conection error");
}; 

$sql_site_info = "SELECT * FROM `site_info` LIMIT 1";
$result_site_info =mysqli_query($conn,$sql_site_info);



// var_dump(mysqli_fetch_assoc($result_site_info));

$site_info =mysqli_fetch_assoc($result_site_info);

// var_dump($site_info);
// die;
?>