<?php  
session_start(); ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Quick Exchange</title>
    
    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body class="homepage">

    <header id="header">
     
        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                  
                </div>
                <img src="images/logo.png">
                <div class="collapse navbar-collapse navbar-right">

                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.html">HOME</a></li>
                        <li><a href="textbook.php">Item</a></li>
                        <?php if ($_SESSION) { ?>
                        <li><a href= "welcome.php">WELCOME <?php echo $_SESSION['email'];  ?> </a></li>
                        <li><a href="logout.php">LOGOUT</a></li>  
                          <?php
                           }

                          ?>
                          <?php if (!$_SESSION) { ?>
                          <li><a href="login.php">LOGIN</a></li>  
                          <?php
                           }

                          ?>
                             
                                
                                         

                    </ul>
                </div>
        </nav><!--/nav-->
        
    </header><!--/header-->
    <form method="post" action="SearchedItem.php">
        <div class="form-group">
            <input type="text" name="Search" class="form-control" placeholder="Search by book name or author or price" />

            <input class="btn btn-primary" name="search" type="submit" value="Search For Books" >
        </div>
    </form>


<?php 

include("config.php");
error_reporting(0);

 $result = $mysqli->query("SELECT * FROM qe_items ORDER BY item_num DESC ");

 $num = $result->num_rows;


 for($i=0; $i<$num ; $i++) {
 $item = mysqli_fetch_assoc($result); ?>

 <div class = "well">
            
            <p><label>Title: </label><?php echo $item['title'];?></p>
            <p><label>Description: </label><?php echo $item['description'];?></p>
            <p><label>Author: </label><?php echo $item['author'];?></p>
            <p><label>Price: </label><?php echo $item['price'];?></p>
     <p><label>Picture: </label><?php echo "<td><img src='images/$item[imageupload]' height='150px' width='300px'></td>"; ;?></p>
<?php if($_SESSION['email'])  
      {  ?>
            <p><label>Seller Email: </label><?php echo $item['contactemail'];?></p>
           
 <?php  
  }  
?>  

        <?php if(!$_SESSION['email'])  
      {  ?>
             
           <form method="post" action="login.php">
            <input class="btn btn-info" name="submit" type="submit" value="Contact" />
           </form>

   <?php  
      }  
       ?>
      
            <br>
            
            </div>

<?php }?>


 <footer id="footer" class="midnight-blue" style="margin-top: 450px">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2016 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">QUICK EXCHANGE</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="contact-us.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>