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
            text: "Are you sure that you want to Remove this Country?", 
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "Yes, Remove it!",
            confirmButtonColor: "#ec6c62"
        }, function() {
        $.ajax(
            {
                type: "get",
                url: "countries.php",
                data: "del_id="+$t+"&tblname=country&row_name=country_id",
                success: function(data){		
				//document.getElementById("get_processed_data").innerHTML = xmlhttp.responseText; 
                $('tr#'+$t).remove(); 
				}
                }
            )
            .done(function(data) {
                swal("Canceled!", "Country was successfully canceled!", "success");
                        //$('#orders-history').load(document.URL +  ' #orders-history');
                })
                .error(function(data) {
                    swal("Oops", "We couldn't connect to the server!", "error");
                });

				xmlhttp.open('GET', 'countries.php?del_id='+$t+'&tblname=country&row_name=country_id', true);
				xmlhttp.send();
			});
            });
});

 
</script>
<div class="wrapper row-offcanvas row-offcanvas-left">
<aside class="left-side sidebar-offcanvas">
<!-- sidebar: style can be found in sidebar.less -->
<?php include"includes/sidebar.php"; 
if(!in_array('Countries',$admin_pages))
echo '<script>window.open("index.php","_self")</script>';
?>
<!-- /.sidebar -->
</aside>
<aside class="right-side">
<!-- Main content -->
<section class="content">
<?php 
if(isset($_REQUEST['del_id'])){
	$del_city = "delete from city where country_id = '$_REQUEST[del_id]'";
	$run_city = mysqli_query($conn,$del_city);
	$del_sql = "delete from country where country_id = '$_REQUEST[del_id]'";
    $run_del = mysqli_query($conn,$del_sql);
}
$msg = '';
if(isset($_POST['save'])){
	            $title = mysqli_real_escape_string($conn,strip_tags($_POST['title']));
				$sql = "insert into country (country_title) values ('$title')";
					$run_sql = mysqli_query($conn,$sql);
					if($run_sql){
						$msg = '<div class=\"col-md-6 col-md-offset-3\">
						<div class="alert alert-success text-center lead" id="suc">Add New Country Done Successfully</div></div>
						';
					}
                
			    
                
            }
if(isset($_POST['edit'])){
	$title = mysqli_real_escape_string($conn,strip_tags($_POST['title']));
	$country_id = $_POST['country_id'];	
		$sql_edit = "update country set country_title = '$title' where country_id = '$country_id'";
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
			<header class="panel-heading">Countries</header>
			<div class="panel-body">
			<?php if($admin_add == 1 || $admin_id == 1){ ?>
			<button data-toggle="modal" data-target="#add_new" data-backdrop="static" data-keyboard="false" style="margin-bottom:10px;" class="btn btn-success btn-addon btn-sm"><i class="fa fa-plus"></i>
            Add New Country</button>
			<?php } ?>
			<div class="clearfix"></div>
			<!------------------ add New Country form ------------------------>
			<?php if($admin_add == 1 || $admin_id == 1){ ?>
			<div id="add_new" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add New Country</h4>
				  </div>
				  <div class="modal-body">
					<form  action="" method="post" role="form">
									<div class="form-group">
										<input type="text" name="title" tabindex="1" class="form-control" placeholder="Country Name" value="">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="save" tabindex="4" class="form-control btn btn-success" value="Add New Country">
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
			<?php }; ?>
			<!------------------end add new Country form --------------------->
		<table id="example" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
        <thead>
            <tr>
			    <th>S.No</th>
			    <th>Country</th>
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
			    <th>Country</th>
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
			$Country = "select * from country";
			$run_Country = mysqli_query($conn,$Country);
			while($row = mysqli_fetch_array($run_Country)){
				echo'
				<tr id="'.$row['country_id'].'">
				    <td>'.$c.'</td>
					<td>'.$row['country_title'].'</td>';
					if($admin_edit == 1 || $admin_id == 1)
					echo '<td><button data-toggle="modal" data-target="#edit_'.$row['country_id'].'" data-backdrop="static" data-keyboard="false"  class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button></td>';
					if($admin_remove == 1 || $admin_id == 1)
					echo'<td><a href="javascript:;" title="Delete" id="del" rel="'.$row['country_id'].'" class="btn btn-default btn-xs"><i class="fa fa-times"></i></button></td>';
					
				echo'</tr>';
				if($admin_edit == 1 || $admin_id == 1){
				echo '<!------------------Edit Country --------------------------------->
				<div id="edit_'.$row['country_id'].'" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit Country</h4>
				  </div>
				  <div class="modal-body">
					<form  action="" method="post" role="form">
									<div class="form-group">
										<input type="text" name="title" tabindex="1" class="form-control" value="'.$row['country_title'].'">
									</div>
									
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
											    <input type="hidden" name="country_id" value="'.$row['country_id'].'" />
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
		
			<!---------------end edit Country -------------------------------->

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