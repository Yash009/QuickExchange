<?php  
session_start();
if(!$_SESSION['email'])
{
    header("Location: login.php");//redirect to login page to secure the welcome page without login access.
}
?>
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
                        <li><a href="Textbook.php">Item</a></li>
                        <li><a href="login.php">LOGIN</a></li>
                        <li><a href= "#">WELCOME <?php echo $_SESSION['email'];  ?> </a></li>  
                        <li><a href="logout.php">LOGOUT</a></li>
                    </ul>
                </div>
        </nav><!--/nav-->
        <div style="padding:2% 40%;color: white;background-color: grey">
<h1>Post Your Needs</h1>
            <?php if(isset($_SESSION['email'])) : ?>
                <div class="form-group">
                    <a class="btn btn-primary" href="PostBooks.html" style="margin-left:30%">Exchange Now</a>
                </div>
            <?php else :  ?>
            <?php endif;?>
        </div>
        <div style="padding:2% 38%;color: white;background-color: grey;margin-top: 5%">
            <h1>Search Your Needs</h1>
            <form method="post" action="SearchedItem.php" style="margin-top: 5%">
                <div class="form-group">
                    <input type="text" name="Search" class="form-control" placeholder="Search by title" style="border-color: black" />
                    <input class="btn btn-primary" name="search" type="submit" value="Search For Books" style="margin-left: 35%" >
                </div>
            </form>
        </div>

        </div>
    </header><!--/header-->
    <footer id="footer" class="midnight-blue" style="margin-top: 540px">
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