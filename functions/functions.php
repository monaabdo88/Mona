<?php
session_start();
$host_name = "localhost";
$db_name = "weza";
$server_name = "root";
$server_pass="";
$conn = mysqli_connect($host_name,$server_name,$server_pass,$db_name);
if(mysqli_connect_errno()){
    die("Failed To Connect To The Database ".mysqli_connect_error());
}
//require_once("includes/db_connect.php");
//Getting IPfro visitors
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
//Getting the categories
function get_cats(){
    global $conn;
    $cats_sql = "select * from cat";
    $run_cats = mysqli_query($conn,$cats_sql);
    while($rows_cat = mysqli_fetch_array($run_cats)){
        $cat_id = $rows_cat['cat_id'];
        $cat_title = $rows_cat['cat_title'];
        $brand_sql = "select * from brands where cat_id = '$rows_cat[cat_id]'";
        $run_brands = mysqli_query($conn,$brand_sql);
        if(mysqli_num_rows($run_brands) > 0){
            echo'<li class=dropdown>
                <a href="cat.php?cat_id='.$rows_cat['cat_id'].'" class=dropdown-toggle data-toggle=dropdown>'.$cat_title.'<span class=caret></span></a>
                <ul class=dropdown-menu role=menu>';
            while($rows_brand = mysqli_fetch_assoc($run_brands)){
                echo'<li><a href="brand.php?brand_id='.$rows_brand['brand_id'].'">'.$rows_brand['brand_title'].'</a></li>';
            }
            echo'</ul></li>';
        }
        else{
            echo'<li><a href="cat.php?cat_id='.$rows_cat['cat_id'].'">'.$cat_title.'</a></li>';
        }
    }
}
function get_pro_desc(){
    global $conn;
    if(isset($_GET['cat_id']))
        $product_sql = "SELECT * FROM products WHERE product_cat = '$_GET[cat_id]'";
    elseif(isset($_GET['brand_id']))
        $product_sql = "SELECT * FROM products WHERE product_brand = '$_GET[brand_id]' ";
    elseif(isset($_GET['all']))
        $product_sql = "SELECT * FROM products";
    elseif(isset($_GET['search'])){
		$search = htmlspecialchars($_GET['search']);
        $product_sql = "select * from products where product_title like '%$search%' or product_keywords like '%$_GET[search]%' or product_disc like '%$_GET[search]%'";
    }else
        $product_sql = "SELECT * FROM products WHERE product_discount = '' ORDER BY RAND() LIMIT 0 , 8";
    
    $run_product = mysqli_query($conn,$product_sql);
    if(mysqli_num_rows($run_product) == 0) echo '<div class="alert alert-danger text-center lead">No Products Found</div>';
    while($rows_product = mysqli_fetch_array($run_product)){
        $pro_id = $rows_product['product_id'];
        $pro_title = $rows_product['product_title'];
        $pro_price = $rows_product['product_price'];
        $pro_discount = $rows_product['product_discount'];
        $pro_image = $rows_product['product_image'];
        $after_discount = $pro_price - $pro_discount;
        
         echo '<div class="col-md-3 col-sm-6" id="'.$rows_product['product_id'].'">
        <div class=pro>';
        if($pro_discount == 0 && !isset($_GET['all']) && !isset($_GET['cat_id'])&& !isset($_GET['brand_id']))
            echo '<span class=new>New</span>';
        elseif($pro_discount != 0)
            echo '<span class=new>Sale</span>';
        echo'<img src="'.$pro_image.'" width=338 height=331 id="item'.$pro_id.'_pro_img"/>
        <h5><a href="details.php?id='.$pro_id.'">'.$pro_title.'</a></h5>
        <div class=\'movie_choice\' style="margin-top:-20px;">
			<div id="'.$pro_id.'" class="rate_widget">
				<div class="star_1 ratings_stars"></div>
				<div class="star_2 ratings_stars"></div>
				<div class="star_3 ratings_stars"></div>
				<div class="star_4 ratings_stars"></div>
				<div class="star_5 ratings_stars"></div>
				<div style="display:none;" class="total_votes">vote data</div><br />
								
			</div>
		</div>
        <ul class="list-unstyled sale">';
        if($pro_discount == 0)
            echo'<li><i class="fa fa-usd"></i>'.$pro_price.'</li>';
        else{
            echo'<li><i class="fa fa-usd"></i>'.$after_discount.'</li>
            <li class=sale><i class="fa fa-usd"></i>'.$pro_price.'</li>
            ';
        }
        echo'<li>
         <input type="button" onClick = "cart('.$pro_id.');" class="btn btn-primary" value="Add to cart"/>	
         <input type="hidden" id="'.$pro_id.'_name" value="'.$pro_id.'">
         <input type="hidden" id="'.$pro_id.'_qty" value="1">
         <input type="hidden" id="'.$pro_id.'_price" value="'.$after_discount.'">
          </li>
        </ul>
        </div>
        </div>';
       
    }
   
}
function get_pro_discount(){
     global $conn;
    $product_sql = "SELECT * FROM products WHERE product_discount != '' ORDER BY RAND() LIMIT 0 , 8";
    $run_product = mysqli_query($conn,$product_sql);
    while($rows_product = mysqli_fetch_array($run_product)){
        $pro_id = $rows_product['product_id'];
        $pro_title = $rows_product['product_title'];
        $pro_price = $rows_product['product_price'];
        $pro_discount = $rows_product['product_discount'];
        $pro_image = $rows_product['product_image'];
        $after_discount = $pro_price - $pro_discount;
         echo '<div class="col-md-3 col-sm-6"  id="'.$rows_product['product_id'].'">
        <div class=pro>
        <span class=new>SALE</span>
        <img src="'.$pro_image.'" width=338 height=331 />
        <h5><a href="details.php?id='.$pro_id.'">'.$pro_title.'</a></h5>
        <p class=star>
        <div class=\'movie_choice\' style="margin-top:-20px;">
								<div id="'.$pro_id.'" class="rate_widget">
									<div class="star_1 ratings_stars"></div>
									<div class="star_2 ratings_stars"></div>
									<div class="star_3 ratings_stars"></div>
									<div class="star_4 ratings_stars"></div>
									<div class="star_5 ratings_stars"></div>
									<div style="display:none;" class="total_votes">vote data</div><br />
								
									</div>
							</div>
        </p>
        <ul class="list-unstyled sale">
        <li><i class="fa fa-usd"></i>'.$after_discount.'</li>
        <li class=sale><i class="fa fa-usd"></i>'.$pro_price.'</li>
        <li>
         <input type="button" onClick = "cart('.$pro_id.');" class="btn btn-primary" value="Add to cart"/>	
         <input type="hidden" id="'.$pro_id.'_name" value="'.$pro_id.'">
         <input type="hidden" id="'.$pro_id.'_qty" value="1">
         <input type="hidden" id="'.$pro_id.'_price" value="'.$after_discount.'">
          </li>
        </ul>
        </div>
        </div>';
    }
   
}

