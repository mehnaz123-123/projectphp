<?php
$host="localhost";
$username="root";
$password="";
$database="malefashion";
$conn=  new mysqli ($host,$uersname,$password,$database);
if($conn->connect_error){
    echo("connection failled".$conn->connect_error);
}


?>