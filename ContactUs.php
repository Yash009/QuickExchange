<?php
/**
 * Created by PhpStorm.
 * User: YASH CHATURVEDI
 * Date: 4/19/2016
 * Time: 4:35 PM
 */
require_once("config.php");
error_reporting(0);

// Assigning $_POST values to individual variables for reuse.
$firstname = $_POST['FirstName'];
$lastname = $_POST['LastName'];
$phone = $_POST['Phone'];
$email = $_POST['Email'];
$subject = $_POST['Subject'];
$message = $_POST['Message'];

//print $fname;


//Creating a variable to hold the "@return boolean value returned by function createNewUser - is boolean 1 with
//successfull and 0 when there is an error with executing the query .

$newuser = createNewComplain($firstname, $lastname, $phone, $email, $subject, $message);

//display the result that was returned by the createNewUser function - in this case we usually get a 1 when the
//insert is completed successfully.
echo "<br><br><br>";
$result = $mysqli->query("SELECT * FROM qe_items");
$row = mysqli_fetch_assoc($result);
echo "<h1>Hi ".$firstname." ,we have your complain and will get back to you soon<h1>";
?>
