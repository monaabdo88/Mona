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
            text: "Are you sure that you want to Remove this User?", 
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "Yes, Remove it!",
            confirmButtonColor: "#ec6c62"
        }, function() {
        $.ajax(
            {
                type: "get",
                url: "customers.php",
                data: "del_id="+$t+"&tblname=customer&row_name=user_id",
                success: function(data){		
				//document.getElementById("get_processed_data").innerHTML = xmlhttp.responseText; 
                $('tr#'+$t).remove(); 
				}
                }
            )
            .done(function(data) {
                swal("Canceled!", "User was successfully canceled!", "success");
                        //$('#orders-history').load(document.URL +  ' #orders-history');
                })
                .error(function(data) {
                    swal("Oops", "We couldn't connect to the server!", "error");
                });

				xmlhttp.open('GET', 'customers.php?del_id='+$t+'&tblname=customer&row_name=user_id', true);
				xmlhttp.send();
			});
            });
			
		
});
/////////////user status ////////////////////////////
function order_status_func(order_status,order_id){
	xmlhttp = new XMLHttpRequest();
         if(order_status == 1){
             order_status = 0;
         }
         else{
            order_status = 1;
        }
				
				xmlhttp.open('GET', 'customers.php?order_status='+order_status+'&order_id='+order_id, true);
				xmlhttp.send();
				
        window.location = "customers.php";
        
}
</script> 
<?php 
if(isset($_REQUEST['del_id'])){
	$del_images = "delete from cart where user_id = '$_REQUEST[del_id]'";
	$run_images_del = mysqli_query($conn,$del_images);
	$del_sql = "delete from customer where user_id = '$_REQUEST[del_id]'";
    $run_del = mysqli_query($conn,$del_sql);
}
if(isset($_REQUEST['order_status'])){
    $order_sql = "update customer set user_status = '$_REQUEST[order_status]' where user_id = '$_REQUEST[order_id]'";
    $run_order = mysqli_query($conn,$order_sql);
}
?>
<div class="wrapper row-offcanvas row-offcanvas-left">
<aside class="left-side sidebar-offcanvas">
<!-- sidebar: style can be found in sidebar.less -->
<?php include"includes/sidebar.php"; 
if(!in_array('Customers',$admin_pages))
echo '<script>window.open("index.php","_self")</script>';
?>
<!-- /.sidebar -->
</aside>
<aside class="right-side">
<!-- Main content -->
<section class="content">
<div class="row">
	<div class="col-md-12">
		<section class="panel tasks-widget">
			<header class="panel-heading">Customers</header>
			<div class="panel-body">
			<div class="clearfix"></div>
   
       <div id="get_item_data_list">
       <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
         <thead class="text-center">
            <tr class="info">
                <th>S.NO</th>
                <th>Image</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Country</th>
                <th>City</th>
                <th>Contact Details</th>
                <th>Address</th>
                <th>Orders</th>
                <?php if($admin_edit == 1 || $admin_id == 1){ ?>
                <th>Status</th>
                <?php }
				if($admin_remove == 1 || $admin_id == 1){ ?>
                <th>Delete</th>
				<?php  } ?>
            </tr>
        </thead>
		<tfoot>
            <tr>
			    <th>S.NO</th>
                <th>Image</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Country</th>
                <th>City</th>
                <th>Contact Details</th>
                <th>Address</th>
                <th>Orders</th>
				<?php if($admin_edit == 1 || $admin_id == 1){ ?>
                <th>Status</th>
                <?php }
				if($admin_remove == 1 || $admin_id == 1){ ?>
                <th>Delete</th>
				<?php  } ?>
            </tr>
        </tfoot>
        <tbody>
		<?php
		$items_sql =  "SELECT * FROM customer ";
            $run_items = mysqli_query($conn,$items_sql);
            $c = 1;
            while($rows = mysqli_fetch_assoc($run_items)){
				if($rows['user_img'] != ''){
					$img = $rows['user_img'];
				}
				else{
					$img = "templates/images/user.png";
				}
				if($rows['user_status'] == 0){
                    $class ="btn-warning";
                    $btn_value = "Not Active";
                }
                else{
                    $class ="btn-success";
                    $btn_value = "Active";
                }
                echo'<tr id="'.$rows['user_id'].'">
                <td>'.$c.'</td>
                <td><img style="width:128px;height:100px;" class="img-responsive thumbnail" src="../'.$img.'" /></td>
                <td>'.$rows['user_name'].'</td>
                <td>'.$rows['user_mail'].'</td>
                ';
				$Country = "select * from country where country_id = '$rows[user_country]'";
				$run_Country = mysqli_query($conn,$Country);
				while($row = mysqli_fetch_array($run_Country)){
					echo'<td>'.$row['country_title'].'</td>';
			    }
				$City = "select * from city where city_id = '$rows[user_city]'";
				$run_City = mysqli_query($conn,$City);
				while($row_city = mysqli_fetch_array($run_City)){
					echo'<td>'.$row_city['city_title'].'</td>';
			    }
				echo'
                <td>'.$rows['user_contact'].'</td>
                <td>'.$rows['user_address'].'</td>
                <td>';
				$orders = "select * from orders where c_id = '$rows[user_id]'";
				$run_orders = mysqli_query($conn,$orders);
				$count = mysqli_num_rows($run_orders);
				echo $count;
				echo'</td>';
				if($admin_edit == 1 || $admin_id == 1)
                echo'<td><button onclick="order_status_func('.$rows['user_status'].','.$rows['user_id'].')" class="btn '.$class.' btn-sm btn-block">'.$btn_value.'</button></td>';
				if($admin_remove == 1 || $admin_id == 1)
                echo '<td><a href="javascript:;" title="Delete" id="del" rel="'.$rows['user_id'].'" class="btn btn-danger btn-xs" ><i class="fa fa-times" aria-hidden="true"></i></a></td>';
               echo'</tr>
			   
			   ';
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
 