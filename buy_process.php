<?php 
require "functions/functions.php";
$ip = getIp();
cart();
//get_total_price();
if(isset($_REQUEST['del_id'])){
    $del_sql = "delete from cart where id = '$_REQUEST[del_id]'";
    $run_del = mysqli_query($conn,$del_sql);
}
if(isset($_REQUEST['chk_qty']) && isset($_REQUEST['chk_id'])){
    $up_sql = "update cart set quantity= '$_REQUEST[chk_qty]' where id = '$_REQUEST[chk_id]'";
    $run_up = mysqli_query($conn,$up_sql);
}
if(isset($_REQUEST['submit_form'])){
    $name = mysqli_real_escape_string($conn,strip_tags($_REQUEST['name']));
    $email = mysqli_real_escape_string($conn,strip_tags($_REQUEST['email']));
    $contact = mysqli_real_escape_string($conn,strip_tags($_REQUEST['number']));
    $state = mysqli_real_escape_string($conn,strip_tags($_REQUEST['states']));
    $delivery = mysqli_real_escape_string($conn,strip_tags($_REQUEST['notes']));
    $order_sql = "insert into orders (order_name,order_email,order_contact_number,order_state,order_delivery_address,order_checkout_ref,order_total)
    values ('$name','$email','$contact','$state','$delivery','$_SESSION[ref]','$_SESSION[grand_total]')
    ";
    $run_order = mysqli_query($conn,$order_sql);
    session_destroy();
}
if(!isset($_SESSION['user_name'])){
    echo'<div class="alert alert-danger lead text-center">You Must Login to complate your order</div>';
}
?>
<table class="table table-responsive">
						<thead>
							<tr>
								<th>S.no</th>
                                <th>Image</th>
								<th>Product</th>
								<th>Delivery Cost</th>
								<th>qty</th>
								<th class="text-left">Price</th>
								<th class="text-left">Total</th>
								<th width="5%">Delete</th>
							</tr>
						</thead>
						<tbody id="">
<?php
        $select_chk = "select * from cart c join products p on c.p_id = p.product_id where chk_ref = '$_SESSION[ref]'";
        $run_select = mysqli_query($conn,$select_chk);
        $c = 1;
        $total = 0;
        $delivery = 0;
        $total_qty = 0;
        while($rows = mysqli_fetch_assoc($run_select)){
        $chk_price = $rows['product_price'] - $rows['product_discount'];
        $id = $rows['id'];
		$pro_id = array($rows['product_id']);
        $sub_total = $rows['quantity'] * $chk_price;
        $total+=$sub_total;
        $delivery += $rows['product_delivery'];
        $total_qty += $rows['product_qty'];
        echo'<tr>
		<td>'.$c.'</td>
        <td width="10%"><img src="'.$rows['product_image'].'" class="img-responsive thumbnail"/></td>
		<td style="vertical-align: middle;"><a href="details.php?id='.$rows['product_id'].'"><b>'.$rows['product_title'].'</b></a></td>
        <td style="vertical-align: middle;">'.$rows['product_delivery'].'</td>
        <td style="vertical-align: middle;"><input type="number" name="chk_qty" class="form-control" min="1" max="'.$rows['product_qty'].'" onblur="up_chk_qty(this.value,'.$id.')" value="'.abs($rows['quantity']).'" /></td>
        <td class="text-left" style="vertical-align: middle;"><b>'.$chk_price.'</b></td>
        <td class="text-left" style="vertical-align: middle;"><b>'.abs($sub_total).'</b></td>
		<td style="vertical-align: middle;"><button class="btn btn-danger btn-sm" onclick="delete_func('.$id.')">Delete</button></td>
        </tr>';
        $c++;
        }
        $grand_total = $total + $delivery;
        $_SESSION['grand_total'] = $grand_total;

        ?>	
</tbody>
</table>
					
        <table class="table">
						<thead>
							<tr>
								<th class="text-center" colspan="3">Order Summary</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Subtotal</td>
								<td class="text-right"><b><?php echo @$total; ?></b></td>
							</tr>
							<tr>
								<td>Delivery Charges</td>
								<td class="text-right"><b><?php echo @$delivery; ?></b></td>
							</tr>
							<tr>
								<td>Grand Total</td>
								<td class="text-right"><b><?php echo @$grand_total; ?></b></td>
							</tr>
						</tbody>
					</table>
					<p class="text-right"> 
				<!--<button <?php if($total_qty > 1 && isset($_SESSION['user_name'])) echo'class="btn btn-success"'; else echo'class="btn btn-warning disabled"';?> data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">Proceed Button</button>-->
				<?php if($total_qty > 1 && isset($_SESSION['user_name'])): ?>
				<form style="float:right;" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
					<input type="hidden" name="cmd" value="_cart">
					<input type="hidden" name="upload" value="1">
				   
				  <!-- Identify your business so that you can collect the payments. -->
				  <input type="hidden" name="business" value="Businessshope@shope.com">

				  <!-- Specify a Buy Now button. -->
				   <!-- Specify details about the item that buyers will purchase. -->
				  <?php 
				  $c = 1;
				  $select_chk = "select * from cart c join products p on c.p_id = p.product_id where chk_ref = '$_SESSION[ref]'";
                  $run_select = mysqli_query($conn,$select_chk);
                  while($rows = mysqli_fetch_assoc($run_select)){
				  $chk_price = $rows['product_price'] - $rows['product_discount'];
                  $delivery_charge = $rows['product_delivery'];
                  echo'<input type="hidden" name="item_name_'.$c.'" value="'.$rows['product_title'].'">
				  <input type="hidden" name="item_number_'.$c.'" value="'.$rows['product_id'].'" />
				  <input type="hidden" name="quantity_'.$c.'" value="'.$rows['quantity'].'">
				  <input type="hidden" name="shipping_'.$c.'" value="'.$rows['product_delivery'].'">

				  <input type="hidden" name="amount_'.$c.'" value="'.$chk_price.'">
				  ';
				  $c++;
				  }; 
				  ?>
				  <input type="hidden" name="currency_code" value="USD">
				  <input type="hidden" name="return" value="https://weza-store.000webhostapp.com/index.php?success=yes">
				  <input type="hidden" name="cancel_return" value="https://weza-store.000webhostapp.com/index.php?success=no">

				  <!-- Display the payment button. -->
				  <input type="image" name="submit" border="0"
				  src="https://woocommerce.com/wp-content/uploads/2016/04/PayPal-Express@2x.png"
				  alt="Buy Now" width="130" height="40">
				  <img alt="" border="0" width="1" height="1"
				  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

				</form>
				<?php endif; ?>
			</p>