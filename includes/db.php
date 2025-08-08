<?php
$host="localhost";
$username="root";
$password="";
$database="fashion";
$conn= new mysqli($host,$username,$password,$database);
if($conn->connect_error){
echo("connection failed.$conn->connect_error");
}





?>