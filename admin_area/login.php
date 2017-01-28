<?php 
session_start();
require "../includes/db_connect.php"; 
if(isset($_SESSION['admin_name']) && $_SESSION['admin_name'] != ''){
	echo '<script>window.open("index.php","_self")</script>';
}
?>
<!DOCTYPE HTML>
<head>
<meta http-equiv=content-type content="text/html"/>
<meta name=author content=Boomer />
<meta http-equiv=X-UA-Compatible content="IE=edge"/>
<meta name=viewport content="width=device-width, initial-scale=1"/>
<link href="../templates/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link rel=stylesheet href="../templates/admin/css/login.css"/>
<style type="text/css">
label.error{
	color:red;
}
</style>
<title>Weza OnLineStore</title>
</head>
<html>
<body>
<div class="login">
    <?php 
	if(isset($_GET['not_admin']) && $_GET['not_admin'] == 'yes'){
		echo'<div class="alert alert-danger" id="danger"><h4 class="lead text-center">You are not Admin </h4></div>';
	}
	if(isset($_GET['logout_admin']) && $_GET['logout_admin'] == 'yes'){
		echo'<div class="alert alert-success" id="suc"><h5 class="lead text-center">You have logged out successfully </h5></div>';	
	}
	?>
	<h1>Admin Login</h1>
    <form method="post" id="login_form">
    	<input type="text" id="name" name="admin_name" placeholder="Admin Name" required="required" />
        <input type="password" id="pass" name="admin_pass" placeholder="Admin Password" required="required" />
        <button type="submit" name="login" class="btn btn-primary btn-block btn-large">Login</button>
    </form>
</div>
<?php 
$msg = '';
if(isset($_POST['login'])){
	$name = mysqli_real_escape_string($conn,strip_tags($_POST['admin_name']));
    $pass = mysqli_real_escape_string($conn,strip_tags(md5(sha1($_POST['admin_pass']))));
    $login_sql = "select * from admin where admin_name = '$name' and admin_pass = '$pass'";
    $run_login = mysqli_query($conn,$login_sql);
    $run_count = mysqli_num_rows($run_login);
	$admin_fetch = mysqli_fetch_array($run_login);
	$admin_id = $admin_fetch['admin_id'];
	if($run_count == 0){
		$msg = "<div class=\"col-md-6 col-md-offset-3\">
            <div class='alert alert-danger text-center lead' id='danger'>
            Sorry Username or Password is Wrong Please try again</div></div><div class='clearfix'></div>";
	}
	else{
		$_SESSION['admin_name'] = $name;
		$_SESSION['admin_id'] = $admin_id;
		echo "<script>window.open('index.php?login=yes','_self')</script>";
	}
    
}
echo '<br />'.$msg;
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="../templates/js/jquery.validate.js"></script>
<script type="text/javascript">
            $(document).ready(function(){
               $("#danger").fadeTo(2000,3000).slideUp(1000,function(){
                $("#add_new_form").submit();
            });
            $("#suc").fadeTo(2000,1000).slideUp(1000,function(){
                    $("#add_new_form").submit();
            }); 
 			});
//////////////////////////form validation//////////////////////
$().ready(function() {
        $("#login_form").validate({
			rules: {
				name: "required",
				pass: "required",
				name:{
					required: true,
					minlength: 2
				},
				pass: {
					required: true,
					minlength: 5
				}
			},
			messages: {
				name: {
					required: "Please enter Admin Name",
					minlength: "Your username must consist of at least 2 characters"
				},
				pass: {
					required: "Please provide Admin password",
					minlength: "Your password must be at least 5 characters long"
				}
			}
		});
        
        
});
</script>		
</body>
</html>