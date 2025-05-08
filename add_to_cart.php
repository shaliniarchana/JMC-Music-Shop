
<?php
session_start();
if (isset($_SESSION['cart_message'])) {
    echo "<script>alert('{$_SESSION['cart_message']}');</script>";
    unset($_SESSION['cart_message']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>JOY Music Corner - Add Product</title>
  <style>
    body {
      background: linear-gradient(to right, #8e4cd5, #4868a0);
      font-family: Arial;
      color: #fff;
      padding: 20px;
      text-align: center;
    }
    form {
      background: #fff;
      color: #000;
      padding: 20px;
      margin: auto;
      width: 300px;
      border-radius: 8px;
    }
    input, button {
      margin: 10px 0;
      width: 90%;
      padding: 10px;
    }
    table {
      margin: 20px auto;
      width: 90%;
      border-collapse: collapse;
    }
    th, td {
      padding: 10px;
      border: 1px solid #ddd;
      background: #fff;
      color: #000;
    }
    
  /*back btn -  start*/
  .button-5 {
    align-items: center;
    background-clip: padding-box;
    background-color: #fa6400;
    border: 1px solid transparent;
    border-radius: .25rem;
    box-shadow: rgba(0, 0, 0, 0.02) 0 1px 3px 0;
    box-sizing: border-box;
    color: #fff;
    cursor: pointer;
    display: inline-flex;
    font-family: system-ui,-apple-system,system-ui,"Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 16px;
    font-weight: 600;
    justify-content: center;
    line-height: 1.25;
    margin: 0;
    min-height: 3rem;
    padding: calc(.875rem - 1px) calc(1.5rem - 1px);
    position: relative;
    text-decoration: none;
    transition: all 250ms;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    vertical-align: baseline;
    width: auto;
  }

  .button-5:hover,
  .button-5:focus {
    background-color: #fb8332;
    box-shadow: rgba(0, 0, 0, 0.1) 0 4px 12px;
  }

  .button-5:hover {
    transform: translateY(-1px);
  }

  .button-5:active {
    background-color: #c85000;
    box-shadow: rgba(0, 0, 0, .06) 0 2px 4px;
    transform: translateY(0);
  }
  /*back btn -  end*/
  </style>
</head>
<body>

<h2>Add a New Product</h2>
    <form action="create.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Enter the product name" required><br>
        <input type="number" name="price" placeholder="Enter the product price" required><br>
        <input type="file" name="image"><br>
        <button type="submit">Add Product</button>
    </form>

    <button class="button-5" role="button" onclick="window.location='products.php'">Back to Products</button>

    <h2>Product List</h2>
    <table>
        <tr>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Actions</th>
        </tr>
        <?php include 'read.php';  ?>
    </table>

    </body>
</html>