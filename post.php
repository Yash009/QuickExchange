<?php
/**
 * Created by PhpStorm.
 * User: YASH CHATURVEDI
 * Date: 4/23/2016
 * Time: 10:53 PM
 */
require_once("config.php");
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["imageupload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["imageupload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["imageupload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["imageupload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["imageupload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
// Assigning $_POST values to individual variables for reuse.
$userid = $_POST['userid'];
$contactemail = $_POST['contactemail'];
$title = $_POST['title'];
$description = $_POST['description'];
$author = $_POST['author'];
$price = $_POST['price'];
$picture = $_FILES['imageupload']['name'];
//print $fname;


//Creating a variable to hold the "@return boolean value returned by function createNewUser - is boolean 1 with
//successful and 0 when there is an error with executing the query .

$newitem = createNewitem($userid, $contactemail, $title, $description,$author, $price, $picture);
header("Location: Textbook.php");

//display the result that was returned by the createNewUser function - in this case we usually get a 1 when the
//insert is completed successfully.

?>

