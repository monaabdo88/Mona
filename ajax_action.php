<?php
$host_name = "localhost";
$db_name = "weza";
$server_name = "root";
$server_pass="";
$conn = mysqli_connect($host_name,$server_name,$server_pass,$db_name);
if(mysqli_connect_errno()){
    die("Failed To Connect To The Database ".mysqli_connect_error());
}
require"functions/functions.php";
	$date = date("Y:m:d h:i:s");
    $rand_num = mt_rand();
    if(isset($_SESSION['ref'])){
        
    }else{
		$_SESSION['ref'] = $date.'-'.$rand_num; 
	}
	
if(isset($_POST['total_cart_items']))
  {
    $ip = getIp();
    $products_count = "select * from cart where chk_ref = '$_SESSION[ref]'";
    $run_pro_count = mysqli_query($conn,$products_count);
    echo mysqli_num_rows($run_pro_count);
	//echo count($_SESSION['name']);
	exit();
  }

  if(isset($_POST['item_src']))
  {
    $_SESSION['name'][]=$_POST['item_name'];
    $_SESSION['price'][]=$_POST['item_price'];
    $_SESSION['src'][]=$_POST['item_src'];
	
    $ip = getIp();
    $qty =$_POST['item_qty'];
    $pro_id = $_POST['item_name'];
    $pro_price = $_POST['item_price'];
    $insert_pro = "insert into cart (p_id , ip_add,quantity,price,chk_ref) values ('$pro_id','$ip','$qty','$pro_price','$_SESSION[ref]')";
    $run_insert  = mysqli_query($conn,$insert_pro);
    $products_count = "select * from cart where chk_ref = '$_SESSION[ref]'";
    $run_pro_count = mysqli_query($conn,$products_count);
    echo mysqli_num_rows($run_pro_count);
    //echo count($_SESSION['name']);
    exit();
  }

  if(isset($_POST['showcart']))
  {
    for($i=0;$i<count($_SESSION['src']);$i++)
    {
      echo "<div class='cart_items'>";
      echo "<img src='".$_SESSION['src'][$i]."'>";
      echo "<p>".$_SESSION['name'][$i]."</p>";
      echo "<p>".$_SESSION['price'][$i]."</p>";
      echo "</div>";
    }
    exit();	
  }
?>
