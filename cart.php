<?php 
include 'includes/header.php'; 
if(isset($_GET['chk_item_id'])){
    $date = date("Y:m:d h:i:s");
    $rand_num = mt_rand();
    if(isset($_SESSION['ref'])){
        
    }else{
        $_SESSION['ref'] = $date.'-'.$rand_num;    
    }
    $chk_sql ="insert into checkout (chk_item,chk_ref,chk_timing,chk_qty) values ('$_GET[chk_item_id]','$_SESSION[ref]','$date','1')";
    if($run_sql = mysqli_query($conn,$chk_sql)){
        echo'<script>
        window.location = "buy.php";
        </script>';
    }
}
?>
<script>
// Ajaxify the whole data from the process_ajax.php
			function ajax_func(){
			
				xmlhttp = new XMLHttpRequest();
				
				xmlhttp.onreadystatechange = function (){
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
						document.getElementById('get_processed_data').innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open('GET', 'buy_process.php', true);
				xmlhttp.send();
			}
    // Inserting data to the database
			function submit_form(){
				
				var user_form = document.getElementById('user_form');
				
				var username = document.getElementById('name').value,
					email = document.getElementById('email').value,
					contactnumber = document.getElementById('number').value,
					states = document.getElementById('states').value,
					notes = document.getElementById('address').value;
				
					//Ajax Processing from here
					
					xmlhttp.onreadystatechange = function (){
						if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
							document.getElementById('get_processed_data').innerHTML = xmlhttp.responseText;
						}
					}
					
					xmlhttp.open('GET', 'buy_process.php?submit_form=yes&name='+username+'&email='+email+'&number='+contactnumber+'&states='+states+'&notes='+notes, true);
					xmlhttp.send();
                    // Ajax Ending
					swal({
                          title: "Success Message",
                          text: "Your Order Had Been Submited Successfully.",
                          timer: 2000,
                          showConfirmButton: false
                        },
                            function(){
                            setTimeout(function(){
                            location.reload();
                        }, 1000);});
                        //ending modal
					   $('#myModal').modal('hide');	
					   user_form.reset();	
        				return false;
                
			}
			
    // Deleting data from the database
			
			function delete_func(del_id){
				
				xmlhttp.onreadystatechange = function (){
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
						document.getElementById("get_processed_data").innerHTML = xmlhttp.responseText;
					}
				}
                 swal({
                      title: "Are you sure?", 
                      text: "Are you sure that you want to Remove this order?", 
                      type: "warning",
                      showCancelButton: true,
                      closeOnConfirm: false,
                      confirmButtonText: "Yes, Remove it!",
                      confirmButtonColor: "#ec6c62"
                    }, function() {
                        $.ajax(
                                {
                                    type: "get",
                                    url: "buy_process.php",
                                    data: "del_id="+del_id,
                                    success: function(data){
                                    }
                                }
                        )
                      .done(function(data) {
                        //swal("Canceled!", "Your order was successfully canceled!", "success");
                        //$('#orders-history').load(document.URL +  ' #orders-history');
						swal({
                          title: "Success Message",
                          text: "The order had been remove successfully",
                          timer: 2000,
                          showConfirmButton: false
                        },
                            function(){
                            setTimeout(function(){
                            location.reload();
                        }, 1000);});
                      })
                      .error(function(data) {
                        swal("Oops", "We couldn't connect to the server!", "error");
                      });

				xmlhttp.open('GET', 'buy_process.php?del_id='+del_id, true);
				xmlhttp.send();
			});
            }
   //update qty
        function up_chk_qty(chk_qty,chk_id){
            xmlhttp.onreadystatechange = function (){
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
						document.getElementById("get_processed_data").innerHTML = xmlhttp.responseText;
					}
				}
					xmlhttp.open('GET', 'buy_process.php?chk_qty='+chk_qty+'&chk_id='+chk_id, true);
					xmlhttp.send();
        }
 
</script>
   
    <body onload="ajax_func();">
    <?php include"includes/menu.php"; ?>
		<div class="container">
			<div class="page-header">
				<h2 class="text-left">Checkout</h2>
				<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
       <form onsubmit="return submit_form();" id="user_form">
        <div class="group">
			<label>Name</label>
			<input type="text" id="name" name="order_name" required="" class="form-control">
		</div>
		<div class="group">
			<label>Email Address</label>
			<input type="email" id="email" name="order_email" required="" class="form-control">
		</div>
		<div class="group">
			<label>Contact Number</label>
			<input type="number" id="number" name="order_contact" class="form-control">
		</div>
		<div class="group">
			<label>States</label>
			<input list="state" id="states" name="order_states" class="form-control">
			<datalist id="state">
			    <option>EGYPT</option>
			    <option>KSA</option>
			    <option>USA</option>
			    <option>UK</option>
			    <option>INDIA</option>
			    <option>SPAIN</option>
			    <option>ITALy</option>
			    <option>UAE</option>
			    <option>FRANCE</option>
			</datalist>
		</div>
		<div class="group">
			<label>Delivery Address</label>
			<textarea class="form-control" name="order_delivery" id="address"></textarea>
		</div>
		<div class="group">
			<label></label>
			<input type="submit" name="order_submit" class="btn btn-danger btn-lg btn-block" value="Submit">
		</div>
     </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading">Order Detail</div>
				<div class="panel-body" id="get_processed_data">
					
				</div>
			</div>
			
		</div>
		<br><br><br><br><br>
</body>
		<?php include 'includes/footer.php'; ?>