<?php
require "functions/functions.php";
$ip = getIp();
cart();
//get_total_price();
$msg = '';
/////////////////////////////singup form /////////////////////////////////////
if(isset($_POST['register-submit'])){
$username = mysqli_real_escape_string($conn,strip_tags($_POST['username']));
$email = mysqli_real_escape_string($conn,strip_tags($_POST['email']));
$password = mysqli_real_escape_string($conn,strip_tags(md5(sha1($_POST['password']))));
$pass_md = mysqli_real_escape_string($conn,strip_tags($_POST['password']));
$country = mysqli_real_escape_string($conn,strip_tags($_POST['country']));
$city = mysqli_real_escape_string($conn,strip_tags($_POST['city']));
$contact = mysqli_real_escape_string($conn,strip_tags(abs($_POST['contact'])));
$address = mysqli_real_escape_string($conn,strip_tags($_POST['address']));
    if(isset($_FILES['img']['name'])){
        $file_name = rand(0,9999).'_'.time().'_'.$_FILES['img']['name'];
        $path_folder = "templates/images/users/".$file_name;
        $img = "templates/images/users/".$file_name;
        $img_confirm = 1;
        $file_type = pathinfo($file_name,PATHINFO_EXTENSION);
        if($_FILES['img']['size'] > 2000000){
            $msg = "<div class=\"col-md-6 col-md-offset-3\">
            <div class='alert alert-danger lead text-center' id='danger'>
            Sorry Image size must be less than 2 MB Try Again</div></div><div class='clearfix'></div>";
            $img_confirm = 0;
        }
        if($file_type != 'jpg' && $file_type != 'png' && $file_type != 'JPEG' && $file_type != 'gif'){
            $msg = "<div class=\"col-md-6 col-md-offset-3\"><div class='alert alert-danger text-center lead' id='danger'>
            Sorry Image must be JPG or GIF or Png Try Again</div></div><div class='clearfix'></div>";
            $img_confirm = 0;
        }
        $sql_username = "select * from customer where user_name = '$username' or user_mail = '$email'";
        $run_sql = mysqli_query($conn,$sql_username);
        if(mysqli_num_rows($run_sql) > 0 ){
            $img_confirm = 0;
            $msg = "<div class=\"col-md-6 col-md-offset-3\">
            <div class='alert alert-danger text-center lead' id='danger'>
            Sorry Username or Email is already taken Please try again</div></div><div class='clearfix'></div>";
            
        }
        if($img_confirm == 0){
            
        }
        else{
          if(move_uploaded_file($_FILES['img']['tmp_name'],$path_folder)){
              $pro_insert_sql ="insert into customer (user_ip,user_name,user_pass,user_mail,user_country,user_city,user_contact,user_address,user_img,pass_md) 
              values ('$ip','$username','$password','$email','$country','$city','$contact','$address','$img','$pass_md')";
              $run_insert = mysqli_query($conn,$pro_insert_sql);
              if($run_insert){
                $msg = '<div class="col-md-6 col-md-offset-3">
                <div class="alert alert-success text-center lead" id="suc">Register Done Successfully</div></div>
                <div class="clearfix"></div>
                ';
                $cart = "select * from cart where chk_ref = '$_SESSION[ref]'";
                $run_cart = mysqli_query($conn,$cart);
                //header( "refresh:3;url=".$_SERVER['HTTP_REFERER']);
                //echo '<meta http-equiv="refresh" content="3; url='.$_SERVER['HTTP_REFERER'].'" />';
                $_SESSION['user_name'] = $username;
               }
          }
        }
    }
}
////////////////////login form /////////////////////////////
if(isset($_POST['login-submit'])){
    $name = mysqli_real_escape_string($conn,strip_tags($_POST['name']));
    $pass = mysqli_real_escape_string($conn,strip_tags(md5(sha1($_POST['pass']))));
    $login_sql = "select * from customer where user_name = '$name' and user_pass = '$pass'";
    $run_login = mysqli_query($conn,$login_sql);
    $run_count = mysqli_num_rows($run_login);
    if($run_count == 0){
         $msg = "<div class=\"col-md-6 col-md-offset-3\">
            <div class='alert alert-danger text-center lead' id='danger'>
            Sorry Username or Password is Wrong Please try again</div></div><div class='clearfix'></div>";
    }
    else{     
            while($row_user = mysqli_fetch_array($run_login)){
				if($row_user['user_status'] == 0){
						$msg = "<div class=\"col-md-6 col-md-offset-3\">
            <div class='alert alert-danger text-center lead' id='danger'>
            Contact With us to Reactivate your Account</div></div><div class='clearfix'></div>";

				}
				else{
					$msg = '<div class="col-md-6 col-md-offset-3">
                <div class="alert alert-success text-center lead" id="suc">Login Done Successfully</div></div>
                <div class="clearfix"></div>';
                $_SESSION['user_name'] = $name;
				}
			}	   
    }
} 
//////////////////////// login form ////////////////////////////////////
if(isset($_POST['done'])){
    $email = mysqli_real_escape_string($conn,strip_tags($_POST['email']));
    $sql_email = "select * from customer where user_mail = '$email'";
    $run_email = mysqli_query($conn,$sql_email);
    $count_email = mysqli_num_rows($run_email);
    if($count_email == 0){
        $msg = "<div class=\"col-md-6 col-md-offset-3\">
            <div class='alert alert-danger text-center lead' id='danger'>
            Sorry This Email is not valid</div></div><div class='clearfix'></div>";
    }
    else{
        while($rows_mail = mysqli_fetch_assoc($run_email)){
            $retrun_pass = $rows_mail['pass_md'];
        }
        $subject = "Your Forgeten Password";
        $msg = "Your password is ".$retrun_pass;

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);
        
        // send email
        mail($email,$subject,$msg);
         $msg = '<div class="col-md-6 col-md-offset-3">
                <div class="alert alert-success text-center lead" id="suc">Your Password had been sent to your email Successfully</div></div>
                <div class="clearfix"></div>';
    }
}
/////////////////////edit form /////////////////////////
if(isset($_POST['edit-submit'])){
$username = mysqli_real_escape_string($conn,strip_tags($_POST['username']));
$email = mysqli_real_escape_string($conn,strip_tags($_POST['email']));
$password = mysqli_real_escape_string($conn,strip_tags(md5(sha1($_POST['password']))));
$pass_md = mysqli_real_escape_string($conn,strip_tags($_POST['password']));
$country = mysqli_real_escape_string($conn,strip_tags($_POST['country']));
$city = mysqli_real_escape_string($conn,strip_tags($_POST['city']));
$contact = mysqli_real_escape_string($conn,strip_tags(abs($_POST['contact'])));
$address = mysqli_real_escape_string($conn,strip_tags($_POST['address']));
if($_FILES['img']['name']){
        $file_name = rand(0,9999).'_'.time().'_'.$_FILES['img']['name'];
        $path_folder = "templates/images/users/".$file_name;
        $img = "templates/images/users/".$file_name;
        $file_type = pathinfo($file_name,PATHINFO_EXTENSION);
        if($_FILES['img']['size'] > 2000000){
            $msg = "<div class=\"col-md-6 col-md-offset-3\">
            <div class='alert alert-danger lead text-center' id='danger'>
            Sorry Image size must be less than 2 MB Try Again</div></div><div class='clearfix'></div>";
            $img_confirm = 0;
        }
        if($file_type != 'jpg' && $file_type != 'png' && $file_type != 'JPEG' && $file_type != 'gif'){
            $msg = "<div class=\"col-md-6 col-md-offset-3\"><div class='alert alert-danger text-center lead' id='danger'>
            Sorry Image must be JPG or GIF or Png Try Again</div></div><div class='clearfix'></div>";
            $img_confirm = 0;
        }
        else{
            $img_confirm = 1;
            move_uploaded_file($_FILES['img']['tmp_name'],$path_folder);
        }
        }
        else{
            $img_confirm = 1;
            $sql_img = "select * from customer where user_name = '$_SESSION[user_name]'";
            $run_sql_img = mysqli_query($conn,$sql_img);
            while($row_img = mysqli_fetch_assoc($run_sql_img)){
                $img = $row_img['user_img'];
            }
            //$img= $edit_img;
        }      
        $sql_username = "select * from customer where user_name != '$_SESSION[user_name]'";
        $run_sql = mysqli_query($conn,$sql_username);
        while($up_mail =mysqli_fetch_assoc($run_sql)){
            if($up_mail['user_name'] == $username){
            $img_confirm = 0;
            $msg = "<div class=\"col-md-6 col-md-offset-3\">
            <div class='alert alert-danger text-center lead' id='danger'>
            Sorry Username is already taken Please try again</div></div><div class='clearfix'></div>";
            }
            if($up_mail['user_mail'] == $email){
            $img_confirm = 0;
            $msg = "<div class=\"col-md-6 col-md-offset-3\">
            <div class='alert alert-danger text-center lead' id='danger'>
            Sorry Email is already taken Please try again</div></div><div class='clearfix'></div>";
            
            }
          }
        if($img_confirm == 0){
            
        }
        else{
               $pro_up_sql ="update customer set user_name = '$username', user_mail = '$email', user_pass = '$password', user_country = '$country', user_city = '$city', user_contact = '$contact', user_address = '$address', user_img = '$img' , pass_md = '$pass_md'  
              where user_name = '$_SESSION[user_name]'";
              $run_up = mysqli_query($conn,$pro_up_sql);
              if($run_up){
                $msg = '<div class="col-md-6 col-md-offset-3">
                <div class="alert alert-success text-center lead" id="suc">Update Account Done Successfully</div></div>
                <div class="clearfix"></div>
                ';
                $_SESSION['user_name'] = $username;
            }
          
        }
}
///////////////////delete user ////////////////////////////////
if(isset($_POST['yes'])){
    $sel_user = "select * from customer where user_name = '$_SESSION[user_name]'";
    $run_user = mysqli_query($conn,$sel_user);
    while($rows_user = mysqli_fetch_assoc($run_user)){
        $del_cart = "delete from cart where ip_add = '$rows_user[user_ip]'";
        $run_del_cart = mysqli_query($conn,$del_cart);
    }  
    $del_user = "delete from customer where user_name = '$_SESSION[user_name]'";
    $run_del_user = mysqli_query($conn,$del_user);
    if($run_del_user){
        $msg = '<div class="col-md-6 col-md-offset-3">
                <div class="alert alert-success text-center lead" id="suc">Delete your Account And Your Orders Done Successfully</div></div>
                <div class="clearfix"></div>
                ';
                /*$cart = "select * from cart where ip_add = '$ip'";
                $run_cart = mysqli_query($conn,$cart);*/
                //session_destroy();
                //header( "refresh:3;url=".$_SERVER['HTTP_REFERER']);
				unset($_SESSION['user_name']);
    } 
}

