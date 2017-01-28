<?php include"includes/header.php"; ?>
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
            text: "Are you sure that you want to Remove this City?", 
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "Yes, Remove it!",
            confirmButtonColor: "#ec6c62"
        }, function() {
        $.ajax(
            {
                type: "get",
                url: "cities.php",
                data: "del_id="+$t+"&tblname=city&row_name=city_id",
                success: function(data){		
				//document.getElementById("get_processed_data").innerHTML = xmlhttp.responseText; 
                $('tr#'+$t).remove(); 
				}
                }
            )
            .done(function(data) {
                swal("Canceled!", "City was successfully canceled!", "success");
                        //$('#orders-history').load(document.URL +  ' #orders-history');
                })
                .error(function(data) {
                    swal("Oops", "We couldn't connect to the server!", "error");
                });

				xmlhttp.open('GET', 'cities.php?del_id='+$t+'&tblname=city&row_name=city_id', true);
				xmlhttp.send();
			});
            });
});

 
</script>
<div class="wrapper row-offcanvas row-offcanvas-left">
<aside class="left-side sidebar-offcanvas">
<!-- sidebar: style can be found in sidebar.less -->
<?php include"includes/sidebar.php"; 
if(!in_array('Cities',$admin_pages))
echo '<script>window.open("index.php","_self")</script>';
?>
<!-- /.sidebar -->
</aside>
<aside class="right-side">
<!-- Main content -->
<section class="content">
<?php 
if(isset($_REQUEST['del_id'])){
	$del_city = "delete from city where city_id = '$_REQUEST[del_id]'";
	$run_city = mysqli_query($conn,$del_city);
}
$msg = '';
if(isset($_POST['save'])){
	            $title = mysqli_real_escape_string($conn,strip_tags($_POST['title']));
				$country_id = mysqli_real_escape_string($conn,strip_tags($_POST['country']));
				$sql = "insert into city (city_title,country_id) values ('$title','$country_id')";
					$run_sql = mysqli_query($conn,$sql);
					if($run_sql){
						$msg = '<div class=\"col-md-6 col-md-offset-3\">
						<div class="alert alert-success text-center lead" id="suc">Add New City Done Successfully</div></div>
						';
					}
                
			    
                
            }
if(isset($_POST['edit'])){
	$title = mysqli_real_escape_string($conn,strip_tags($_POST['title']));
	$country_id = mysqli_real_escape_string($conn,strip_tags($_POST['country']));
	$city_id = $_POST['city_id'];	
		$sql_edit = "update city set city_title = '$title',country_id = '$country_id' where city_id = '$city_id'";
		$run_edit = mysqli_query($conn,$sql_edit);
		if($run_edit){
			$msg = '<div class=\"col-md-6 col-md-offset-3\">
						<div class="alert alert-success text-center lead" id="suc">Update Data Done Successfully</div></div>
						';
		}
		}

echo $msg;
?>
<div class="row">
	<div class="col-md-12">
		<section class="panel tasks-widget">
			<header class="panel-heading">Cities</header>
			<div class="panel-body">
			<?php if($admin_add == 1 || $admin_id == 1){ ?>
			<button data-toggle="modal" data-target="#add_new" data-backdrop="static" data-keyboard="false" style="margin-bottom:10px;" class="btn btn-success btn-addon btn-sm"><i class="fa fa-plus"></i>
            Add New City</button>
			<?php } ?>
			<div class="clearfix"></div>
			<?php if($admin_add == 1 || $admin_id == 1){ ?>
			<!------------------ add New City form ------------------------>
			<div id="add_new" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add New City</h4>
				  </div>
				  <div class="modal-body">
					<form  action="" method="post" role="form">
									<div class="form-group">
										<input type="text" name="title" tabindex="1" class="form-control" placeholder="City Name" value="">
									</div>
									<div class="form-group">
										<select name="country" required="" class="form-control country">
                                        <option selected=\"true\" disabled=\"disabled\" value=''>Select Country</option>
										    <?php get_all_country(); ?>
										</select>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="save" tabindex="4" class="form-control btn btn-success" value="Add New City">
											</div>
											 
										</div>
										
									</div>
								</form>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>

			  </div>
			</div>
			<!------------------end add new City form --------------------->
			<?php } ?>
		<table id="example" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
        <thead>
            <tr>
			    <th>S.No</th>
				<th>Country Name</th>
			    <th>City Name</th>
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
			    <th>S.No</th>
			    <th>Country Name</th>
			    <th>City Name</th>
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
			$c = 1;
			$City = "select * from city c join country c2 where c.country_id = c2.country_id";
			$run_City = mysqli_query($conn,$City);
			while($row = mysqli_fetch_array($run_City)){
				echo'
				<tr id="'.$row['city_id'].'">
				    <td>'.$c.'</td>
					<td>'.$row['country_title'].'</td>
					<td>'.$row['city_title'].'</td>
					';
					if($admin_edit == 1 || $admin_id == 1)
					echo'<td><button data-toggle="modal" data-target="#edit_'.$row['city_id'].'" data-backdrop="static" data-keyboard="false"  class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button></td>';
					if($admin_remove == 1 || $admin_id == 1)
					echo'<td><a href="javascript:;" title="Delete" id="del" rel="'.$row['city_id'].'" class="btn btn-default btn-xs"><i class="fa fa-times"></i></a></td>';
					
				echo'</tr>';
				if($admin_edit == 1 || $admin_id == 1){
				echo'<!------------------Edit City --------------------------------->
				<div id="edit_'.$row['city_id'].'" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit City</h4>
				  </div>
				  <div class="modal-body">
					<form  action="" method="post" role="form">
									<div class="form-group">
										<input type="text" name="title" tabindex="1" class="form-control" value="'.$row['city_title'].'">
									</div>
							        <div class="form-group">
									<select name="country" required="" class="form-control country">
                                
										    ';
											get_all_country($row['country_id']);
										echo'</select>
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
											    <input type="hidden" name="city_id" value="'.$row['city_id'].'" />
												<input type="submit" name="edit" tabindex="4" class="form-control btn btn-success" value="Save Changes">
											</div>
											 
										</div>
										
									</div>
								</form>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>

			  </div>
			</div>
		
			<!---------------end edit City -------------------------------->

				';
				}
				$c++;
			}
			?>
        </tbody>
    </table>
	
            </div>

		</section>
	</div>
</div>
</section><!-- /.content -->
<?php include"includes/footer.php"; ?>