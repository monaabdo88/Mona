<?php 
require_once"../functions/functions.php" ;
if(!isset($_SESSION['admin_name'])){
	echo"<script>window.open('login.php?not_admin=yes','_self')</script>";
	$activePage = basename($_SERVER['PHP_SELF'], ".php");
     if(isset($_SESSION['admin_id'])){
			$admins = "select * from admin where admin_id = '$_SESSION[admin_id]'";
			$admin_query = mysqli_query($conn,$admins);
			while($rows = mysqli_fetch_array($admin_query)){
			$admin_username= $rows['admin_name'];
			$admin_password= $rows['md_pass'];
			$admin_add= $rows['add'];
			$admin_edit= $rows['edit'];
			$admin_remove= $rows['remove'];
			$admin_id= $rows['admin_id'];
			$admin_pages = $rows['pages'];
			$admin_pages = explode(',',$admin_pages);
			$admin_pages = $admin_pages;
			
			}
		}
		$pages = array(
		'Main Settings'=>array('title'=>'Main Settings','sub_url'=>'main.php','icon'=>'<i class="glyphicon glyphicon-cog"></i>'),
		'About Us'=>array('title'=>'About Us','sub_url'=>'about.php','icon'=>'<i class="glyphicon glyphicon-info-sign"></i>'),
		'Sliders'=>array('title'=>'Sliders','sub_url'=>'sliders.php','icon'=>'<i class="glyphicon glyphicon-picture"></i>'),
		'Countries'=>array('title'=>'Countries','sub_url'=>'countries.php','icon'=>'<i class="glyphicon glyphicon-globe"></i>'),
		'Cities'=>array('title'=>'Cities','sub_url'=>'cities.php','icon'=>'<i class="glyphicon glyphicon-map-marker"></i>'),
		'Categories'=>array('title'=>'Categories','sub_url'=>'cats.php','icon'=>'<i class="glyphicon glyphicon-list-alt"></i>'),
		'Brands'=>array('title'=>'Brands','sub_url'=>'sub.php','icon'=>'<i class="glyphicon glyphicon-th"></i>'),
		'Products'=>array('title'=>'Products','sub_url'=>'products.php','icon'=>'<i class="glyphicon glyphicon-gift"></i>'),
		'Customers'=>array('title'=>'Customers','sub_url'=>'customers.php','icon'=>'<i class="fa fa-users"></i>'),
		'Orders'=>array('title'=>'Orders','sub_url'=>'orders.php','icon'=>'<i class="glyphicon glyphicon-shopping-cart"></i>'),
		'Partners'=>array('title'=>'Partners','sub_url'=>'partners.php','icon'=>'<i class="glyphicon glyphicon-th-large"></i>'),
		'Socials'=>array('title'=>'Socials','sub_url'=>'socials.php','icon'=>'<i class="fa fa-facebook"></i>'),
		'Admins'=>array('title'=>'Admins','sub_url'=>'admins.php','icon'=>'<i class="glyphicon glyphicon-lock"></i>')
		);
	}
else{
	
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Weza | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By M Abdur Rokib Promy">
    <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
    <!-- bootstrap 3.0.2 -->
    <link href="../templates/admin/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../templates/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../templates/css/sweetalert.css" rel="stylesheet" />
	<!-- font Awesome -->
    <link href="../templates/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="../templates/admin/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="../templates/admin/css/style.css" rel="stylesheet" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	
   
	</head>
      <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                Weza | Dashboard
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                         <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span><?php echo $_SESSION['admin_name']; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li>
                                        <a target="_blank" href="../index.php">
                                        <i class="fa fa-home fa-fw pull-right"></i>
                                            Home
                                        </a>
                                       
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="logout.php"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header> 