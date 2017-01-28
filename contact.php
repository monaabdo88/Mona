<?php 
include "includes/header.php"; 
include"includes/menu.php";
$send_msg= '';
if(isset($_POST['send'])){
	$name = mysqli_real_escape_string($conn,strip_tags($_POST['name']));
	$mail = mysqli_real_escape_string($conn,strip_tags($_POST['mail']));
	$sub = mysqli_real_escape_string($conn,strip_tags($_POST['sub']));
	$tel = mysqli_real_escape_string($conn,strip_tags($_POST['tel']));
	$msg = mysqli_real_escape_string($conn,strip_tags($_POST['msg']));
	$msg = wordwrap($msg,70);
	$headers = "From: $mail" . "\r\n" .
    "Phone Number: $tel". "\r\n".
	"Name :$name"."\r\n".
	"Message :".$msg;
    if(mail($site_mail,$sub,$headers)){
		$send_msg = '<div class="col-md-6 col-md-offset-3">
                <div class="alert alert-success text-center lead" id="suc">Your Message had been sent Successfully Thank you.</div></div>
                <div class="clearfix"></div>';
	}
}
?>
<style type="text/css">
@import url(http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600);

#contact-form input[type="text"], 
#contact-form input[type="email"], 
#contact-form input[type="tel"], 
#contact-form input[type="url"], 
#contact-form textarea, 
#contact-form button[type="submit"] 
{ font:400 12px/16px "Open Sans", Helvetica, Arial, sans-serif; }

#contact-form {
	background:#F9F9F9;
	padding:25px;
	margin:25px 20px 25px 0;
}

#contact-form h3 {
	color: #F96;
	display: block;
	font-size: 30px;
	font-weight: 400;
}

#contact-form h4 {
	margin:5px 0 15px;
	display:block;
	font-size:13px;
}

fieldset {
	border: medium none !important;
	margin: 0 0 10px;
	min-width: 100%;
	padding: 0;
	width: 100%;
}

#contact-form input[type="text"], 
#contact-form input[type="email"], 
#contact-form input[type="tel"], 
#contact-form input[type="url"], 
#contact-form textarea {
	width:100%;
	border:1px solid #CCC;
	background:#FFF;
	margin:0 0 5px;
	padding:10px;
}

#contact-form input[type="text"]:hover, 
#contact-form input[type="email"]:hover, 
#contact-form input[type="tel"]:hover, 
#contact-form input[type="url"]:hover, 
#contact-form textarea:hover {
	-webkit-transition:border-color 0.3s ease-in-out;
	-moz-transition:border-color 0.3s ease-in-out;
	transition:border-color 0.3s ease-in-out;
	border:1px solid #AAA;
}

#contact-form textarea {
	height:100px;
	max-width:100%;
  resize:none;
}

#contact-form button[type="submit"] {
	cursor:pointer;
	width:100%;
	border:none;
	background:#0CF;
	color:#FFF;
	margin:0 0 5px;
	padding:10px;
	font-size:15px;
}

#contact-form button[type="submit"]:hover {
	background:#09C;
	-webkit-transition:background 0.3s ease-in-out;
	-moz-transition:background 0.3s ease-in-out;
	transition:background-color 0.3s ease-in-out;
}

#contact-form button[type="submit"]:active { box-shadow:inset 0 1px 3px rgba(0, 0, 0, 0.5); }

#contact-form input:focus, #contact-form textarea:focus {
	outline:0;
	border:1px solid #999;
}
::-webkit-input-placeholder {
 color:#888;
}
:-moz-placeholder {
 color:#888;
}
::-moz-placeholder {
 color:#888;
}
:-ms-input-placeholder {
 color:#888;
}

</style>
<section class=content>

<div class="container home">
<div class="container"> 
<?php echo $send_msg; ?> 
  <form id="contact-form" action="" method="post" role="form">
								
    <h3>Quick Contact</h3>
    <h4>Contact us today, and get reply with in 24 hours!</h4>
    <div class="form-group">
      <input type="text" required="" name="name" id="name" placeholder="Your name" tabindex="1" autofocus>
    </div>
    <div class="form-group">
      <input type="email" required="" name="mail" id="mail" placeholder="Your Email Address" tabindex="2" >
    </div>
    <div class="form-group">
      <input type="tel" required="" name="tel" id="tel" placeholder="Your Phone Number" tabindex="3" >
    </div>
    <div class="form-group">
      <input type="text" required="" name="sub" id="sub" placeholder="Your Message Subject" tabindex="4" >
    </div>
    <div class="form-group">
      <textarea name="msg" required="" id="msg" placeholder="Type your Message Here...." tabindex="5" ></textarea>
    </div>
    <div class="form-group">
	<!--<button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>-->
	<input type="submit" name="send" tabindex="4" class="form-control btn-success" value="Send">
											
    </div>
  </form>
 
  
</div>		
</div>
</section>
<?php include "includes/footer.php"; ?>