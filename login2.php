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
</head>
<body>
    <div class="container-fluid">
        <h1>Log In</h1>
        <div class="form-container ">
            <form method="post">
                <label >Username</label>
                <input type="text" name="username" id="username">
                <label >Password</label>
                <input type="password" name="password" id="password">
                <input type="submit" class="" name="submit" value="Submit"> 
            </form>
        </div>
    </div>
</body>
</html>