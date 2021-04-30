<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>BORUTOY</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  
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
</head>
<body class="fixed-sn skin-light mdb-skin-custom" data-spy="scroll" data-target="#scrollspy" data-offset="15">
<div class="jumbotron">

<?php

    session_start();
    if($_SESSION['username']==""){
      header("Location:login2.php");
    }else{
      echo "<center><h1>Welcome ".$_SESSION['username']."</center></h1>";
    }
    ?>   
</div>
<div class="container">
<div class="row">

<div class="col-md-4">

<section id="advanced-example">
  <!--Title-->
  <h2 class="section-heading mb-4">
    Advanced example
  </h2>
 <!-- Description -->
  <!--Section: Live preview-->
    <!-- Card -->
   
    <div class="card" style="max-width: 22rem;">

      <div class="view zoom overlay">
        <img class="img-fluid w-100" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg"
          alt="Sample">
        <h4 class="mb-0"><span class="badge badge-primary badge-pill badge-news">Sale</span></h4>
          <div class="mask">
            <img class="img-fluid w-100" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/13.jpg">
            <div class="mask rgba-black-slight"></div>
          </div>
      </div>
      <div class="card-body text-center">

        <h5>Fantasy T-shirt</h5>
        <p class="small text-muted text-uppercase mb-2">Shirts</p>
        <ul class="rating">
          <li>
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="far fa-star fa-sm text-primary"></i>
          </li>
        </ul>
        <hr>
        <h6 class="mb-3">
          <span class="text-danger mr-1">$10.99</span>
          <span class="text-grey"><s>$30.99</s></span>
        </h6>
        <button type="button" class="orderButton" class="btn btn-primary btn-sm mr-1 mb-2" >
          <i class="fas fa-shopping-cart pr-2"></i>Buy Now
        </button>
        <button type="button" class="btn btn-light btn-sm mr-1 mb-2">
          <i class="fas fa-info-circle pr-2"></i>Details
        </button>
        <button type="button" class="btn btn-danger btn-sm px-3 mb-2 material-tooltip-main" data-toggle="tooltip"
          data-placement="top" title="Add to wishlist">
          <i class="far fa-heart"></i>
        </button>
      </div>
    </div>
</section>
</div>

<div class="modal" id="productDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form method="POST" class="form-group" id="form">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Order Details</h5>
        <button type="button" class="close" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="container-fluid">
          <input id="productName" name="productName" style="visibility:hidden;"  value="">
          <input id="price" name="price" style="visibility:hidden;" value="">
              <h1 class="head1"></h1>

          </div>
          <div class="dropdown">
              <label>
                  Available Sizes
              </label>
              <select class="custom-select" id="sizes">
                
                <option value="Small" selected>Small</option>
                <option value="Medium">Medium</option>
                <option value="Large">Large</option>
                <option value="XL">XL</option>
                <option value="XL">XXL</option>
              </select>
              <input id="size" name='size' style="visibility:hidden;" value="">
          </div>
            <div class="dropdown">
            <label>
                  Available Colors
              </label>
              <select class="custom-select" id="colors">
                <option selected value="Black">Black</option>
                <option value="White">White</option>
                <option value="Yellow">Yellow</option>
                <option value="Pink">Pink</option>
                <option value="Red">Red</option>
                <option value="Orange">Orange</option>
                <option value="Green">Green</option>
              </select>
              <input id="color" name="color" style="visibility:hidden;" value="">
            </div>
            <br>
            <div class="container">
              <label>Quantity</label>
              <input type="number" name="quantity" class="quantity"><br>
              <label>Total:</label>
              <input id=total type="text" name="total" style="visibility:hidden;" value="">
              <span class="totalAmount" name="totalAmount"><Span>
            </div>
      </div>
      <div class="modal-footer">
        <button id="cancelOrder"type="button" class="close" class="btn btn-primary">Cancel Order</button>
        <button type="submit"  id="addToCart" name="submit2" class="addToCart">Add to Cart</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="col-md-4">

<section id="advanced-example">
  <!--Title-->
  <h2 class="section-heading mb-4">
    Advanced example
  </h2>
 <!-- Description -->
  <!--Section: Live preview-->
    <!-- Card -->
    <div class="card" style="max-width: 22rem;">

      <div class="view zoom overlay">
        <img class="img-fluid w-100" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg"
          alt="Sample">
        <h4 class="mb-0"><span class="badge badge-primary badge-pill badge-news">Sale</span></h4>
        <a href="#!">
          <div class="mask">
            <img class="img-fluid w-100" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/13.jpg">
            <div class="mask rgba-black-slight"></div>
          </div>
        </a>
      </div>
      <div class="card-body text-center">

        <h5>Passerelles Numeriques T-shirt</h5>
        <p class="small text-muted text-uppercase mb-2">Shirts</p>
        <ul class="rating">
          <li>
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="far fa-star fa-sm text-primary"></i>
          </li>
        </ul>
        <hr>
        <h6 class="mb-3">
          <span class="text-danger mr-1">$2.99</span>
          <span class="text-grey"><s>$25.99</s></span>
        </h6>
        <button type="button" class="orderButton" class="btn btn-primary btn-sm mr-1 mb-2" >
          <i class="fas fa-shopping-cart pr-2"></i>Buy Now
        </button>
        <button type="button" class="btn btn-light btn-sm mr-1 mb-2">
          <i class="fas fa-info-circle pr-2"></i>Details
        </button>
        <button type="button" class="btn btn-danger btn-sm px-3 mb-2 material-tooltip-main" data-toggle="tooltip"
          data-placement="top" title="Add to wishlist">
          <i class="far fa-heart"></i>
        </button>
      </div>
    </div>
