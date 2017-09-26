<?php

include("config.php");

$result = $mysqli->query("SELECT * FROM qe_items WHERE item_desc1 LIKE '%$_POST[Search]%' ");

$num = $result->num_rows;


for($i=0; $i<$num ; $i++) {

    $row = mysqli_fetch_assoc($result);


    print '<br>';
    print "User Email:  ".$row['user_email']."";
    print '<br>';
    print "Title:  ".$row['item_desc1']."";
    print '<br>';
    print "Description:  ".$row['item_desc2']."";
    print '<br>';
    print "Author:  ".$row['item_desc3']."";
    print '<br>';
    print "Price:  ".$row['requested_price']."";
    print '<br>';
    /*$image = $row['item_img_file_location'];
    echo '<img src="'.$image.'"style="width:128px;height:128px" >';
    */
    print '<br>';
    print '<br>';
    print '<br>';
}
?>
