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
    .login-link {
    margin-top: 15px;
    text-align: center;
    font-size: 14px;
    color: #555;
    font-family: Arial, sans-serif;
}

.login-link a {
    color: #2e7d32; /* green shade */
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

.login-link a:hover {
    color: #1b5e20; /* darker green on hover */
    text-decoration: underline;
}

 </style>

<?php
session_start();
include('includes/db.php'); // <== semicolon added

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $name = $_POST['name'];
   $useremail = $_POST['email'];
   $password = $_POST['password'];
   $role = $_POST['role'];
   
   // your code continues here...




         $check = $conn->query("SELECT * FROM auth WHERE email = '$useremail'");
      if($check->num_rows > 0){
        echo "<script>alert('Email alerdy exists!😏')</script>";
        exit;
      }




     $sql =  "INSERT INTO auth(name , email , password , role)values('$name' , '$useremail' , '$password' , '$role')";

if($conn->query($sql)){
  $_SESSION['email'] = $useremail;
  $_SESSION['role'] = $role;
}


///redirect //
if($role == 'admin'){
  header("location: admin/dashborad.php");
}
else{
    header("location: home.php");
}






}
?> 


</head>
<body>

  <div class="form-container">
    <h2>Create an account</h2>
    <form action="index.php" method="post">
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email Address" required>
      <input type="password" name="password" placeholder="Password" required>
      
      <select name="role">
        
        <option value="user">User</option>
        <option value="admin">Admin</option>
       </select>

      <button type="submit">Register</button>
<div class="login-link">
    Already have an account? <a href="login.php">Login here</a>
</div>





    </form>
  </div>

</body>
</html>
