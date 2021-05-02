<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>BORUTOY</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Roboto Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700&display=swap">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="homecssandjs/boostrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="homecssandjs/mdb-pro.min.css">
  <!-- Material Design Bootstrap Ecommerce -->
  <link rel="stylesheet" href="homecssandjs/mdb.ecommerce.min.css">
  <!-- TRENDING BOOSTRAP -->
  <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css'>

  <!-- FONT -->
  <link href='https://fonts.googleapis.com/css?family=Actor' rel='stylesheet'>

  <!-- Ahref verification -->
  <meta name="ahrefs-site-verification" content="cd945a30a32beb9f20f22626c5f801f2063a726c6fd9af1db55ce27eafaa1e45">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
</head>
<body class="fixed-sn skin-light mdb-skin-custom" >

    <div class="container-fluid">
      <div class="row" style=" padding:20px;">

      <?php
      session_start();
    include_once('connection.php');
    // echo $_SESSION['UserId'];
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }else{
     
      $sql="SELECT products.ProductId, products.ProductName,products.ProductPhoto,products.ProductType,products.Description,products.OriginalPrice, 
      products.Price, products.Rating, cart.CartId,cart.Size,cart.Color, cart.Quantity, cart.TotalAmount FROM (cart INNER JOIN products ON products.ProductId = cart.ProductId)";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()){
          
      ?>

      <div class="card col-sm-4" style=" width:20rem;height: fit-content">
        <form method="POST">
        <span><?php echo $row['CartId']; ?></span>
        <input id="userId" name="userId" style="visibility:hidden;height:10px;width:20px;margin:0px" value="<?php echo $_SESSION['UserId']?>">
        <input id="cartId" name="cartId" style="visibility:hidden;height:10px;width:20px;margin:0px" value="<?php echo $row['CartId']?>">
          <div class="view zoom overlay">
            <img class="img-fluid w-100" src="<?php echo $row['ProductPhoto']; ?>" alt="Sample">
            <h4 class="mb-0"><span class="badge badge-primary badge-pill badge-news">Sale</span></h4>

          </div>
            <h5>
              <?php echo $row['ProductName']; ?>  
            </h5>
            <p class="small text-muted text-uppercase mb-2">
              <?php echo $row['ProductType']; ?>
            </p>
            <ul class="rating">
              <?php
            $i=0;
              $rating= $row['Rating'];
              while($i<$rating){
                ?>
              <li>
                <i class="fas fa-star fa-sm text-primary"></i>
              </li>
              <?php
              $i++;
              };
              if($rating<5){
                for($x=$rating;$x<5;$x++){
                  ?>
              <li>
                <i class="far fa-star fa-sm text-primary"></i>
              </li>
              <?php
              
                }
              }
              
            ?>

            </ul>
            <hr>
            
            <h6 class="mb-3">
              <span class="text-danger mr-1">
                <?php echo $row['Price']; ?>
              </span>
              <span class="text-grey"><s>
                  <?php echo 'Php '.$row['OriginalPrice']; ?>
                </s></span>
            </h6>
            <div class="container">
            <label>Color:</label> <span><?php echo $row['Color']; ?></span>
              <label>Size</label>
              <span><?php echo $row['Size']; ?></span>
            </div>
              <div class="container">
                  <label>Quantity:</label><span><?php echo $row['Quantity']; ?></span>
                  <label>Total Payment:</label>
                  <span class="totalAmount" name="totalAmount"><?php echo $row['TotalAmount']; ?></span>
              </div>
              <!-- <input class="size" name='size' style="visibility:hidden;height:5px;margin:0pxwidth:20px;" value="">  -->
            
            <button type="submit" name="orderButton" class="orderButton" class="btn btn-primary btn-sm mr-1 mb-2">
              <i class="fas fa-shopping-cart pr-2"></i>Order Now
            </button>
            
            <button type="button" class="btn btn-danger btn-sm px-3 mb-2 material-tooltip-main" data-toggle="tooltip"
              data-placement="top" title="Add to wishlist">
              <i class="far fa-heart"></i>
            </button>
            <a href="deleteCart.php?id=<?php echo $row['CartId']; ?>">
            <button id="<?php echo $row['CartId']?>" type="button" class="btn btn-outline-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
</svg>
                Delete
              </button>
              </a>
        </form>
      </div>
        <br><br>
 
      <?php
      }
    }
  }
      ?>
</div>
</div> 

   
<div class="modal" id="orderDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="width:80%; margin-left:auto; margin-right:auto; text-align:center">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Product Description</h5>
            <button type="button" class="close" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
          <div id="modalContainer" class="container"></div>
            <div class="modal-footer">
              <button id="cancelOrder" type="button" class="close">OK</button>
            </div>
           
      </div>
    </div>
  </div>

  <script>
  $(document).ready(){
    $('.btn btn-outline-danger').click(function(){
      console.log('clicked');
    })
  }

  </script>
<?php

  if(isset($_POST['orderButton'])){
    $cart=$_POST['cartId'];
    $id=$_POST['userId'];
    // echo "<script>alert('$cart+$id');</script>";
    if($cart!="" && $id!=""){
      $sql = "insert into orders(CartId,UserId) VALUES('".$cart."','".$id."') ";
      if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Thank you for your order!');
        </script>";
        echo "inserted successfully";
    } else {
      echo "<script>
      alert('Cart already placed to order!');
      </script>";
      // echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
  }
?>
</body>
</html>