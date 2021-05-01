<?php
// Start the session
session_start();
// if($_SESSION['username']==""){
//   header("Location:login.php");
// }
?>
<!DOCTYPE html>
<html>

<head>
  <title>Page Title</title>
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
</head>
<body class="fixed-sn skin-light mdb-skin-custom" >
<!-- <a href="logout.php"><button>Log out</button></a> -->
  <!-- <section class="container-fluid">    -->
  <div class="container-fluid">
    <div class="row" style=" padding:20px;">

      <?php
    include_once('connection.php');
    // echo $_SESSION['UserId'];
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }else{
     
      $sql = "SELECT * FROM `products`";
      $result = $conn->query($sql);
      $count=1;
      if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()){
          
      ?>

      <div class="card col-sm-4" style=" width:20rem;height: fit-content">
        <form method="POST">
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
            <input id="productId" name="productId" style="visibility:hidden;height:10px;width:20px;margin:0px" value="<?php echo $row['ProductId']?>">
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
           

            <button class="sizesAndColors" type="button" class="btn btn-light btn-sm mr-1 mb-2">
            <i class="fas fa-angle-double-down"></i>See More
            </button>

            <div id="<?php echo $count ?>" class="collapse" style="text-align: justify">
           
              <label>
                    Available Sizes and Colors
                </label>
              <select class="custom-select">
                <?php
        
                $sql2 = "SELECT * FROM `stocks` where ProductId='".$row['ProductId']."'";
                $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0) {
                  // $stocksCount=0;
                  while($stocks=$result2->fetch_assoc()){
                    // echo $stocks['Size'] . $stocks["Colors"].$stocks['Quantity'];
                  // $sizes=array_unique($stocks['Size']);
                ?>     
                  <option value="<?php echo $stocks['Size']." ".$stocks['Colors']?>"><?php echo $stocks['Size']." ".$stocks['Colors']?>
                  Stocks:<?php echo " ".$stocks['Quantity']?></option>
                <?php
                    }
                  }
              
                ?>
              </select>
              <input type="hidden"class="productSizeAndColor" name="productSizeAndColor" style="height:10px;width:20px;margin:0px" >
              <div class="container">
                  <label>Quantity:</label>
                  <input type="text" name="quantity" class="quantity"><br>
                  <label>Total:</label>
                  <span class="totalAmount" name="totalAmount"></span>
                  <input class=total type="text" name="total" style="visibility:hidden;height:5px;margin:0pxwidth:20px;;"
                    value="">
              </div>
              <!-- <input class="size" name='size' style="visibility:hidden;height:5px;margin:0pxwidth:20px;" value="">  -->
            </div>
            <button type="submit" name="orderButton" class="orderButton" class="btn btn-primary btn-sm mr-1 mb-2">
              <i class="fas fa-shopping-cart pr-2"></i>Add to Cart
            </button>
            
            <button class="details" type="button" class="btn btn-light btn-sm mr-1 mb-2">
              <i class="fas fa-info-circle pr-2"></i>Details
            </button>
            
            <button type="button" class="btn btn-danger btn-sm px-3 mb-2 material-tooltip-main" data-toggle="tooltip"
              data-placement="top" title="Add to wishlist">
              <i class="far fa-heart"></i>
            </button>
        </form>
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


  <div class="modal" id="productDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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



  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script> -->


  <!-- Latest compiled JavaScript -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>
  <script>

    $(document).ready(function (){
     
      $('.quantity').keyup(function(){
        price=$(this).parent();
        price=price.parent().siblings(".mb-3");
        price=price.children(".text-danger").html();
    
        var quantity = $(this).val();
        console.log(quantity);
          $(this).siblings("span").html('Php ' + Math.round(price * quantity * 100.00) / 100.00);
          $(this).siblings("input").val(Math.round(price * quantity * 100.00) / 100.00);
        });

     x=0;   
      $('.sizesAndColors').click(function () {
      if(x%2==0){
        $(this).html('<i class="fas fa-angle-double-up"></i>See Less')
        var pId = $(this).parent();        
        pId = pId.children('h2').html();       
        $('#' + pId).collapse('show');
      }else{
        $(this).html('<i class="fas fa-angle-double-down"></i>See More')
        var pId = $(this).parent();        
        pId = pId.children('h2').html();
        $('#' + pId).collapse('hide');
      }
      x++;
      

      })

      $('.productSizeAndColor').val($('.custom-select').val());
      $('select.custom-select').click(function(){
        $(this).change(() => {
          $('.productSizeAndColor').val($(this).val());
        })
      })
       

            $(".orderButton").click(function () {
              $(this).html("Added to Cart");

            }) 


    $(".details").click(function(){
      
      $('#productDetails').modal({ backdrop: 'static', keyboard: false })
      $('#productDetails').modal('show');
      var pId = $(this).parent();
      pId = pId.siblings('h1').html();
      // console.log(pId)
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

if(isset($_POST['orderButton'])){
    $productId=$_POST['productId'];
    $query1="select Size, Color from products where ProductId='".$productId."'";
    $result = $conn->query($query1);
    $sizeAndColor=$_POST['productSizeAndColor'];
    $valid;
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
        $row2=$row['Size']." ".$row['Color'];
        if($sizeAndColor==$row2){
          echo "<script>alert('false');</script>";
        }else{
          echo "<script>alert('true');</script>";
        }
       
      }
    }  
    $valid2=$valid;
    $userId=$_SESSION['UserId'];
    $productId=$_POST['productId'];
    $sizeAndColor=$_POST['productSizeAndColor'];
    $sizeAndColor=explode(" ", $sizeAndColor);
    $quantity=$_POST['quantity'];
    $size=$sizeAndColor[0];
    $color=$sizeAndColor[1];
    echo $size.$color;
    $totalAmount=$_POST['total'];
    // echo "<script>alert('$userId+$productId+$quantity+$size+$color+$totalAmount+$valid2');</script>";
  if($userId!="" && $productId!="" && $quantity!="" && $size!="" && $color!="" && $totalAmount!=""){
    $sql = "insert into cart(UserId,ProductId, Size, Color, Quantity, TotalAmount) VALUES('".$userId."','".$productId."', '".$size."', '".$color."', '".$quantity."', '".$totalAmount."')";
  
  if ($conn->query($sql) === TRUE) {
      echo "inserted successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
  
  }


}
?>
</body>

</html>