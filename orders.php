<table style="display: none;" class="table table-striped table-responsive" id="orders-form">
									<thead class="text-center">
										
									</thead>
									<tbody>
										<?php 
										$order_sql = "SELECT * FROM orders o JOIN payments p ON o.ref = p.product_id WHERE o.c_id = '$customer_id'";
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
											$or = $rows['order_id'];
											$or_ref= $rows['ref'];
											echo'
											<tr>
											<td colspan="2" style="background:0;">
											<div class="panel panel-warning">
											<div class="panel-heading">
												<h4 class="panel-title text-center text-warning">
													<a href="#chk_out'.$rows['order_id'].'"  data-toggle="collapse" data-parent="#accordion">Order '.$c.'</a>
												</h4>
											</div>';
                                            $orders_sql = "SELECT * FROM orders o JOIN payments p ON o.ref = p.product_id WHERE o.c_id = '$customer_id'";
										$runs_orders = mysqli_query($conn,$orders_sql);
										while($rowss = mysqli_fetch_assoc($runs_orders)){									
										echo'<div class="panel-collapse collapse" id="chk_out'.$rows['order_id'].'">
												<div class="panel-body">
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
													$k = 1;
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
														<td>'.$k.'</td>
														<td>'.$title.'</td>
														<td>'.$chk_rows['quantity'].'</td>
														<td class="text-right">'.$chk_price.'</td>
														<td class="text-right">'.$sub_total.'</td>
														</tr>';
														$k++;
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
												</div>'; 
											}
											echo'</div></td>
											</tr>
											
											<tr>
											<td>Transform Number</td>
											<td>'.$rows['trx_id'].'</td>
											</tr>
											<tr>
											<td>Order Number</td>
											<td>'.$rows['ref'].'</td>
											</tr>
											<tr>
											<td>Total Payment</td>
											<td>'.$rows['price'].' '.$rows['currency'].'</td> 
											</tr>
											<tr>
											<td>Order Status</td>
											<td class="text-center"><span class="btn '.$class.' btn-sm btn-block">'.$btn_value.'</span>
											</td>
											</tr>
											<tr>
											<td>Order Date</td>
											<td>
											'.$rows['order_date'].'
											</td>
											</tr>
											';
											$c++;
									   
									   }

										?>
									</tbody>
								</table>