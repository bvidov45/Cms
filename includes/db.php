<?php

$host = "127.0.0.1";
$username = "root";
$password = "";
$db_name = "cms";

$conn = mysqli_connect($host,$username,$password,$db_name);
if(!$conn){
    die("C;onnection Failed" . mysqli_error($conn));
}


?>
