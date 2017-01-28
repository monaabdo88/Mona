<?php include"includes/header.php"; ?>
<div class="wrapper row-offcanvas row-offcanvas-left">
<aside class="left-side sidebar-offcanvas">
<!-- sidebar: style can be found in sidebar.less -->
<?php include"includes/sidebar.php"; ?>
<!-- /.sidebar -->
</aside>
<aside class="right-side">
<!-- Main content -->
<section class="content">
<?php if(isset($_GET['login']) && $_GET['login'] == 'yes'){
	echo'<div class="alert alert-success" id="suc"><h4 class="lead text-center">Welcome Back '.$_SESSION['admin_name'].'</h4></div>';
	
} ?>
	<?php
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
	$x=0;
					$pages = array(
					'Main Settings'=>array('title'=>'Main Settings','sub_url'=>'main.php','icon'=>'<i class="glyphicon glyphicon-cog"></i>','color'=>'st-blue','tablename'=>'main'),
					'About Us'=>array('title'=>'About Us','sub_url'=>'about.php','icon'=>'<i class="glyphicon glyphicon-info-sign"></i>','color'=>'st-green','tablename'=>'about'),
					'Sliders'=>array('title'=>'Sliders','sub_url'=>'sliders.php','icon'=>'<i class="glyphicon glyphicon-picture"></i>','color'=>'st-red','tablename'=>'sliders'),
					'Countries'=>array('title'=>'Countries','sub_url'=>'countries.php','icon'=>'<i class="glyphicon glyphicon-globe"></i>','color'=>'st-violet','tablename'=>'country'),
					'Cities'=>array('title'=>'Cities','sub_url'=>'cities.php','icon'=>'<i class="glyphicon glyphicon-map-marker"></i>','color'=>'st-blue','tablename'=>'city'),
					'Categories'=>array('title'=>'Categories','sub_url'=>'cats.php','icon'=>'<i class="glyphicon glyphicon-list-alt"></i>','color'=>'st-green','tablename'=>'cat'),
					'Brands'=>array('title'=>'Brands','sub_url'=>'sub.php','icon'=>'<i class="glyphicon glyphicon-th"></i>','color'=>'st-red','tablename'=>'brands'),
					'Products'=>array('title'=>'Products','sub_url'=>'products.php','icon'=>'<i class="glyphicon glyphicon-gift"></i>','color'=>'st-violet','tablename'=>'products'),
					'Customers'=>array('title'=>'Customers','sub_url'=>'customers.php','icon'=>'<i class="fa fa-users"></i>','color'=>'st-blue','tablename'=>'customer'),
					'Orders'=>array('title'=>'Orders','sub_url'=>'orders.php','icon'=>'<i class="glyphicon glyphicon-shopping-cart"></i>','color'=>'st-green','tablename'=>'orders'),
					'Partners'=>array('title'=>'Partners','sub_url'=>'partners.php','icon'=>'<i class="glyphicon glyphicon-th-large"></i>','color'=>'st-red','tablename'=>'partners'),
					'Socials'=>array('title'=>'Socials','sub_url'=>'socials.php','icon'=>'<i class="fa fa-facebook"></i>','color'=>'st-violet','tablename'=>'socials'),
					'Admins'=>array('title'=>'Admins','sub_url'=>'admins.php','icon'=>'<i class="glyphicon glyphicon-lock"></i>','color'=>'st-blue','tablename'=>'admin')
					
					);
					if($_SESSION['admin_id'] == 1)
					$foreach = $pages;
					else
					$foreach = $admin_pages;					
					foreach ($foreach as $key=>$value) {					
					if($_SESSION['admin_id'] == 1)
					$index = $key;
					else
					$index = $value;					
					$page_url = $index;
					$page_sub_url = $pages[$index]['sub_url'];
					$page_title = $pages[$index]['title'];			
					$page_icon = $pages[$index]['icon'];			
					$page_color = $pages[$index]['color'];			
					$tblanem = $pages[$index]['tablename'];
					$run_tbl = "select * from `$tblanem`";
					$run_sql = mysqli_query($conn,$run_tbl);
					$count = mysqli_num_rows($run_sql);
					if($page_url == 'password')
					$page_url = 'admin/edit/'.$_SESSION['admin_id'];
					$x++;
					if($x%4 == 1 || $x==1)
					echo'<div class="row" style="margin-bottom:5px;">';
					echo '
					<div class="col-md-3">
					 <div class="sm-st clearfix">
					 <span class="sm-st-icon '.$page_color.'">'.$page_icon.'</span>
					 <div class="sm-st-info">
					 <span>'.$count.'</span>
					 <a href="'.$page_sub_url.'" target="_blank">'.$page_title.'</a>
					 </div>
					 </div>
					 </div>
						';
					
					if(count($foreach)%4==0 && $x == count($foreach))
					echo '</div><div class="row" style="margin-bottom:5px;">';

					if($x == count($foreach) ){
					echo ' <div class="col-md-3">
						<div class="sm-st clearfix">
						<span class="sm-st-icon st-red"><i class="glyphicon glyphicon-off"></i></span>
						<div class="sm-st-info">
						<span>1</span>
						<a href="logout.php">Logout</a>
						</div>
						</div>
						</div>';	
					}
						if($x%4 == 0 && $x>0)
						echo'</div>';
						
				}
		?>
		<!-- <div class="col-md-3">
		 <div class="sm-st clearfix">
		 <span class="sm-st-icon st-violet"><i class="fa fa-home"></i></span>
		 <div class="sm-st-info">
		 <span>1</span>
		 <a href="../index.php" target="_blank">Home</a>
		 </div>
		 </div>
		 </div>
		 
		 <div class="col-md-3">
		<div class="sm-st clearfix">
		<span class="sm-st-icon st-blue"><i class="glyphicon glyphicon-cog"></i></span>
		<div class="sm-st-info">
		<span>1</span>
		<a href="main.php">Main Settings</a>
		</div>
		</div>
		</div>
		
		 <div class="col-md-3">
		<div class="sm-st clearfix">
		<span class="sm-st-icon st-green"><i class="glyphicon glyphicon-info-sign"></i></span>
		<div class="sm-st-info">
		<span>1</span>
		<a href="about.php">About Us</a>
		</div>
		</div>
		</div>

		<div class="col-md-3">
		<div class="sm-st clearfix">
		<span class="sm-st-icon st-red"><i class="glyphicon glyphicon-picture
		"></i></span>
		<div class="sm-st-info">
		<span><?php get_num('sliders'); ?></span>
		<a href="sliders.php">Sliders</a>
		</div>
		</div>
		</div>

	</div>
	<!-- row end -->
	<!--<div class="row" style="margin-bottom:5px;">
		<div class="col-md-3">
		<div class="sm-st clearfix">
		<span class="sm-st-icon st-violet"><i class="glyphicon glyphicon-globe"></i></span>
		<div class="sm-st-info">
		<span><?php get_num('country'); ?></span>
		<a href="countries.php">Countries</a>
		</div>
		</div>
		</div>
		<div class="col-md-3">
		<div class="sm-st clearfix">
		<span class="sm-st-icon st-blue"><i class="glyphicon glyphicon-map-marker"></i></span>
		<div class="sm-st-info">
		<span><?php get_num('city'); ?></span>
		<a href="cities.php">Cities</a>
		</div>
		</div>
		</div>
		<div class="col-md-3">
		<div class="sm-st clearfix">
		<span class="sm-st-icon st-green"><i class="glyphicon glyphicon-list-alt"></i></span>
		<div class="sm-st-info">
		<span><?php get_num('cat'); ?></span>
		<a href="cats.php">Categories</a>
		</div>
		</div>
		</div>
		<div class="col-md-3">
		<div class="sm-st clearfix">
		<span class="sm-st-icon st-red"><i class="glyphicon glyphicon-th"></i></span>
		<div class="sm-st-info">
		<span><?php get_num('brands'); ?></span>
		<a href="sub.php">Brands</a>
		</div>
		</div>
		</div>
	</div>
	<!-- row end -->
	<!--<div class="row" style="margin-bottom:5px;">
	<div class="col-md-3">
	<div class="sm-st clearfix">
	<span class="sm-st-icon st-violet"><i class="glyphicon glyphicon-gift"></i></span>
	<div class="sm-st-info">
	<span><?php get_num('products'); ?></span>
	<a href="products.php">Products</a>
	</div>
	</div>
	</div>
	<div class="col-md-3">
	<div class="sm-st clearfix">
	<span class="sm-st-icon st-blue"><i class="fa fa-users"></i></span>
	<div class="sm-st-info">
	<span><?php get_num('customer'); ?></span>
	<a href="customers.php">customers</a>
	</div>
	</div>
	</div>
	<div class="col-md-3">
	<div class="sm-st clearfix">
	<span class="sm-st-icon st-green"><i class="glyphicon glyphicon-shopping-cart"></i></span>
	<div class="sm-st-info">
	<span><?php get_num('sliders'); ?></span>
	<a href="orders.php">Orders</a>
	</div>
	</div>
	</div>
							<div class="col-md-3">
								<div class="sm-st clearfix">
									<span class="sm-st-icon st-red"><i class="glyphicon glyphicon-th-large"></i></span>
									<div class="sm-st-info">
										<span><?php get_num('partners'); ?></span>
										<a href="partners">Partners</a>
									</div>
								</div>
							</div>
						  
						</div>

				   
				  <!-- row end -->
	<!--<div class="row" style="margin-bottom:5px;">
	  <div class="col-md-3">
								<div class="sm-st clearfix">
									<span class="sm-st-icon st-violet"><i class="fa fa-facebook"></i></span>
									<div class="sm-st-info">
										<span><?php get_num('socials'); ?></span>
										<a href="socials.php">Socials</a> 
									</div>
								</div>
							</div>
	 <div class="col-md-3">
	 <div class="sm-st clearfix">
	 <span class="sm-st-icon st-blue"><i class="glyphicon glyphicon-envelope"></i></span>
	 <div class="sm-st-info">
	 <span>1</span>
	<a href="contact.php"> Contact Us</a>
	 </div>
	 </div>
	 </div>
	 <div class="col-md-3">
	<div class="sm-st clearfix">
	<span class="sm-st-icon st-green"><i class="glyphicon glyphicon-lock"></i></span>
	<div class="sm-st-info">
	<span><?php get_num('admin'); ?></span>
	<a href="admins.php">Admins</a>
	</div>
	</div>
	</div>


	

	</div>
<!-- row end -->
                </section><!-- /.content -->
                <?php include"includes/footer.php"; ?>