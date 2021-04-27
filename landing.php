<?php
// Start the session
session_start();
?>

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

</head>

<body class="fixed-sn skin-light mdb-skin-custom" >
  <!-- <section class="container-fluid">    -->

  <div class="container-fluid">
    <div class="row" style=" padding:20px;">


      <?php
    include_once('connection.php');
    // echo $_SESSION['UserId'];
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }else{
      // $innerjoin="SELECT products.ProductId,products.ProductName,products.ProductPhoto,products.ProductType,products.Description,
      // products.OriginalPrice, products.Price, products.Rating, stocks.StockId,
      // stocks.ProductId, stocks.Size, stocks.Colors, stocks.Quantity
      // FROM (products
      // INNER JOIN stocks ON products.ProductId = stocks.ProductId);";
      $sql = "SELECT * FROM `products`";
      $result = $conn->query($sql);
      $count=1;
      if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()){
          
      ?>

      <div class="card col-sm-4" style=" width:20rem;height: fit-content">
        
          <div class="view zoom overlay">

            <img class="img-fluid w-100" src="<?php echo $row['ProductPhoto']; ?>" alt="Sample">
            <h4 class="mb-0"><span class="badge badge-primary badge-pill badge-news">Sale</span></h4>

          </div>
          <h1 style="visibility:hidden;height:10px;width:20px;margin:0px"><?php echo $row['Description']?></h1>
          <div class="card-body text-center">
        
          <h2 style="visibility:hidden;height:10px;width:20px;margin:0px"><?php echo $row['ProductId']?></h2>
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
                <?php echo 'Php '.$row['Price']; ?>
              </span>
              <span class="text-grey"><s>
                  <?php echo 'Php '.$row['OriginalPrice']; ?>
                </s></span>
            </h6>
           
            <button class="sizesAndColors" type="button" class="btn btn-light btn-sm mr-1 mb-2">
            <i class="fas fa-angle-double-down"></i>See More
            </button>
            <div id="<?php echo $count ?>" class="collapse" style="text-align: justify">
            <label>
                  Available Sizes and Colors
              </label>
              <select class="custom-select" id="sizes">
            <?php
    
            $sql2 = "SELECT * FROM `stocks` where ProductId='".$row['ProductId']."'";
            $result2 = $conn->query($sql2);
            if ($result2->num_rows > 0) {
              // $stocksCount=0;
              while($stocks=$result2->fetch_assoc()){
                // echo $stocks['Size'] . $stocks["Colors"].$stocks['Quantity'];
              // $sizes=array_unique($stocks['Size']);
            ?>     
              <option value="<?php echo $tocks['Size'].$stocks['Colors']?>"><?php echo $stocks['Size']." ".$stocks['Colors']?>
              Stocks:<?php echo " ".$stocks['Quantity']?></option>
            <?php
                }
              }
          
            ?>
            </select>
            <div class="container"><br>
                <label>Quantity</label>
                <input type="number" name="quantity" class="quantity"><br>
                <label>Total:</label>
                <span class="totalAmount" name="totalAmount"></span>
                <input id=total type="text" name="total" style="visibility:hidden;height:5px;margin:0pxwidth:20px;;"
                  value="">
            </div>
            <input id="size" name='size' style="visibility:hidden;height:5px;margin:0pxwidth:20px;" value=""> 
            </div><br>
            <button type="submit" name="orderButton" class="orderButton" class="btn btn-primary btn-sm mr-1 mb-2">
              <i class="fas fa-shopping-cart pr-2"></i>Add To Cart
            </button>
            
            <button class="details" type="button" class="btn btn-light btn-sm mr-1 mb-2">
              <i class="fas fa-info-circle pr-2"></i>Details
            </button>
            <div id="<?php echo $count ?>" class="collapse" style="text-align: justify">
              <?php echo $row['Description'];?>
            </div>
            <button type="button" class="btn btn-danger btn-sm px-3 mb-2 material-tooltip-main" data-toggle="tooltip"
              data-placement="top" title="Add to wishlist">
              <i class="far fa-heart"></i>
            </button>
      </div>

      </div>

  <?php
  // $_SESSION["id"] = $row['ProductId'];
  // echo $_SESSION['id'];
        $count++;
        
      }
    }
  }
      ?>
  
</div>
</div> 
<!-- 
  <div class="modal" id="productDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="width:80%; margin-left:auto; margin-right:auto; text-align:center">
        <form method="POST" class="form-group" id="form">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Order Details</h5>
            <button type="button" class="close" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
          <input id="productID"  style="height:20px;width:20px;margin:0px">
            <input id="productName" name="productName" style="visibility:hidden;height:10px;width:20px;margin:0px">
            <input id="price" name="price" style="visibility:hidden;height:5px;margin:0pxwidth:20px;">
            <div class="container-fluid">
              <h1 class="head1"></h1>
            </div> -->
           
              
