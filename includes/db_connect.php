<?php
$host_name = "localhost";
$db_name = "weza";
$server_name = "root";
$server_pass="";
$conn = mysqli_connect($host_name,$server_name,$server_pass,$db_name);
if(mysqli_connect_errno()){
    die("Failed To Connect To The Database ".mysqli_connect_error());
}
