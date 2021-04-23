<?php


require_once('store.php');
    $users=$myStore->getUsers();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Store</title>
    <style>
        .div1{
            max-width: 90vw;
            background-color: pink;
            margin: 20px;
            padding: 10px;
            text-align: center;
            position: static;
            border-radius: 20%;
        }
        .div2{
            position: inherit;
            margin-top: 20px;
            font-size: 30px;
            color: red;
            
        }
    </style>
</head>
<body>
    <div class="div1">
        <h1>List of Users</h1>
<?php
foreach($users as $user){
    echo "<div class=div2>".$user['UserId']." ".$user['Name']." ".$user['Username']." ".$user['EmailAddress']." ".$user['Password']." ".$user['Access']." ".$user['Added_At']."</div>";

}

?>
</div>
    
</body>
</html>