<?php 
include "includes/header.php"; 
include"includes/menu.php";
?>
<section class=content>
<div class="container">
<div class="row">
				<ol class="breadcrumb home">
					<li><a href="index.php">Home</a></li>
					<?php
                    if(isset($_GET['id'])){
                        $product_sql = "SELECT * FROM products p JOIN cat c ON p.product_cat = c.cat_id JOIN brands b ON p.product_brand = b.brand_id  WHERE p.product_id = '$_GET[id]'";
                        $run_product = mysqli_query($conn,$product_sql);
                        while($rows = mysqli_fetch_assoc($run_product)){
                            $qty = $rows['product_qty'];
                            $price = $rows['product_price'];
                            $item_id = $rows['product_id'];
							$disc = $rows['product_disc'];
							$title = $rows['product_title'];
							$view = $rows['view'];
							//$view++;
                            	$query = " UPDATE products SET view = view + 1 WHERE product_id = '{$item_id}'";
								$run_query = mysqli_query($conn,$query);
								// execute query, etc
							
                            echo'<li><a href="cat.php?cat_id='.$rows['product_cat'].'">'.ucwords($rows['cat_title']).'</a></li>';
                            if(isset($rows['product_brand']) && $rows['product_brand'] != ''){
                            echo'<li><a href="brand.php?brand_id='.$rows['product_brand'].'">'.ucwords($rows['brand_title']).'</a></li>'; }   
                            echo'<li class="active" style="background:none;">'.ucwords($rows['product_title']).'</li>';
					?>
				</ol>
			</div>
</div>
<div class="container home">
			
			<div class="row">
			<?php
                
                    echo'<div class="col-md-8" id="'.$rows['product_id'].'">
				<h3 class="pp-title">'.$rows['product_title'].'</h3>
   
      <section>
        <div id="slider" class="flexslider" style="max-width:380px;max-height:583px;margin:0 auto">
          <ul class="slides">
            <li>
  	    	    <img style="max-width:380px;max-height:583px;margin:0 auto;" src="'.$rows['product_image'].'" />
  	    		</li>';
             $images = "select * from images where pro_id = '$rows[product_id]' and type = 'products'";
             $run_images = mysqli_query($conn,$images);
             while($row_images = mysqli_fetch_array($run_images)){
                echo'<li><img src="'.$row_images['image'].'" class="image-responsive"/></li>';
             }   
  	    	
        echo'  </ul>
        </div>';
        $images = "select * from images where pro_id = '$rows[product_id]' and type = 'products'";
        $run_images = mysqli_query($conn,$images);
        if(mysqli_num_rows($run_images) > 0){
        echo'
        <div id="carousel" class="flexslider">
          <ul class="slides">
            <li style="border:5px solid #ccc; margin:0 5px 0">
  	    	    <img src="'.$rows['product_image'].'" />
  	    		</li>
  	    	';
             
             while($row_images = mysqli_fetch_array($run_images)){
                echo'<li style="border:5px solid #ccc; margin:0 5px"><img src="'.$row_images['image'].'" /></li>';
             }   
  	    	
        echo' 
          </ul>
        </div>';
        }
        echo'
      </section>
      
			</div>';
                            $dept_id = $rows['product_cat'];
                            $sub_id = $rows['product_brand'];
                            $delivery = $rows['product_delivery'];
                            if($rows['product_discount'] != 0){
                                $after_discount = $rows['product_price'] - $rows['product_discount'];
                            }
                            else{
                                $after_discount = $rows['product_price'];
                            }
                }
                }
            ?>
		
			<aside class="col-md-4">
			
				<br>
				<ul class="list-group">
				<li class="list-group-item">
						<div class="row">
                        	<?php if($qty > 1){ ?>
							<div class="col-md-3">
                            <input style="height: 50px;" type="number" id="<?php echo $item_id;?>_qty" class="form-control" min="1" max="<?php echo $rows['product_qty']; ?>" value="1" />
                            </div>
							<div class="col-md-9">
            				<input type="button" onClick = "cart(<?php echo $item_id; ?>);" class="btn btn-success btn-lg btn-block" value="Buy"/>
                            <input type="hidden" id="<?php echo $item_id; ?>_name" value="<?php echo $item_id; ?>">
                             <input type="hidden" id="<?php echo $item_id; ?>_qty" value="1">
                             <input type="hidden" id="<?php echo $item_id; ?>_price" value="<?php echo $after_discount; ?>">
            				<?php }else{ ?>
                            <div class="col-md-12">
            				<a href="#" class="btn btn-warning btn-lg btn-block disabled">Sorry, Sold Out</a>
                            </div>
            				<?php }; ?></div>
						</div>
					</li>
                	<li class="list-group-item">
						<div class="row">
							<div class="col-md-3"><i class="fa fa-usd fa-2x"></i></div>
							<div class="col-md-9"><?php echo $after_discount; ?> $</div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<div class="col-md-3"><i class="fa fa-truck fa-2x"></i></div>
							<div class="col-md-9">Delivered in 5 days Devliery Cost <?php echo $delivery; ?> $</div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<div class="col-md-3"><i class="fa fa-refresh fa-2x"></i></div>
							<div class="col-md-9">Easy return in 7 days</div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<div class="col-md-3"><i class="fa fa-phone fa-2x"></i></div>
							<div class="col-md-9">Call at 123456789</div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<div class="col-md-12"><h5 class="lead">Details & Care</h5><?php echo $disc; ?></div>
						</div>
					</li>
					<li class="list-group-item">
						<div class="row">
							<div class="col-md-12"><h5 class="lead share-head">Rateing</h5>
								<div class='movie_choice'>
								<div id="<?php echo $item_id; ?>" class="rate_widget">
									<div class="star_1 ratings_stars"></div>
									<div class="star_2 ratings_stars"></div>
									<div class="star_3 ratings_stars"></div>
									<div class="star_4 ratings_stars"></div>
									<div class="star_5 ratings_stars"></div>
									<div class="total_votes">vote data</div><br />
								</div>
							</div>
							</div>
						</div>
					</li>
                    <li class="list-group-item">
						<div class="row">
							<div class="col-md-12"><h5 class="lead share-head">Share Product</h5>
								<ul class="list-unstyled share">
									<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://weza-store.000webhostapp.com/details.php?id=<?php echo $item_id; ?>"><img src="templates/img/facebook.png" /></a></li>
									<li><a target="_blank" href="https://twitter.com/home?status=https://weza-store.000webhostapp.com/details.php?id=<?php echo $item_id; ?>"><img src="templates/img/twitter.png" /></a></li>
									<li><a target="_blank" href="https://plus.google.com/share?url=https://weza-store.000webhostapp.com/details.php?id=<?php echo $item_id ?>"><img src="templates/img/google.png" /></a></li>
									<li><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=https://weza-store.000webhostapp.com/details.php?id=<?php echo $item_id ?>&title=<?php echo $title; ?>&summary=&source="><img src="templates/img/linked.png" /></a></li>
								</ul>
							</div>
						</div>
					</li>
					
				</ul>
			</aside>
			</div>
			<div class="page-header">
				<h2>Related Items</h2>
			</div>
			<section class="row">
				<?php 
                    $related_sql = "SELECT * FROM `products` WHERE product_id != '$_GET[id]' AND product_cat = '$dept_id' AND product_brand = '$sub_id' ORDER BY RAND() LIMIT 4 ";
                    
                    $run_related = mysqli_query($conn,$related_sql);
                    while($rows_re = mysqli_fetch_assoc($run_related)){
                    $discount_price = $rows_re['product_price'] - $rows_re['product_discount'];
                    $item_title = str_replace(' ','-',$rows_re['product_title']);
                    $dept_id = $rows_re['product_cat'];
                    if(isset($rows_re['product_brand'])){
                        $slug = $rows_re['product_brand'];
                    }
                    $pro_image = $rows_re['product_image'];
                    $pro_price = $rows_re['product_price'];
                    $pro_id = $rows_re['product_id'];
                    echo'
                      <div class="col-md-3 col-sm-6">
                        <div class=pro>
                        <img src="'.$pro_image.'" width=338 height=331 />
                        <h5><a href="details.php?id='.$pro_id.'">'.$item_title.'</a></h5>
                        <div class=\'movie_choice\'>
								<div id="'.$pro_id.'" class="rate_widget">
									<div class="star_1 ratings_stars"></div>
									<div class="star_2 ratings_stars"></div>
									<div class="star_3 ratings_stars"></div>
									<div class="star_4 ratings_stars"></div>
									<div class="star_5 ratings_stars"></div>
									</div>
							</div>
                        <ul class="list-unstyled sale">
                        <li><i class="fa fa-usd"></i>'.$pro_price.'</li>
                        <li><a href="index.php?pro_id='.$pro_id.'"><button class="btn btn-primary">ADD TO CART</button></a></li>
                        </ul>
                        </div>
                        </div>';
                    }
               
                ?>
			</section>
</div>
</section>
<?php include "includes/footer.php"; ?>