function cart(){
    global $conn;
    if(isset($_GET['add_cart'])){
        $ip = getIp();
        $pro_id = $_GET['add_cart'];
        $chk_pro = "select * from cart where ip_add = '$ip' and p_id = '$pro_id'";
        $run_pro = mysqli_query($conn,$chk_pro);
        if(mysqli_num_rows($run_pro) >0){
            
        }
        else{
            $qty = 1;
            $insert_pro = "insert into cart (p_id , ip_add,quantity) values ('$pro_id','$ip','$qty')";
            $run_insert  = mysqli_query($conn,$insert_pro);
        }
    }
}
function get_total(){
    global $conn;
    if(isset($_GET['add_cart'])){
        $ip = getIp();
        $total_sql = "select * from cart where chk_ref = '$_SESSION[ref]'";
        $run_total = mysqli_query($conn,$total_sql);
        $count_item = mysqli_num_rows($run_total);
    }
    else{
        $ip = getIp();
        $total_sql = "select * from cart where ip_add = '$_SESSION[ref]'";
        $run_total = mysqli_query($conn,$total_sql);
        $count_item = mysqli_num_rows($run_total);
    }
    echo $count_item;
}
function get_total_price(){
    global $conn;
    $total = 0;
    $ip = getIp();
    $sel_price = "select * from cart where chk_ref = '$_SESSION[ref]'";
    $run_sql = mysqli_query($conn,$sel_price);
    while($p_price = mysqli_fetch_assoc($run_sql)){
        $pro_id = $p_price['p_id'];
        $pro_sql = "select * from products where product_id = '$pro_id'";
        $run_pro = mysqli_query($conn,$pro_sql);
        while($pro_row = mysqli_fetch_assoc($run_pro)){
            $product_price = array($pro_row['product_price']);
            $values = array_sum($product_price);
            $total += $values;
        }
    }
    echo $total;
}
function get_all_country($sel_country = 0){
    global $conn;
    $sql_get = "select * from country order by country_title asc";
    $run_sql = mysqli_query($conn,$sql_get);
    while($rows = mysqli_fetch_assoc($run_sql)){
        if($rows['country_id'] == $sel_country)
            $selected = "selected";
        else
            $selected = '';
        echo '<option '.$selected.' value="'.$rows['country_id'].'">'.ucwords($rows['country_title']).'</option> ';
    }
    
}
function get_city($sel_city= 0,$sel_country = 0){        
    global $conn;
    $categoryId = $_POST['categoryId'];
    $equl = '';
        $equl .="<option selected=\"true\" disabled=\"disabled\" value=''>Select City</option>";
        if($sel_city != 0)
        $sub_cat = "SELECT * FROM city where country_id = '$sel_country'";
        else
        $sub_cat = "SELECT * FROM city WHERE country_id = '$categoryId'";
        $res= mysqli_query($conn,$sub_cat); 
        while($data=mysqli_fetch_assoc($res))
        {
            if($data['city_id'] == $sel_city)
                $selected = "selected";
            else
                $selected = '';
        $equl .="<option ".$selected." value='".$data['city_id']."'>".ucwords($data['city_title'])."</option>";
        }
        echo $equl;
}
function get_brand($sel_brand= 0,$sel_cat = 0){        
    global $conn;
    $categoryId = $_POST['categoryId'];
    $equl = '';
        $equl .="<option selected=\"true\" disabled=\"disabled\" value=''>Select Brand</option>";
        if($sel_brand != 0)
        $sub_cat = "SELECT * FROM brands WHERE cat_id = '$sel_cat'";
        else
        $sub_cat = "SELECT * FROM brands WHERE cat_id = '$categoryId'";
        $res= mysqli_query($conn,$sub_cat); 
        while($data=mysqli_fetch_assoc($res))
        {
            if($data['brand_id'] == $sel_brand)
                $selected = "selected";
            else
                $selected = '';
        $equl .="<option ".$selected." value='".$data['brand_id']."'>".ucwords($data['brand_title'])."</option>";
        }
        echo $equl;
}
function add_to_cart($pro_id,$qty = 1)
	{
	global $conn;
	$ip = getIp();
	$insert_pro = "insert into cart (p_id , ip_add,quantity) values ('$pro_id','$ip','$qty')";
    $run_insert  = mysqli_query($conn,$insert_pro);
	}
