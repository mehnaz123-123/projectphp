<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
  table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-family: Arial, sans-serif;
    font-size: 16px;
    text-align: left;
  }

  th, td {
    border: 1px solid #ddd;
    padding: 12px;
  }

  th {
    background-color: #4CAF50;
    color: white;
  }

  tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  tr:hover {
    background-color: #f1f1f1;
  }
</style>
</head>
<body>
    <h1 style="text_align:center">contact_record</h1>
    <table>
<tr>
<th>ID</th>
<th>NAME</th>
<th>MAIL</th>
<th>MESSAGE</th>
<th>ACTION TYPE</th>
<th>ACTION TYPE</th>

</tr>
<?php
include(__DIR__.'/../includes/db.php');
$sql="SELECT * FROM contacts";
$result= $conn->query($sql);
while($row= $result->fetch_assoc()){
echo"<tr>
<td>".$row['id']."</td>
<td>".$row['user_name']."</td>
<td>".$row['user_email']."</td>
<td>".$row['user_message']."</td>
<td><a href='update.php?id=".$row['id']."'>Update</a></td>
<td><a href='delete.php?id=".$row['id']."'
onclick=\"return confirm('Are u sure you want to delete this record?')\">Delete</a></td>







</tr>";




}




?>



    </table>
</body>
</html>