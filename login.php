<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registration Form with Select</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form-container {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      width: 350px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    select {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    button {
      width: 100%;
      padding: 10px;
      background: #007BFF;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background: #0056b3;
    }
 </style>



<?php
session_start();
include('includes/db.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
$useremail = $_POST['email'];
  $userpassword = $_POST['password'];
$role=$_POST['role'];


$sql = $conn->query("SELECT * FROM auth where email = '$useremail'");




if($sql && $sql->num_rows == 1){
  $userrow =   $sql->fetch_assoc();


if(password_verify($password,$userrow[$password])){
     $_SESSION['email'] = $useremail;
  $_SESSION['role'] = $userrole;




  /// redirect based on roles //

  if($userrole == 'admin')
{
  header("location: admin/dashboard.php");
}
else{
    header("location: home.php");

}

 exit;
 } 
 else {
            echo "<script>alert('Invalid password!'); window.location='login.php';</script>";
        }
    }else {
        echo "<script>alert('Email not found!'); window.location='login.php';</script>";
    }

}

?>

</head>
<body>

  <div class="form-container">
    <h2>Register</h2>
    <form action="login.php" method="post">
     
      <input type="email" name="email" placeholder="Email Address" required>
      <input type="password" name="password" placeholder="Password" required>
      
      
      <button type="submit">login</button>
    </form>
  </div>

</body>
</html>



