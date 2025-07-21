<?php
include "db.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("INSERT INTO products (customer_name, product_name, price, total_sold) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssdi", $_POST['customer_name'], $_POST['product_name'], $_POST['price'], $_POST['total_sold']);
    $stmt->execute();
    header("Location: dashboard.php");
}
?>
<form method="POST">
  <input name="customer_name" placeholder="Customer Name" required>
  <input name="product_name" placeholder="Product Name" required>
  <input name="price" type="number" step="0.01" placeholder="Price" required>
  <input name="total_sold" type="number" placeholder="Total Sold" required>
  <button type="submit">Add Product</button>
</form>