<!--           
              <div class="container">
                <label>Quantity</label>
                <input type="number" name="quantity" class="quantity"><br>
                <label>Total:</label>
                <span class="totalAmount" name="totalAmount"></span>
                <input id=total type="text" name="total" style="visibility:hidden;height:5px;margin:0pxwidth:20px;;"
                  value="">
              </div>
            </div>
            <div class="modal-footer">
              <button id="cancelOrder" type="button" class="close" class="btn btn-primary">Cancel Order</button>
              <button type="submit" id="addToCart" name="submit2" class="addToCart">Add to Cart</button>
            </div>
        </form>
      </div>
    </div>
  </div> -->

  <div class="modal" id="productDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="width:80%; margin-left:auto; margin-right:auto; text-align:center">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Order Details</h5>
            <button type="button" class="close" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
          <div id="modalContainer" class="container"></div>
          
            <div class="modal-footer">
              <button id="cancelOrder" type="button" class="close">Okay</button>
              <!-- <button type="submit" id="addToCart" name="submit2" class="addToCart">Okay</button> -->
            </div>
      </div>
    </div>
  </div>

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script> -->


  <!-- Latest compiled JavaScript -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>
  <script>

    $(document).ready(function (){

      // $('.details').click(function () {
      //   var pId = $(this).parent();        
      //   pId = pId.children('h2').html();       
      //   console.log($('#' + pId))
      //   $('#' + pId).collapse('toggle');

      // })
     x=0;   
      $('.sizesAndColors').click(function () {
      if(x%2==0){
        $(this).html('<i class="fas fa-angle-double-up"></i>See Less')
        var pId = $(this).parent();        
        pId = pId.children('h2').html();       
        console.log($('#' + pId))
        $('#' + pId).collapse('show');
      }else{
        $(this).html('<i class="fas fa-angle-double-down"></i>See More')
        var pId = $(this).parent();        
        pId = pId.children('h2').html();
        $('#' + pId).collapse('hide');
      }
      x++;
      

      })
      
      // $(".form1").submit(function (e) {
      //         e.preventDefault();
      //         var id=e.target[0].defaultValue
      //         $.ajax({
      //           type: "POST",
      //           url: "getId.php",
      //           data: $(this).serialize(),
      //           success: function (response){
      //             console.log(response)
      //           }
      
      //         })
      //       })

    //   $(".orderButton").click(function () {
    //     $('#productDetails').modal({ backdrop: 'static', keyboard: false })
    //     // $productId=$(this).parent();
    //     // $productId=$productId.siblings('.view').children('h2');
    //     // $productId=$productId.html();
    //     // $('#pName').html($productId)
    //     $('#productDetails').modal('show');
    //     var productName = $(this).siblings('h5').html();
    //     var price = $(this).siblings('.mb-3');
    //     price = price.clone();
    //     price = price.children('.text-danger').html().substr(3);
    //     $('#price').val(price);

    //     console.log(price)
    //     var product = $(this).siblings().not('button');
    //     product = product.not('.collapse');
    //     product = product.clone();
    //     var img = $(this).parent();
    //     img = img.siblings('.view').children('img');
    //     // console.log(img.children('img'));
    //     // img=img.children('img');
    //     // console.log(img.html());
    //     img = img.clone();
    //     img = img.css({ 'border-radius': '5%' });
    //     $('#productName').val(productName);
    //     $('.head1').prepend(img);
    //     $(".head1").append(product);

    //     $('#color').val($('#colors').val());
    //     $('#size').val($('#sizes').val());
    //     $('#sizes').change(() => {
    //       $('#size').val($('#sizes').val());
    //     })
    //     $('#sizes').change(() => {
    //       $('#color').val($('#colors').val());
    //     })
    //     $('.quantity').keyup(() => {
    //       var quantity = $('.quantity').val();
    //       $('.totalAmount').html('Php ' + Math.round(price * quantity * 100.00) / 100.00);
    //       $('#total').val(Math.round(price * quantity * 100.00) / 100.00);
    //     });
    //     $('.addToCart').click(() => {
    //       console.log("added to carts");
    //       $('.addToCart').html("Added to Cart");

    //     })
    //     $("#cancelOrder").click(() => {
    //       $('#productDetails').modal('hide');
    //       $('.head1').html('');


    //     })
    //     $(".close").click(() => {
    //       $('#productDetails').modal('hide');
    //       $('.head1').html('');


    //     })

    //   })


    // });

    $(".details").click(function(){
      
      $('#productDetails').modal({ backdrop: 'static', keyboard: false })
      $('#productDetails').modal('show');
      var pId = $(this).parent();
      pId = pId.siblings('h1').html();
      console.log(pId)
      $("#modalContainer").html(pId);

      $(".close").click(() => {
          $('#productDetails').modal('hide');


        })
    })
    })
    //prevent form to submit on page reload
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  <?php
include_once('connection.php');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// $_SESSION['UserId']=$_SESSION['UserId'];
// echo "<h1>". $_SESSION['UserId']. "</h1>";

if(isset($_POST['submit2'])){
    $userId=$_SESSION['UserId'];
    $productName=$_POST['productName'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $size=$_POST['size'];
    $color=$_POST['color'];
    $totalAmount=$_POST['total'];

  if($productName!="" && $price!="" && $quantity!="" && $size!="" && $color!="" && $totalAmount!=""){
    $sql = "insert into cart(UserId,ProductName,Price, Size, Color, Quantity, TotalAmount) VALUES('".$userId."','".$productName."', '".$price."', '".$size."', '".$color."', '".$quantity."', '".$totalAmount."')";
  
  if ($conn->query($sql) === TRUE) {
    // header( 'Location: display.html' ) ;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
  
  }
  
}
?>


</body>

</html>