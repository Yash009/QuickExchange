<?php

include("config.php");

$result = $mysqli->query("SELECT * FROM qe_items WHERE title LIKE '%$_POST[Search]%' ");

$num = $result->num_rows;


for($i=0; $i<$num ; $i++) {

    $row = mysqli_fetch_assoc($result);


    print '<br>';
    print "User Email:  ".$row['email']."";
    print '<br>';
    print "Title:  ".$row['title']."";
    print '<br>';
    print "Description:  ".$row['description']."";
    print '<br>';
    print "BarterCondition:  ".$row['author']."";
    print '<br>';
    print "Price:  ".$row['price']."";
    print '<br>';
    //$image = $row['imageupload'];
    //echo '<img src='.$image.'"style="width:128px;height:128px" >';
}
?>
