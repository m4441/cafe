<?php
$conn = new mysqli("localhost", "root", "", "cafe_db");
$result = $conn->query("SELECT * FROM items");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cafe Menu</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="header">
        <img src="assets/logo.png" alt="Cafe Logo">
        <h2>Cafe Menu</h2>
    </div>

    <div class="navbar">
        <a href="admin.php">Admin</a>
        <a href="menu.php">Menu</a>
        <a href="checkout.php">Checkout</a>
    </div>

    <table>
        <tr><th>Name</th><th>Type</th><th>Description</th><th>Price</th><th>Action</th></tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['type'] ?></td>
            <td><?= $row['description'] ?></td>
            <td>$<?= $row['price'] ?></td>
            <td><button onclick="addToCart(<?= $row['item_id'] ?>, '<?= $row['name'] ?>', <?= $row['price'] ?>)">Add</button></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <div id="cart"></div>

    <!-- Checkout form -->
<form id="checkoutForm" method="POST" action="checkout.php" onsubmit="return validateCheckout()">
    <input type="hidden" name="cartData" id="cartData">
    <button type="submit">Go to Checkout</button>
</form>

<script>
    let cart = [];

    function addToCart(id, name, price) {
        cart.push({id, name, price, qty: 1});
        displayCart();
    }

    function displayCart() {
        let output = "<h3>Cart</h3><ul>";
        let total = 0;
        cart.forEach(item => {
            output += `<li>${item.name} - $${item.price}</li>`;
            total += parseFloat(item.price);
        });
        output += `</ul><p>Total: $${total.toFixed(2)}</p>`;
        document.getElementById("cart").innerHTML = output;

        // Save cart JSON in hidden field for checkout
        document.getElementById("cartData").value = JSON.stringify(cart);
    }

    function validateCheckout() {
        if (cart.length === 0) {
            alert("⚠️ You must add at least one item before checkout!");
            return false; // stop form submission
        }
        return true;
    }
</script>

</body>
</html>
