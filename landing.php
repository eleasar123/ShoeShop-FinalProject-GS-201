<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        #shoe1{
            text-align: center;
        }
        .modal-body{
            text-align: center;
        }
        .addToCart{
          background-color: skyblue;
          border-radius: 5px;
          height: 40px;
          color: white;
          
        }
        .orderButton{
          width: 10vw;
          margin-bottom: 50px;
        }
        .custom-select{
          width: 20vw;
          margin: 10px;
        }
        label, .totalAmount, .price{
          font-size: 20px;
        }
        
    </style>
</head>
<body>
    <!-- Button trigger modal -->
<div  class="card">
    <div id="shoe1" class="container">
        <h1 id="firstH1">Sapatos 1</h1>
        
        <img src="data:image/jpeg;base64,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"><br>
        <label>Price</label>
        <p id="price1" name="price" >299</p>
        <br><button class="orderButton" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" >Order Now</button>
      </div>
    
</div>  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Order Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" class="form-group">
            <div class="container-fluid">
                <h1 class="head1" name="head1">Hello</h1>
            </div>
            <div class="dropdown">
                <label>
                    Available Sizes
                </label>
                <select class="custom-select" id="inputGroupSelect01">
                  <option selected>Small</option>
                  <option value="1">Medium</option>
                  <option value="2">Large</option>
                  <option value="3">XL</option>
                </select>
            </div>
              <div class="dropdown">
              <label>
                    Available Colors
                </label>
                <select class="custom-select" id="inputGroupSelect01">
                  <option selected>Black</option>
                  <option value="1">White</option>
                  <option value="2">Yellow</option>
                  <option value="3">Pink</option>
                </select>
              </div>
              
              <div class="container">
                <label>Quantity</label>
                <input type="number" name="quantity" class="quantity"><br>
                <label>Total:</label>
                <span class="totalAmount" name="totalAmount"><Span>
              </div>
          </form> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel Order</button>
          <button type="submit"  class="addToCart" name="submit" >Add to Cart</button>
        </div>
      </div>
    </div>
  </div>
 <br>
 <br>
 <br>
 <br>
 <br>


  <!-- 2222222222222 -->

   <!-- Button trigger modal -->
<div  class="card">
    <div id="shoe1" class="container">
        <h1 id="firstH1">Sapatos 2</h1>
        <img src="data:image/jpeg;base64,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"><br>
        <label>Price</label>
        <p id="price12" name="price">300</p>
        <br><button class="orderButton" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" >Order Now</button>
      </div>
    
</div>  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Order Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" method="POST">
        <form method="POST" class="form-group">
            <div class="container-fluid">
                <h1 class="head1" name="head1">Hello</h1>
            </div>
            <div class="dropdown">
                <label>
                    Available Sizes
                </label>
                <select class="custom-select" id="inputGroupSelect01">
                  <option selected>Small</option>
                  <option value="1">Medium</option>
                  <option value="2">Large</option>
                  <option value="3">XL</option>
                </select>
            </div>
              <div class="dropdown">
              <label>
                    Available Colors
                </label>
                <select class="custom-select" id="inputGroupSelect01">
                  <option selected>Black</option>
                  <option value="1">White</option>
                  <option value="2">Yellow</option>
                  <option value="3">Pink</option>
                </select>
              </div>
              
              <div class="container">
                <label>Quantity</label>
                <input type="number" name="quantity" class="quantity"><br>
                <label>Total:</label>
                <span class="totalAmount" name="totalAmount"><Span>
              </div>
          </form> 
      </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel Order</button>
          <button  type="submit"  class="addToCart" name="submit">Add to Cart</button>
        </div>
      </div>
    </div>
  </div>  
<script>
    $(document).ready(function(){
        $(".orderButton").click(function(){
          console.log($(".orderButton").siblings('p'));
            var productName=$(this).siblings().html();
            console.log(productName);
            // var priceId=$(".orderButton").siblings('p').attr('id');
            var price=$(".orderButton").siblings('p').html();
            // console.log(typeof(productName));
            var product=$(this).siblings().not('.orderButton');
            // console.log(productAndPic)
            $(".head1").html($(product));
            $('.quantity').keyup(()=>{
              var quantity=$('.quantity').val();
              $('.totalAmount').html(price*quantity);
        });
            

        });

        $("button.addToCart").click(()=>{
          console.log("Clicked");
         
        })
     
    })
</script>
</body>
</html>
<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "shoeshop";
      if(isset($_POST['submit'])){
          $productName=$_POST['head1'];
          alert($productName);
          $passWord=$_POST['password'];
          echo $passWord;
          $conn = new mysqli($servername, $username, $password, $dbname);
          echo($conn);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else{
        $sql = "insert into `users` values('"."')";
        $result = $conn->query($sql);
        if ($result) {
            while($row = $result->fetch_assoc()){
                    $name = $row["Username"];
                    echo "Hello: $name<br>";
                }
                // header( 'Location: landing.php' ) ;
        } else {
            echo "Error: " . $emailAddress . " and " . $passWord." does not exist/match";
        }
        
        $conn->close();
        }
      }
    


          ?>