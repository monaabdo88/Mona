<?php include"includes/header.php";?>
<script>
$(document).ready(function() {

	$("#del").live('click',function(){
	var $t=$(this).attr('rel');
		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function (){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			$('tr#'+$t).remove(); 
		}
		}
        swal({
            title: "Are you sure?", 
            text: "Are you sure that you want to Remove this Product?", 
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "Yes, Remove it!",
            confirmButtonColor: "#ec6c62"
        }, function() {
        $.ajax(
            {
                type: "get",
                url: "products.php",
                data: "del_id="+$t+"&tblname=products&row_name=product_id",
                success: function(data){		
				//document.getElementById("get_processed_data").innerHTML = xmlhttp.responseText; 
                $('tr#'+$t).remove(); 
				}
                }
            )
            .done(function(data) {
                swal("Canceled!", "Product was successfully canceled!", "success");
                        //$('#orders-history').load(document.URL +  ' #orders-history');
                })
                .error(function(data) {
                    swal("Oops", "We couldn't connect to the server!", "error");
                });

				xmlhttp.open('GET', 'products.php?del_id='+$t+'&tblname=products&row_name=product_id', true);
				xmlhttp.send();
			});
            });
			////////////////delete image //////////////////////////
			$("#del_image").live('click',function(){
	       var $t=$(this).attr('rel');
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function (){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				$('div#'+$t).remove(); 
			}
			}
        swal({
            title: "Are you sure?", 
            text: "Are you sure that you want to Remove this image?", 
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "Yes, Remove it!",
            confirmButtonColor: "#ec6c62"
        }, function() {
        $.ajax(
            {
                type: "get",
                url: "products.php",
                data: "del_img="+$t+"&tblname=images&row_name=img_id",
                success: function(data){		
				//document.getElementById("get_processed_data").innerHTML = xmlhttp.responseText; 
                $('tr#'+$t).remove(); 
				}
                }
            )
            .done(function(data) {
                swal("Canceled!", "Image was successfully canceled!", "success");
                        //$('#orders-history').load(document.URL +  ' #orders-history');
                })
                .error(function(data) {
                    swal("Oops", "We couldn't connect to the server!", "error");
                });

				xmlhttp.open('GET', 'products.php?del_img='+$t+'&tblname=images&row_name=img_id', true);
				xmlhttp.send();
			});
            });
});

 
</script> 
<?php
if(isset($_REQUEST['del_id'])){
	$del_images = "delete from images where type = products and pro_id = '$_REQUEST[del_id]'";
	$run_images_del = mysqli_query($conn,$del_images);
	$del_sql = "delete from products where product_id = '$_REQUEST[del_id]'";
    $run_del = mysqli_query($conn,$del_sql);
}
if(isset($_REQUEST['del_img'])){
	$del_images = "delete from images where img_id = '$_REQUEST[del_img]'";
	$run_images_del = mysqli_query($conn,$del_images);
	
}
$msg = '';
//////////////////Add New Product //////////////////////////
if(isset($_POST['item_submit'])){
    
    $title = mysqli_real_escape_string($conn,strip_tags($_POST['title']));
    $disc = mysqli_real_escape_string($conn,$_POST['disc']);
    $qty = mysqli_real_escape_string($conn,strip_tags($_POST['qty']));
    $price = mysqli_real_escape_string($conn,strip_tags($_POST['price']));
    $discount = mysqli_real_escape_string($conn,strip_tags($_POST['discount']));
    $dept = mysqli_real_escape_string($conn,strip_tags($_POST['category']));
    $sub = mysqli_real_escape_string($conn,strip_tags(@$_POST['brand']));
    $delivery = mysqli_real_escape_string($conn,strip_tags($_POST['delivery']));
    $key = mysqli_real_escape_string($conn,$_POST['keyword']);
    if(isset($_FILES['image']['name'])){
        $file_name = rand(0,9999).'_'.time().'_'.$_FILES['image']['name'];
        $path_folder = "../templates/images/products/".$file_name;
        $img = "templates/images/products/".$file_name;
        $img_confirm = 1;
        $file_type = pathinfo($file_name,PATHINFO_EXTENSION);
        if($_FILES['image']['size'] > 200000){
            $msg = "<div class='alert alert-danger' id='danger'>Sorry Image size must be less than 2 MB Try Again</div>";
            $img_confirm = 0;
        }
        if($file_type != 'jpg' && $file_type != 'png' && $file_type != 'JPEG' && $file_type != 'gif'){
            $msg = "<div class='alert alert-danger' id='danger'>
            Sorry Image must be JPG or GIF or Png Try Again</div>";
            $img_confirm = 0;
        }
        if($img_confirm == 0){
            
        }
        else{
          if(move_uploaded_file($_FILES['image']['tmp_name'],$path_folder)){
              $pro_insert_sql ="insert into products (product_title,product_disc,product_price,product_keywords	,product_discount,product_delivery,product_cat,product_brand,product_image,product_qty) 
              values ('$title','$disc','$price','$key','$discount','$delivery','$dept','$sub','$img','$qty')";
              $run_insert = mysqli_query($conn,$pro_insert_sql);
              if($run_insert){
                $msg = '<div class="alert alert-success" id="suc">Product Added Successfully</div>';
              }
          }
            //header("Location:".$_SERVER['REQUEST_URI']);
        }
    }
	$last = "select * from products order by product_id desc limit 1";
	$run_last = mysqli_query($conn,$last);
	while($row_last = mysqli_fetch_array($run_last)){
		$last_id = $row_last['product_id'];
	}
	for($i=0;$i<count($_FILES["img"]["name"]);$i++)
            {
				$type = 'products';
				$pro_id = $last_id;
				$file_name = rand(0,9999).'_'.time().'_'.$_FILES['img']['name'][$i];
				$path_folder = "../templates/images/products/".$file_name;
				$img = "templates/images/products/".$file_name;
				$img_confirm = 1;
				$file_type = pathinfo($file_name,PATHINFO_EXTENSION);
				if($_FILES['img']['size'][$i] > 2000000){
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
				if($img_confirm != 0){
					move_uploaded_file($_FILES['img']['tmp_name'][$i],$path_folder);
					$sql = "insert into images (type,pro_id,image) values ('$type','$pro_id','$img')";
					$run_sql = mysqli_query($conn,$sql);
					
                }
			    }
}
///////////////////edit values //////////////////////////////
if(isset($_POST['edit'])){
    
    $title = mysqli_real_escape_string($conn,strip_tags($_POST['title']));
    $disc = mysqli_real_escape_string($conn,$_POST['disc']);
    $qty = mysqli_real_escape_string($conn,strip_tags($_POST['qty']));
    $price = mysqli_real_escape_string($conn,strip_tags($_POST['price']));
    $discount = mysqli_real_escape_string($conn,strip_tags($_POST['discount']));
    $dept = mysqli_real_escape_string($conn,strip_tags($_POST['category']));
    $sub = mysqli_real_escape_string($conn,strip_tags(@$_POST['brand']));
    $delivery = mysqli_real_escape_string($conn,strip_tags($_POST['delivery']));
    $key = mysqli_real_escape_string($conn,$_POST['keyword']);
    $pro_id = $_POST['edit_id'];
	if($_FILES['image']['name']){
        $file_name = rand(0,9999).'_'.time().'_'.$_FILES['image']['name'];
        $path_folder = "../templates/images/products/".$file_name;
        $img = "templates/images/products/".$file_name;
        $file_type = pathinfo($file_name,PATHINFO_EXTENSION);
        if($_FILES['image']['size'] > 2000000){
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
            move_uploaded_file($_FILES['image']['tmp_name'],$path_folder);
        }
        }else{
			$img_confirm = 1;
            $sql_img = "select * from products where product_id = '$pro_id'";
            $run_sql_img = mysqli_query($conn,$sql_img);
            while($row_img = mysqli_fetch_assoc($run_sql_img)){
                $img = $row_img['product_image'];
            }
		}
		if($img_confirm == 1){
			$sql_edit = "update products set 
			product_title = '$title' ,product_disc = '$disc', 
            product_image = '$img', product_cat = '$dept',
            product_brand = '$sub',product_price = '$price',
            product_discount = '$discount', product_keywords = '$key',
            product_delivery = '$delivery', product_qty = '$qty'		
			where product_id = '$pro_id'";
			$run_edit = mysqli_query($conn,$sql_edit);
			if($run_edit){
			$msg = '<div class=\"col-md-6 col-md-offset-3\">
						<div class="alert alert-success text-center lead" id="suc">Update Data Done Successfully</div></div>
						';
		}
		}
	
	for($i=0;$i<count($_FILES["img"]["name"]);$i++)
            {
				if($_FILES['img']['name'][$i]){
				$type = 'products';
				$pro_id = $_POST['edit_id'];
				$file_name = rand(0,9999).'_'.time().'_'.$_FILES['img']['name'][$i];
				$path_folder = "../templates/images/products/".$file_name;
				$image = "templates/images/products/".$file_name;
				$img_confirm = 1;
				$file_type = pathinfo($file_name,PATHINFO_EXTENSION);
				if($_FILES['img']['size'][$i] > 2000000){
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
				if($img_confirm != 0){
					move_uploaded_file($_FILES['img']['tmp_name'][$i],$path_folder);
					$sql = "insert into images (type,pro_id,image) values ('$type','$pro_id','$image')";
					$run_sql = mysqli_query($conn,$sql);
					
                }
				}
			    }
}

?>

<div class="wrapper row-offcanvas row-offcanvas-left">
<aside class="left-side sidebar-offcanvas">
<!-- sidebar: style can be found in sidebar.less -->
<?php include"includes/sidebar.php";
if(!in_array('Products',$admin_pages))
echo '<script>window.open("index.php","_self")</script>';
?>
<!-- /.sidebar -->
</aside>
<aside class="right-side">
<!-- Main content -->
<section class="content">

<?php echo $msg; ?>
<div class="row">
	<div class="col-md-12">
		<section class="panel tasks-widget">
			<header class="panel-heading">Products</header>
			<div class="panel-body">
    <?php if($admin_add == 1 || $admin_id == 1){ ?>
   <button class="btn btn-success" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#add_new">
   <i class="fa fa-plus" aria-hidden="true"></i>
	Add New Product</button>
	<?php } ?>
   <div class="clearfix"></div>
   <?php if($admin_add == 1 || $admin_id == 1){ ?>
   <!---------------- Add New Product Modal -------------------------------->
   <div id="add_new" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Product</h4>
      </div>
      <div class="modal-body">
       <form method="post" enctype="multipart/form-data" id="add_new_form">
       <div class="group">
			<label>Product Title</label>
			<input type="text" id="title" name="title" required="" class="form-control">
		</div>
        <div class="form-group">
		<label>Product Main Image</label>
            <img class="img-responsive thumbnail" id="view" />
			<input type="file" name="image" id="img" tabindex="2" class="form-control">
		</div>
		<div class="form-group">
		<label>Product Images</label>
            <div id="view_image">
				<div class="row">
										
				</div>
			</div>
			<input type="file" id="upload_file" onchange="preview_image();" name="img[]" multiple tabindex="2" class="form-control">
		</div>
		<div class="group">
			<label>Product Category</label>
			<select id="category" name="category" class="form-control cat" required="">
            <option value="" selected="" disabled="">Select Category</option>
			    <?php
                $cats_sql = "select * from cat";
                $run_cats = mysqli_query($conn,$cats_sql);
                while($rows = mysqli_fetch_assoc($run_cats)){
                    $cat_name = $rows['cat_title'];
                   
                    echo'<option value="'.$rows['cat_id'].'">'.ucwords($rows['cat_title']).'</option>';
                }
                ?>
			    
			</select>
		</div>
		<div class="group">
			<label>Product Brand</label>
			<select id="sub" name="brand" required class="form-control">
			
			</select>
		</div>
		<div class="group">
			<label>Price</label>
			<input type="number" id="price" name="price" class="form-control">
		</div>
		<div class="group">
			<label>Discount</label>
			<input type="number" id="discount" name="discount" class="form-control">
		</div>
		<div class="group">
			<label>Quantity</label>
			<input type="number" id="qty" name="qty" class="form-control">
		</div>
		<div class="group">
			<label>Delivery</label>
			<input type="text" id="delivery" name="delivery" class="form-control">
		</div>
		<div class="group">
			<label>Discription</label>
			<textarea class="form-control" name="disc" id="disc"></textarea>
		</div>
		<div class="group">
			<label>Product Keywords</label>
			<textarea class="form-control" name="keyword" id="keyword"></textarea>
		</div>
		<div class="group">
			<label></label>
			<input type="submit" name="item_submit" class="btn btn-success btn-lg btn-block" value="Submit">
		</div>
     </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!------------------------ end add new product ---------------------------->
   <?php }; ?>
   <br>
    <div id="get_item_data_list">
       <table id="example" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
        <thead class="text-center">
            <tr class="info">
                <th>S.NO</th>
                <th>Image</th>
                <th>Title</th>
                <th>Discription</th>
                <th>Price</th>
                <th>Discount</th>
                <th>QTY</th>
                <th>Delivery</th>
                <th>Category</th>
                <th>Sub Category</th>
                <?php if($admin_edit == 1 || $admin_id == 1){ ?>
                <th>Edit</th>
				<?php }
				if($admin_remove == 1 || $admin_id == 1){
				?>
                <th>Delete</th>
				<?php }; ?>
            </tr>
        </thead>
		<tfoot>
            <tr>
			    <th>S.NO</th>
                <th>Image</th>
                <th>Title</th>
                <th>Discription</th>
                <th>Price</th>
                <th>Discount</th>
                <th>QTY</th>
                <th>Delivery</th>
                <th>Category</th>
                <th>Sub Category</th>
                <?php if($admin_edit == 1 || $admin_id == 1){ ?>
                <th>Edit</th>
				<?php }
				if($admin_remove == 1 || $admin_id == 1){
				?>
                <th>Delete</th>
				<?php }; ?>
            </tr>
        </tfoot>
        <tbody>
            <?php 
            $items_sql =  "SELECT * FROM products p JOIN cat c ON p.product_cat = c.cat_id order by p.product_id desc";
            $run_items = mysqli_query($conn,$items_sql);
            $c = 1;
            while($rows = mysqli_fetch_assoc($run_items)){
				
                echo'<tr id="'.$rows['product_id'].'">
                <td>'.$c.'</td>
                <td width="8%"><img class="img-responsive thumbnail" src="../'.$rows['product_image'].'" /></td>
                <td>'.$rows['product_title'].'</td>
                <td>'.substr(strip_tags($rows['product_disc']),0,50).' ....</td>
                <td>'.$rows['product_price'].'</td>
                <td>'.$rows['product_discount'].'</td>
                <td>'.$rows['product_qty'].'</td>
                <td>'.$rows['product_delivery'].'</td>
                <td>';
				if($rows['cat_title']) echo $rows['cat_title'];
				echo'</td>
                <td>';
				if(isset($rows['product_brand'])){
				$brands = "select * from brands where brand_id = '$rows[product_brand]'";
				$run_brands = mysqli_query($conn,$brands);
				while($row_brand = mysqli_fetch_array($run_brands)){
					echo $row_brand['brand_title'];
				}
				}
				echo'</td>';
				if($admin_edit == 1 || $admin_id == 1)
                echo'<td><button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit_item'.$rows['product_id'].'"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>';
                if($admin_remove== 1 || $admin_id == 1)
               echo '<td><a href="javascript:;" title="Delete" id="del" rel="'.$rows['product_id'].'" class="btn btn-danger btn-xs" ><i class="fa fa-times" aria-hidden="true"></i></a>
                </td>';
				echo'
               </tr>';
			   if($admin_edit == 1 || $admin_id == 1){
			   echo'<!--------------------------------- edit prodcut --------------------------->
			   <div id="edit_item'.$rows['product_id'].'" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit '.ucwords($rows['product_title']).'</h4>
                      </div>
                      <div class="modal-body">
                       <form method="post" enctype="multipart/form-data" id="add_new_form">
					   <div class="group">
							<label>Product Title</label>
							<input type="text" id="title" name="title" required="" value="'.$rows['product_title'].'" class="form-control">
						</div>
						<div class="form-group">
						<label>Product Main Image</label>
							<img class="img-responsive thumbnail" id="view2" src="../'.$rows['product_image'].'" style="width:50%;height:75%;" />
							
							<input type="file" name="image" id="img2" tabindex="2" class="form-control">
						</div>
						<div class="form-group">
						<label>Product Images</label>
							<div id="view_image2">
								<div class="row">';
									$images = "SELECT * FROM images WHERE pro_id = '$rows[product_id]' AND type = 'products'";
									$run_images = mysqli_query($conn,$images);
									while($row_img = mysqli_fetch_array($run_images)){
										echo'<div id="'.$row_img['img_id'].'" class="col-md-4">
										<img class="img-responsive thumbnail"  src="../'.$row_img['image'].'" />
										<a href="javascript:;" style="position: absolute;top:10px;left:30px" title="Delete" id="del_image" rel="'.$row_img['img_id'].'" class="btn btn-danger btn-xs" ><i class="fa fa-times" aria-hidden="true"></i></a>
											</div>';
									}
								echo'</div>
							</div>
							<input type="file" id="upload_file2" onchange="preview_image2();" name="img[]" multiple tabindex="2" class="form-control">
						</div>
						<div class="group">
							<label>Product Category</label>
							<select id="category2" name="category" class="form-control cat" required="">
							<option value="" selected="" disabled="">Select Category</option>
								';
								$cats_sql = "select * from cat";
								$run_cats = mysqli_query($conn,$cats_sql);
								while($rows_cat = mysqli_fetch_assoc($run_cats)){
									$cat_name = $rows_cat['cat_title'];
								    if($rows['cat_id'] == $rows_cat['cat_id'])
										$selected = 'selected';
									else
										$selected = '';
									echo'<option '.$selected.' value="'.$rows['cat_id'].'">'.ucwords($rows_cat['cat_title']).'</option>';
								}
								echo'
								
							</select>
						</div>
						<div class="group">
							<label>Product Brand</label>
							<select id="sub2" name="brand" required class="form-control">
								';
								get_brand($rows['product_brand'],$rows['product_cat']);
							echo '</select>
						</div>
						<div class="group">
							<label>Price</label>
							<input type="number" id="price" name="price" value="'.$rows['product_price'].'" class="form-control">
						</div>
						<div class="group">
							<label>Discount</label>
							<input type="number" id="discount" name="discount" value="'.$rows['product_discount'].'" class="form-control">
						</div>
						<div class="group">
							<label>Quantity</label>
							<input type="number" id="qty" name="qty" value="'.$rows['product_qty'].'" class="form-control">
						</div>
						<div class="group">
							<label>Delivery</label>
							<input type="text" id="delivery" name="delivery" value="'.$rows['product_delivery'].'" class="form-control">
						</div>
						<div class="group">
							<label>Discription</label>
							<textarea class="form-control" name="disc" id="disc">'.$rows['product_disc'].'</textarea>
						</div>
						<div class="group">
							<label>Product Keywords</label>
							<textarea class="form-control" name="keyword" id="keyword">'.$rows['product_keywords'].'</textarea>
						</div>
						<div class="group">
							<label></label>
							<input type="hidden" name="edit_id" value="'.$rows['product_id'].'" />
							<input type="submit" name="edit" class="btn btn-success btn-lg btn-block" value="Submit">
						</div>
					 </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                
                  </div>
                </div>
                <!----------------------------------- end edit product --------------------->
			   ';
			}
                $c++;
           
           }
            ?>
        </tbody>
    </table>
 
    </div>
</div>
</div>
</div>
<?php
include "includes/footer.php";
?>
 