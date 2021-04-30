<?php
    require_once('store.php');
    $myStore->login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Store Log in</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
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
<body>
    <div id="div1" class="container-fluid">
        <center><h1>Log In</h1></center>
        <div class="form-container">
            <form id="form1" method="post">
                <label >Email Address</label>
                <input type="text" name="email" id="emailAddress">
                <label >Password</label>
                <input type="password" name="password" id="password">
                <input type="submit"  name="submit" id="buttonOne" value="Submit"> 
            </form>
        </div>
    </div>
</body>
</html>