<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        background-color: black;
            background-size: cover;
        }
      a{
        color: blue;
        text-decoration: none;
      }
      
    div{
      margin: 10px;
      padding: 8px;
    }
    table{
      display: table;
      margin: 20px;
    }
    th{
      padding: 15px;
  text-align: left;
  color: yellowgreen;
    font-size: 30px;
    }
     td {
  padding: 15px;
  text-align: left;
  color: skyblue;
  font-size: 25;
}
    </style>
</head>
<body>
<center>
<h2>List of Items in Cart</h2>

<table border="2">
  <tr>    
    <th>ProductName</th>
    <th>Price</th>
    <th>Size</th>
    <th>Color</th>
    <th>Quantity</th>
    <th>Total Amount</th>
    <th>Remove to Cart</th>
    <th>Order Now</th>
  </tr>
    <h1>Welcome to your Cart</h1>

<?php
    include_once('connection.php');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
      $sql = "SELECT * FROM cart";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()){
          ?>
          <tr>
      
      <td><?php echo $row['ProductName']; ?></td>
      <td><?php echo $row['Size']; ?></td>
      <td><?php echo $row['Color']; ?></td> 
      <td><?php echo $row['Quantity']; ?></td>
      <td><?php echo $row['TotalAmount']; ?></td>       
      <td><a href="deleteCart.php?id=<?php echo $row['CartId']; ?>">Remove from Cart</a></td>
      <td><a href="addToOrder.php?id=<?php echo $row['CartId']; ?>">Order Now</a></td>

           
          </tr>	
          
        <?php
        }
      
      
      }
      ?>
</body>
</html>