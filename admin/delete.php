<?php
include(__DIR__.'/../includes/db.php');
if(isset($_GET['id'])){
    $id= intval($_GET['id']);
    $sql= "DELETE FROM contacts WHERE id = $id";
    if($conn->query($sql)=== true){
        echo"<script>alert('record deleted successfully'); window.location.href='contact.php';</script>";
    }
    else{
        echo"error deleting record:" .$conn->error;
    }
}



?>