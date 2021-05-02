<?php
session_start();
include_once('connection.php');
$userId=$_SESSION['UserId'];
$cartId=$_GET['id'];
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "DELETE FROM cart WHERE UserId = '".$userId."' and CartId='".$cartId."'";
if ($conn->query($sql) === TRUE) {
//   echo " record deleted successfully";
  header( 'Location: cart.php' ) ;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
