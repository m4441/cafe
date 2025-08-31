<?php
$conn = new mysqli("localhost", "root", "", "cafe_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['checkout'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $cartData = json_decode($_POST['cartData'], true);

    // Validate phone is digits only
    if (!preg_match("/^[0-9]+$/", $phone)) {
        die("<p style='color:red;'>Invalid phone number. Please enter digits only.</p>");
    }

    // Validate cart is not empty
    if (empty($cartData)) {
        die("<p style='color:red;'>You must order at least one product before checkout.</p>");
    }

    // Save customer (Prepared Statement)
    $stmt = $conn->prepare("INSERT INTO customers (name, email, phone) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $phone);
    $stmt->execute();
    $customer_id = $stmt->insert_id;
    $stmt->close();

    // Create order
    $stmt = $conn->prepare("INSERT INTO orders (customer_id, order_date) VALUES (?, NOW())");
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    $order_id = $stmt->insert_id;
    $stmt->close();

    // Save ordered items
    $stmt = $conn->prepare("INSERT INTO order_details (order_id, item_id, quantity) VALUES (?, ?, ?)");
    foreach ($cartData as $item) {
        $item_id = (int)$item['id'];
        $qty = (int)$item['qty'];
        $stmt->bind_param("iii", $order_id, $item_id, $qty);
        $stmt->execute();
    }
    $stmt->close();

    // Generate receipt
    echo "<h2>Receipt</h2>";
    echo "Thank you, " . htmlspecialchars($name) . ". Your order ID is $order_id.<br>";
    echo "You ordered:<ul>";
    $total = 0;
    foreach ($cartData as $item) {
        $lineTotal = $item['price'] * $item['qty'];
        echo "<li>" . htmlspecialchars($item['name']) . " (x{$item['qty']}) - $" . number_format($lineTotal, 2) . "</li>";
        $total += $lineTotal;
    }
    echo "</ul>";
    echo "<strong>Total: $" . number_format($total, 2) . "</strong>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="header">
        <img src="assets/logo.png" alt="Cafe Logo">
        <h2>Checkout</h2>
    </div>

    <div class="navbar">
        <a href="admin.php">Admin</a>
        <a href="menu.php">Menu</a>
        <a href="checkout.php">Checkout</a>
    </div>

    <form method="POST">
        <input type="text" name="name" placeholder="Your Name" required><br>
        <input type="email" name="email" placeholder="Your Email" required><br>
        <input type="text" name="phone" placeholder="Your Phone"
               required pattern="[0-9]+" title="Please enter numbers only"><br>
        <input type="hidden" name="cartData" value='<?= isset($_POST["cartData"]) ? htmlspecialchars($_POST["cartData"]) : "" ?>'>
        <button type="submit" name="checkout">Place Order</button>
    </form>
</body>
</html>
