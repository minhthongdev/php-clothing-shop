
<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "web_database";
$con = mysqli_connect($host, $user, $password, $database);
if(mysqli_connect_errno()){
    echo " connection fail : ".mysqli_connect_errno(); exit;
}
 