$main = "select * from main";
$run_main = mysqli_query($conn,$main);
while($row_main = mysqli_fetch_array($run_main)){
?>
<!DOCTYPE HTML>
<head>
<meta http-equiv=content-type content="text/html"/>
<meta name=author content=Boomer />
<meta http-equiv=X-UA-Compatible content="IE=edge"/>
<meta name=viewport content="width=device-width, initial-scale=1"/>
<meta name="description" content="<?php echo strip_tags($row_main['site_disc']); ?>" /> 
 <meta name="keywords" content="<?php echo strip_tags($row_main['site_tags']); ?>" /> 
<link rel="stylesheet" href="templates/css/flexslider.css" type="text/css" media="screen" />
<link rel=stylesheet href="templates/css/bootstrap.css"/>
<link rel=stylesheet href="templates/css/font-awesome.min.css"/>
<link rel=stylesheet href="templates/css/animate.css"/>
<link rel=stylesheet href="templates/css/hover.css"/>
<link rel=stylesheet media=all href="templates/css/media.css"/>
<link rel=stylesheet media=all href="templates/css/style.css"/>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel=stylesheet />
<link href="templates/css/sweetalert.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<title><?php echo $row_main['site_name']; ?></title>
<?php 
if($row_main['site_status'] == 'Close'){
	 die('<div class="alert alert-danger" style="width:50%;margin:200px auto;text-align:center;font-size:1.50em;">
	<button type="button" class="close" data-dismiss="alert">×</button>'.$row_main['close_msg'].'</div>');
}
$sub_title = $row_main['sub_title'];
$about = $row_main['about_us'];
$site_url = $row_main['site_url'];
$copy = $row_main['site_copyrights'];
$site_mail = $row_main['site_mail'];
$contact_details = $row_main['site_contact'];
?>
</head>
<html>
<body>
<section class=top>
<section class=topnav>
<div class=container>
<ul class="list-unstyled left social wow fadeInLeft"><?php get_social(); ?></ul>
<ul class="list-unstyled right links wow fadeInRight">
<?php if(! isset($_SESSION['user_name'])){ ?>
<li><a href="#login"  data-toggle="modal" data-target="#login" data-backdrop="static" data-keyboard="false">Login / Registar</a></li>
<?php }else{
    echo '<li class="lead">Welcome Back <a href="#account_'.$_SESSION['user_name'].'"   data-toggle="modal" data-target="#account_'.$_SESSION['user_name'].'" data-backdrop="static" data-keyboard="false">'.$_SESSION['user_name'].'</a> | <a href="logout.php"> Logout</a></li>';
} ?>
<li class=cart><a onclick="show_cart();" href="cart.php"><i class="fa fa-shopping-cart fa-lg"></i> Cart(<input style="background: none;border:0;" type="button" id="total_items" value="">)</a></li>
</ul>
</div>
</section>
<div id="login" class="modal fade" role="dialog">
  <div class="modal-dialog">
   <button type="button" class="close" data-dismiss="modal">&times;</button>
    <!-- Modal content-->

     <div class="container">
    	<div class="row">
			<div class="col-md-6">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
                            <!--------------------------- login form ------------------------------>
								<?php include"login.php"; ?>
                            <!------------------------------- signup----------------------------------------------------->
								<?php include"singup.php"; ?>
								<button type="button" class="btn btn-default" style="float:right;" data-dismiss="modal">Close</button>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    
  </div>
</div>
<!------------------------- forget password modal ----------------------------------->
<?php include"forget.php"; ?>
<!---------------------------- end forget password modal ---------------------------->
<!------------------------------ edit form ---------------------------------------->
<?php if(isset($_SESSION['user_name'])): ?>
<div id="account_<?php echo $_SESSION['user_name'] ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
   <button type="button" class="close" data-dismiss="modal">&times;</button>
    <!-- Modal content-->

     <div class="container">
    	<div class="row">
			<div class="col-md-6">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-4">
								<a href="#" class="active" id="edit_account">Edit Account</a>
							</div>
							<div class="col-xs-4">
								<a href="#" id="orders">My Orders</a>
							</div>
                            <div class="col-xs-4">
								<a href="#" id="del_account">Delete Account</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12 col-md-12">
                            <!------------------------------- Edit----------------------------------------------------->
							<?php include"edit_pro.php"; ?>
                            <!------------------------------ delete form ------------------------------>
                                <form class="cmxform" id="delete-form"  name="delete-form" action="" method="post" role="form" style="display: none;" enctype="multipart/form-data" >
									    <p class="lead text-center">Are You Sure You want to delete your Account And your orders ?</p>
                                    <center>
                                    <input type="submit" name="yes" value="Yes I am sure " class="btn btn-danger" />
                                    <input type="submit" name="no" value="No Cancel" class="btn btn-success" />
                                    </center>
                                    <hr />
                                </form>
								<!------------------------------- my orders ------------------------------->
								<?php include"orders.php"; ?>
								<button type="button" class="btn btn-default" style="float:right;" data-dismiss="modal">Close</button>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    
  </div>
</div>
<?php

endif;
echo $msg;
}
	
if(isset($_SESSION['user_name']) && isset($_GET['success'])){
	$sel_user = "select *from customer where user_name = '$_SESSION[user_name]'";
	$run_user = mysqli_query($conn,$sel_user);
	$user_row = mysqli_fetch_array($run_user);
	$customer_id = $user_row['user_id'];
	$customer_email = $user_row['user_mail'];
	$customer_name = $user_row['user_name'];
	if($_GET['success'] == 'yes'){
				$pro_sum = 0;
				$delivery = 0;
				$pro_cart_qty = 0;
				$cart_pro = "select *from cart where chk_ref = '$_SESSION[ref]'";
				$run_cart_pro = mysqli_query($conn,$cart_pro);
				while($row_cart = mysqli_fetch_array($run_cart_pro)){
					$pro_id = $row_cart['p_id'];
					$pro_cart_price = $row_cart['price'];
					$pro_cart_qty += $row_cart['quantity'];
					$sub_total = $row_cart['price'] * $row_cart['quantity'];
					$pro_sum+= $sub_total;
					$chk_ref = $row_cart['chk_ref'];
					$pro_price = "select * from products where product_id = '$pro_id'";
					$run_pro = mysqli_query($conn,$pro_price);
				while($row_pro = mysqli_fetch_array($run_pro)){
					$delivery += $row_pro['product_delivery'];
					}
						
				}
				$grand = $pro_sum + $delivery;
		        
				$amount = $_GET['amt'];
				$currency = $_GET['cc'];
				$trx_id = $_GET['tx'];
				$insert = "insert into payments (amount,user_id,product_id,trx_id,currency,payment_date) values('$amount','$customer_id','$chk_ref','$trx_id','$currency',NOW())";
				$run_insert = mysqli_query($conn,$insert);
				$inser_order = "insert into orders (ref,c_id,qty,price,order_date,status) values ('$chk_ref','$customer_id','$pro_cart_qty','$amount',NOW(),'in Progress')";
				$run_orders = mysqli_query($conn,$inser_order);
				
				if($amount == $grand){
					echo'<div class="col-md-6 col-md-offset-3">
                <div class="alert alert-success text-center lead" id="suc">your Payment was Successfully done.
				go to your account to see your order details</div></div>
                <div class="clearfix"></div>';
				}
				
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <sales@onlinetuting.com>' . "\r\n";
			
			$subject = "Order Details";
			
			$message = "<html> 
			<p>
			
			Hello dear <b style='color:blue;'>$customer_name</b> you have ordered some products on our website Weza-store.com, please find your order details, your order will be processed shortly. Thank you!</p>
			
				<table width='600' align='center' bgcolor='#FFCC99' border='2'>
			
					<tr align='center'><td colspan='6'><h2>Your Order Details from Weza-store.com</h2></td></tr>
					
					<tr align='center'>
						<th><b>S.N</b></th>
						<th><b>Order Number</b></th>
						<th><b>Payment Number</b></th>
						<th><b>Qty</th></th>
						<th>Total</th>
					</tr>
					
					<tr align='center'>
						<td>1</td>
						<td>$chk_ref</td>
						<td>$trx_id</td>
						<td>$pro_cart_qty</td>
						<td>$grand</td>
					</tr>
			
				</table>
				
				<h3>Please go to your account and see your order details!</h3>
				<h3> Thank you for your order @ -www.weza-store.000webhostapp.com/</h3>
				
			</html>
			
			";
			
			mail($customer_email,$subject,$message,$headers);
			
				unset($_SESSION['ref']);
				header( "refresh:5;url=".$_SERVER['HTTP_REFERER']);

	}else{
		echo"<div class=\"col-md-6 col-md-offset-3\">
            <div class='alert alert-danger text-center lead' id='danger'>
            Sorry Your payment was not done successfully Please go to your <a href=\"cart.php\">cart</a> and checkout again</div></div><div class='clearfix'></div>";
            
	}
}
?>