</section>

</div>


<div class="col-md-4">
<section id="advanced-example">
  <!--Title-->
  <h2 class="section-heading mb-4">
    Advanced example
  </h2>
 <!-- Description -->
  <!--Section: Live preview-->
    <!-- Card -->
    <div class="card" style="max-width: 22rem;">

      <div class="view zoom overlay">
        <img class="img-fluid w-100" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg"
          alt="Sample">
        <h4 class="mb-0"><span class="badge badge-primary badge-pill badge-news">Sale</span></h4>
        <a href="#!">
          <div class="mask">
            <img class="img-fluid w-100" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/13.jpg">
            <div class="mask rgba-black-slight"></div>
          </div>
        </a>
      </div>
      <div class="card-body text-center">

        <h5>Hello World T-shirt</h5>
        <p class="small text-muted text-uppercase mb-2">Shirts</p>
        <ul class="rating">
          <li>
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="far fa-star fa-sm text-primary"></i>
          </li>
        </ul>
        <hr>
        <h6 class="mb-3">
          <span class="text-danger mr-1">$1.99</span>
          <span class="text-grey"><s>$6.99</s></span>
        </h6>
        <button type="button" class="orderButton" class="btn btn-primary btn-sm mr-1 mb-2" >
          <i class="fas fa-shopping-cart pr-2"></i>Buy Now
        </button>
        <button type="button" class="btn btn-light btn-sm mr-1 mb-2">
          <i class="fas fa-info-circle pr-2"></i>Details
        </button>
        <button type="button" class="btn btn-danger btn-sm px-3 mb-2 material-tooltip-main" data-toggle="tooltip"
          data-placement="top" title="Add to wishlist">
          <i class="far fa-heart"></i>
        </button>
      </div>
    </div>
</section>

</div>
</div>
  
</div>


<div class ='container'>
<div class ='row'>
<div class ='col-md-5'>

</div>

<div class ='col-md-5'>

</div>

<div class ='col-md-5'>
</div>
</div>
</div> 
<div class="card" style="width: 30vw"><a href="cart.php">Check Cart</a></div>
<br>
<div class="container" style="width:20vw;float:right;margin-right:100px;margin-bottom:50px;">
  <a href="logout.php"><button onclick>Log out</button></a>
</div>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>

  $(document).ready(function(){
    
    // console.log($('.orderButton').parents().filter(".mask").html());
    $(".orderButton").click(function(){
      $('#productDetails').modal({backdrop: 'static', keyboard: false})  
        $('#productDetails').modal('show');
        var productName=$(this).siblings('h5').html();  
        console.log(productName);
          var price=$(this).siblings('.mb-3');
          price=price.clone();
          console.log(price)
          var price2=price.children('.text-danger').html();
          $('#price').val(price2);
          price=price.children('.text-danger').html().substr(1);
          var product=$(this).siblings().not('button');
          product=product.clone();
          var img=$(this).parent();
          img=img.siblings('.view').children('div.mask');
          console.log(img.children('img'));
          img=img.children('img');
          // console.log(img.html());
          img=img.clone();
          img=img.css({'border-radius':'5%'});
          $('#productName').val(productName);
          $('.head1').prepend(img);
          $(".head1").append(product);
          
          $('#color').val($('#colors').val());
          $('#size').val($('#sizes').val());
          $('#sizes').change(()=>{
            $('#size').val($('#sizes').val());
          })
          $('#sizes').change(()=>{
            $('#color').val($('#colors').val());
          })
          $('.quantity').keyup(()=>{
            var quantity=$('.quantity').val();
            $('.totalAmount').html('$'+Math.round(price*quantity*100.00)/100.00);
            $('#total').val('$'+Math.round(price*quantity*100.00)/100.00);
          });
          $('.addToCart').click(()=>{
            console.log("added to carts");
            $('.addToCart').html("Added to Cart");
           
          })
          $("#cancelOrder").click(()=>{
            $('#productDetails').modal('hide');
            $('.head1').html('');
      
   
      })
      $(".close").click(()=>{
            $('#productDetails').modal('hide');
            $('.head1').html('');
      
   
      })
         
      })
     
          
      });
     
</script>
<?php
include_once('connection.php');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// $_SESSION['UserId']=$_SESSION['UserId'];
// echo "<h1>". $_SESSION['UserId']. "</h1>";

if(isset($_POST['submit2'])){
    $productName=$_POST['productName'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $size=$_POST['size'];
    $color=$_POST['color'];
    $totalAmount=$_POST['total'];

  if($productName!="" && $price!="" && $quantity!="" && $size!="" && $color!="" && $totalAmount!=""){
    $sql = "insert into cart(ProductName,Price, Size, Color, Quantity, TotalAmount) VALUES('".$productName."', '".$price."', '".$size."', '".$color."', '".$quantity."', '".$totalAmount."')";
  
  if ($conn->query($sql) === TRUE) {
    // header( 'Location: display.html' ) ;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
  
  }
  
}
?>
<script>
  //prevent form to submit on page reload
if (window.history.replaceState ){
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>

    
