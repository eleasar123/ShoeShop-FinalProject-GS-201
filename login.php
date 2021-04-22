<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        #div1{
            width: 50vw;
            height: auto;
            margin-top: 50px;
            background-color:white;
            margin-left: auto;
            margin-right: auto;
            font-size: 25px;
            font-family: Arial, Helvetica, sans-serif;
            background-color: skyblue;
            border-radius: 50px;
            padding: 20px;
        }
        input[type="text"]{
            margin: 10px;
            width: 30vw;
            font-size: 20px;
            border-radius: 10px;
            height: 40px;
        }
        input[type="password"]{
            margin: 10px;
            width: 30vw;
            height: 40px;
            font-size: 20px;
            border-radius: 10px;
        }
      
        #form1{
            text-align: center;
            margin: 15px;
        }
        #buttonOne{
            font-size: 30px;
            border: solid 5px greenyellow;
            border-radius: 10px;
            padding: 10px;
            
        }
        label[for="password"]{
            margin-left: 40px;
        }
    </style>
</head>

<body bgcolor="white">
    <div class="container-fluid" id="div1">
        <form id="form1" method="POST">
            <label for="email">Email Address</label>
            <input type="text" name="emailAddress" id="emailAddress"><br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password"><br>
            <button type="submit" id="buttonOne" name="buttonOne">Submit</button>
        </form>
    </div>

   <?php 

   include_once("connection.php");
   if(isset($_POST['buttonOne'])){
    $emailAddress=$_POST['emailAddress'];
    $passWord=$_POST['password'];



    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        $sql = "SELECT * FROM `users` WHERE `EmailAddress` = '".$emailAddress."' AND `Password`= '".$passWord."'";
        $result = $conn->query($sql);
        $result = mysqli_query($conn,$sql)or die(mysqli_error());
        $num_row = mysqli_num_rows($result);
        $row=mysqli_fetch_array($result);
        if( $num_row ==1 )
            {
        // $_SESSION['UserId']=$row['UserId'];
        header("Location: landing.php");
        echo 'hi there';
        }
        else
            {
            echo "Error: " . $emailAddress . " and " . $passWord." does not exist/match";
        }
    // if ($conn->query($sql) === TRUE) {
    //     while($row = $result->fetch_assoc()){
    //             $name = $row["Username"];
    //             echo "Hello: $name<br>";
    //         }
        
    //     header( 'Location: landing.php' ) ;
        
    // } else {
    //     echo "Error: " . $emailAddress . " and " . $passWord." does not exist/match";
    // }
    
    // $conn->close();
    }

   }
   ?>
</body>

</html>
