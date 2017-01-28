<section class="sidebar">

					<?php $activePage = basename($_SERVER['PHP_SELF'], ".php");?>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
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
					if($activePage == basename($page_sub_url, ".php")){
						$class="active";
					}
					else{
						$class = '';
					}
					echo '<li class="'.$class.'" ><a href="'.$page_sub_url.'">'.$page_icon.' '.$page_title.' </a></li>';
				}
				echo'<li><a href="logout.php"><i class="glyphicon glyphicon-off"></i>Logout</a></li>';
			
		?>
		
        </ul>
        </section>