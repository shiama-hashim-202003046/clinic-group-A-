<?php 
session_start();

// database Connection

$conn = mysqli_connect("localhost","root","","clinic");
mysqli_set_charset($conn,'UTF8');
mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_query($conn,'SET CHARACTER SET utf8');

if($conn){
//    echo "connection is good";
}else{
    echo "Database Not Found";
}

global $conn; // to use the connection in another file

?>