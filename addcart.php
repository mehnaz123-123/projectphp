<?php
include('includes/db.php');

// STEP 1: Show Product Details by ID
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = intval($_GET['id']); // ✅ safe id
    $sql = "SELECT * FROM products WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <h2><?php echo ($row['name']); ?></h2>
        <p>Price (per item): <?php echo $row['price']; ?></p>
      <img src="<?php echo $row['image']; ?>" width="200">


        <form method="POST" action="addcart.php">

            <!-- Hidden fields -->
            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">

            <label>Quantity:</label>
            <input type="number" name="product_quantity" value="1" min="1" required><br><br>

            <input type="text" name="customer_name" placeholder="Your Name" required><br><br>
            <input type="email" name="customer_email" placeholder="Your Email" required><br><br>
            <button type="submit">Confirm Order</button>
        </form>
        <?php
    } else {
        echo "❌ Product not found!";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $quantity = $_POST['product_quantity'];
    $total_price = $price * $quantity;
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];

    if ($quantity > 0) {
        $sql = "INSERT INTO orders (product_id, product_name, product_price, product_quantity, total_price, customer_name, customer_email)
                VALUES ('$product_id', '$product_name', '$price', '$quantity', '$total_price', '$customer_name', '$customer_email')";

        if ($conn->query($sql) === TRUE) {
            echo "<div style='border:1px solid green; padding:10px; margin:10px; color:green;'>
                    <h3>✅ Order placed successfully for <b>$product_name</b>!</h3>
                    <p>Quantity: $quantity</p>
                    <p>Total Price: $total_price</p>
                    <p style='color:blue;'>Redirecting to Orders Page in 3 seconds...</p>
                  </div>";

         
            echo "<script>
                    setTimeout(function(){
                        window.location.href = 'orders.php';
                    }, 3000);
                  </script>";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "❌ Invalid Quantity!";
    }
}
?>