function count_cart()
	{
	session_start();
	$this->load->model('database'); 
	$this->load->helper('url');
	
	$user_ip = $_SERVER['REMOTE_ADDR'];
	$this->db->where('ip',$user_ip);
	$this->db->where('order_id',0);
	$items = $this->database->select('cart');	
	$count_items = count($items);
	echo $count_items;
	}
function get_num($tblname){
    global $conn;
    $run_tbl = "select * from `$tblname`";
    $run_sql = mysqli_query($conn,$run_tbl);
    $count = mysqli_num_rows($run_sql);
    echo $count;
}
function get_social(){
	global $conn;
	$icons = "select * from socials";
	$run_icons = mysqli_query($conn,$icons);
	while($row = mysqli_fetch_array($run_icons)){
		echo'<li><a href="'.$row['icon_url'].'"><img src="'.$row['icon_img'].'" title="'.$row['icon_title'].'" width=48 height=48 /></a></li>';
	}
}
function get_partners(){
	global $conn;
	$icons = "select * from partners";
	$run_icons = mysqli_query($conn,$icons);
	while($row = mysqli_fetch_array($run_icons)){
		echo'<li class="col-md-2 col-xs-6"><a href="'.$row['partner_url'].'"><img class="img-responsive center-block" src="'.$row['partner_img'].'" title="'.$row['partner_title'].'" width=126 height=28/></a></li>';
	}
}
function get_sliders(){
	global $conn;
	$sliders = "select * from sliders";
	$run_sliders = mysqli_query($conn,$sliders);
	
	while($row= mysqli_fetch_array($run_sliders)){
		echo'
		<li><img title="'.$row['slider_title'].'" src="'.$row['slider_img'].'" alt="'.$row['slider_title'].'" /></li>';
	}
	
	
}
function get_about(){
	global $conn;
	$about = "select * from about";
	$run_about = mysqli_query($conn,$about);
	while($row = mysqli_fetch_array($run_about)){
		$enter = $row['enter'];
		$stan = $row['standard'];
		$basic = $row['basic'];
		
	}
	echo '<div class="col-md-4 col-sm-4">
			<div class="price-box wow zoomIn" data-wow-offset=110 data-wow-duration=.2s data-wow-delay=.2s>
			<h3><i class="fa fa-trophy fa-lg"></i> Enterprise</h3>
			<p class=lead>'.$enter.'</p>
			<br/>
			</div>
			</div>
			<div class="col-md-4 col-sm-4">
			<div class="price-box active  wow zoomIn" data-wow-offset=110 data-wow-duration=.5s data-wow-delay=.5s>
			<h3><i class="fa fa-phone fa-lg"></i> Standard</h3>
			<p class=lead>'.$stan.'</p>
			<br/>
			</div>
			</div>
			<div class="col-md-4 col-sm-4">
			<div class="price-box wow zoomIn" data-wow-offset=110 data-wow-duration=.7s data-wow-delay=.7s>
			<h3><i class="fa fa-headphones fa-lg"></i> Basic</h3>
			<p class=lead>'.$basic.'</p>
			<br/>
			</div>
			</div>';
}
