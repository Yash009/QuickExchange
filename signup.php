<?php  
session_start();//session starts here  
  
?>  
  
<?php

require('db-settings.php');

//Block 2
if (isset($_POST['submit'])){
$firstname= $_POST['firstname'];
$lastname= $_POST['lastname'];
$phone= $_POST['phone'];
$college= $_POST['college'];
$zipcode= $_POST['zipcode'];
$email= $_POST['email'];
$newpassword = $_POST['password'];


//Block 4
$query = "INSERT INTO  qe_users VALUES ( DEFAULT,'$firstname','$lastname','$email','$college','$zipcode','$newpassword','$phone')";
echo 'hello';
//Block 5
mysqli_query ($mysqli, $query)
or die ("Error querying database");

//Block 6
header("Location: login.php");

//Block 7
mysqli_close($mysqli);
}
?>
