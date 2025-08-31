<!DOCTYPE html>
<html>
<head>
    <title>Cafe Admin</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="header">
        <img src="assets/logo.png" alt="Cafe Logo">
        <h2>Cafe Admin</h2>
    </div>
    
<div class="navbar">
    <a href="admin.php">Admin</a>
    <a href="menu.php">Menu</a>
    <a href="checkout.php">Checkout</a>
</div>

    <?php
$conn = new mysqli("localhost", "root", "", "cafe_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $sql = "INSERT INTO items (name, type, description, price) VALUES ('$name','$type','$description','$price')";
    $conn->query($sql);
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM items WHERE item_id=$id");
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $sql = "UPDATE items SET name='$name', type='$type', description='$description', price='$price' WHERE item_id=$id";
    $conn->query($sql);
}

$result = $conn->query("SELECT * FROM items");
?>

<form method="POST">
    <input type="text" name="name" placeholder="Item name" required>
    <input type="text" name="type" placeholder="Type" required>
    <input type="text" name="description" placeholder="Description" required>
    <input type="number" step="0.01" name="price" placeholder="Price" required>
    <button type="submit" name="add">Add Item</button>
</form>

<h3>Current Menu</h3>
<table>
    <tr><th>ID</th><th>Name</th><th>Type</th><th>Description</th><th>Price</th><th>Actions</th></tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['item_id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['type'] ?></td>
        <td><?= $row['description'] ?></td>
        <td>$<?= $row['price'] ?></td>
        <td><a href="admin.php?delete=<?= $row['item_id'] ?>">Delete</a></td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>