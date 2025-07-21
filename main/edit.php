<?php
include "db.php";
$id = $_GET['id'];
$product = $conn->query("SELECT * FROM products WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("UPDATE products SET customer_name=?, product_name=?, price=?, total_sold=? WHERE id=?");
    $stmt->bind_param("ssdii", $_POST['customer_name'], $_POST['product_name'], $_POST['price'], $_POST['total_sold'], $id);
    $stmt->execute();
    header("Location: dashboard.php");
}
?>
<form method="POST">
  <input name="customer_name" value="<?= $product['customer_name'] ?>" required>
  <input name="product_name" value="<?= $product['product_name'] ?>" required>
  <input name="price" type="number" step="0.01" value="<?= $product['price'] ?>" required>
  <input name="total_sold" type="number" value="<?= $product['total_sold'] ?>" required>
  <button type="submit">Update Product</button>
</form>
