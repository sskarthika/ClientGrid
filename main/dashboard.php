<?php
include "db.php";
$result = $conn->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta name="description" content="Dashboard with product management">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h2>Product Dashboard</h2>
  <a href="add.php">Add Product</a> | 
  <a href="login.html" onclick="logout()">Logout</a>

  <table>
    <tr>
      <th>ID</th><th>Customer</th><th>Product</th><th>Price</th><th>Sold</th><th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= $row['customer_name'] ?></td>
      <td><?= $row['product_name'] ?></td>
      <td><?= $row['price'] ?></td>
      <td><?= $row['total_sold'] ?></td>
      <td>
        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this product?')">Delete</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>

  <script>
    if (localStorage.getItem("loggedIn") !== "true") {
      alert("Please login.");
      window.location.href = "login.html";
    }
    function logout() {
      localStorage.removeItem("loggedIn");
    }
  </script>
</body>
</html>
