<?php
include(__DIR__ . '/../includes/db.php');

// Agar id pass hui hai to data fetch karo
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT * FROM contacts WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Record not found!");
    }
}

// Agar form submit ho jaye
if (isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $message = $_POST['user_message'];

    $sql = "UPDATE contacts
            SET user_name='$name', user_email='$email', user_message='$message'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record updated successfully'); window.location.href='contact.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record</title>
    
</head>
<body>
    <h2 style ="text-align:center">Update Record</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label>User Name:</label><br>
        <input type="text" name="user_name" value="<?php echo $row['user_name']; ?>"><br><br>

        <label>User Email:</label><br>
        <input type="email" name="user_email" value="<?php echo $row['user_email']; ?>"><br><br>

        <label>User Message:</label><br>
        <textarea name="user_message"><?php echo $row['user_message']; ?></textarea><br><br>

        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>