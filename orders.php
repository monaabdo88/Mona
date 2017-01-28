<?php include"includes/header.php";?>
<script>
function order_status_func(order_status,order_id){
	xmlhttp = new XMLHttpRequest();
         if(order_status == '0'){
             order_status = '1';
         }
         else{
            order_status = '0';
        }
				xmlhttp.onreadystatechange = function (){
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
						document.getElementById('get_item_data_list').innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open('GET', 'order_list_process.php?order_status='+order_status+'&order_id='+order_id, true);
				xmlhttp.send();
				window.location = "orders.php";
			}


   
</script>
<div class="wrapper row-offcanvas row-offcanvas-left">
<aside class="left-side sidebar-offcanvas">
<!-- sidebar: style can be found in sidebar.less -->
<?php include"includes/sidebar.php"; 
if(!in_array('Orders',$admin_pages))
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
			<header class="panel-heading">Orders</header>
			<div class="panel-body">
			<div class="clearfix"></div>
   
       <div id="get_item_data_list">
       <table id="example" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
        <thead class="text-center">
            <tr class="info">
                <th>S.NO</th>
                <th>Customer Name</th>
                <th>Customer Email</th>
                <th>Customer Contact</th>
                <th>Delivery Address</th>
                <th>Transform Number</th>
                <th>Order Number</th>
                <th>Date</th>
                <th>Total</th>
				<?php if($admin_edit == 1 || $admin_id == 1){ ?>
                <th>Status</th>
				<?php } ?>
            </tr>
        </thead>
		<tfoot>
            <tr>
			    <th>S.NO</th>
                <th>Customer Name</th>
                <th>Customer Email</th>
                <th>Customer Contact</th>
                <th>Delivery Address</th>
                <th>Transform Number</th>
                <th>Order Number</th>
                <th>Date</th>
                <th>Total</th>
                <?php if($admin_edit == 1 || $admin_id == 1){ ?>
                <th>Status</th>
				<?php } ?>
            </tr>
        </tfoot>

        <tbody>		
		 <?php 
            $order_sql = "SELECT * FROM orders o JOIN payments p ON o.ref = p.product_id JOIN customer c ON o.c_id = c.user_id";
			$run_orders = mysqli_query($conn,$order_sql);
			$c = 1;
			while($rows = mysqli_fetch_assoc($run_orders)){
			if($rows['status'] == '0'){
			$class ="btn-warning";
			$btn_value = "in Progress";
			}
			else{
			$class ="btn-success";
			$btn_value = "Sent";
			}
			$customer_id = $rows['user_id'];
			$or = $rows['order_id'];
			$or_ref= $rows['ref'];

                echo'<tr id="'.$rows['order_id'].'">
                <td>'.$c.'</td>
                <td width="8%">'.$rows['user_name'].'</td>
                <td>'.$rows['user_mail'].'</td>
                <td>'.$rows['user_contact'].'</td>
                <td>'.$rows['user_address'].'</td>
                <td>'.$rows['trx_id'].'</td>
                <td><a href="" data-toggle="modal" data-target="#chk_out'.$rows['order_id'].'" data-backdrop="static" data-keyboard="false">'.$rows['product_id'].'</a>
				<div class="modal fade" id="chk_out'.$rows['order_id'].'">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
													<thead>
													<th>S.no</th>
													<th>Item</th>
													<th>Qty</th>
													<th class="text-right">Price</th>
													<th class="text-right">Sub Total</th>
													</thead>
													<tbody>';
													$chk_sql = "SELECT * FROM cart c JOIN products i ON c.p_id = i.product_id WHERE c.chk_ref = '$rows[ref]'";
													$run_chk_sql = mysqli_query($conn,$chk_sql);
													$c = 1;
													$total = 0;
													$delivery = 0;
													$total_qty = 0;
													while($chk_rows = mysqli_fetch_assoc($run_chk_sql)){
														if($chk_rows['product_title'] == ''){
															$title = "Sorry Product Had been deleted";
														}
														else{
															$title = ucwords($chk_rows['product_title']);
														}
														$chk_price = $chk_rows['price'];
														$sub_total = $chk_rows['quantity'] * $chk_price;
														$sub_total = $chk_rows['quantity'] * $chk_price;
														$total+=$sub_total;
														$delivery += $chk_rows['product_delivery'];
														$total_qty += $chk_rows['quantity'];
														echo'<tr>
														<td>'.$c.'</td>
														<td>'.$title.'</td>
														<td>'.$chk_rows['quantity'].'</td>
														<td class="text-right">'.$chk_price.'</td>
														<td class="text-right">'.$sub_total.'</td>
														</tr>';
														$c++;
														}
														$grand_total = $total + $delivery;
														echo'</tbody></table>
														<table class="table">
														<thead>
														<tr>
														<th class="text-center" colspan="3">Order Summary</th>
														</tr>
														</thead>
														<tbody>
														<tr>
														<td>Subtotal</td>
														<td class="text-right"><b>'.@$total.'</b></td>
														</tr>
														<tr>
														<td>Delivery Charges</td>
														<td class="text-right"><b>'.@$delivery.'</b></td>
														</tr>
														<tr>
														<td>Grand Total</td>
														<td class="text-right"><b>'.@$grand_total.'</b></td>
														</tr>
														</tbody>
														</table>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                    </div>
                
                </div>
				</td>
                <td>'.$rows['order_date'].'</td>
                <td>'.$rows['price'].'</td>';
				if($admin_edit == 1 || $admin_id == 1)
                echo'<td><button onclick="order_status_func('.$rows['status'].','.$rows['order_id'].')" class="btn '.$class.' btn-sm btn-block">'.$btn_value.'</button></td>';
                
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
 