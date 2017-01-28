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
            text: "Are you sure that you want to Remove this Category?", 
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "Yes, Remove it!",
            confirmButtonColor: "#ec6c62"
        }, function() {
        $.ajax(
            {
                type: "get",
                url: "cats.php",
                data: "del_id="+$t+"&tblname=cat&row_name=cat_id",
                success: function(data){		
				//document.getElementById("get_processed_data").innerHTML = xmlhttp.responseText; 
                $('tr#'+$t).remove(); 
				}
                }
            )
            .done(function(data) {
                swal("Canceled!", "Category was successfully canceled!", "success");
                        //$('#orders-history').load(document.URL +  ' #orders-history');
                })
                .error(function(data) {
                    swal("Oops", "We couldn't connect to the server!", "error");
                });

				xmlhttp.open('GET', 'cats.php?del_id='+$t+'&tblname=cat&row_name=cat_id', true);
				xmlhttp.send();
			});
            });
});

 
</script>
<div class="wrapper row-offcanvas row-offcanvas-left">
<aside class="left-side sidebar-offcanvas">
<!-- sidebar: style can be found in sidebar.less -->
<?php include"includes/sidebar.php"; 
if(!in_array('Categories',$admin_pages))
echo '<script>window.open("index.php","_self")</script>';

?>
<!-- /.sidebar -->
</aside>
<aside class="right-side">
<!-- Main content -->
<section class="content">
<?php 
if(isset($_REQUEST['del_id'])){
	$del_Category = "delete from cat where cat_id = '$_REQUEST[del_id]'";
	$run_Category = mysqli_query($conn,$del_Category);
}
$msg = '';
if(isset($_POST['save'])){
	            $title = mysqli_real_escape_string($conn,strip_tags($_POST['title']));
				$sql = "insert into cat (cat_title) values ('$title')";
					$run_sql = mysqli_query($conn,$sql);
					if($run_sql){
						$msg = '<div class=\"col-md-6 col-md-offset-3\">
						<div class="alert alert-success text-center lead" id="suc">Add New Category Done Successfully</div></div>
						';
					}
                
			    
                
            }
if(isset($_POST['edit'])){
	$title = mysqli_real_escape_string($conn,strip_tags($_POST['title']));
	$cat_id = $_POST['cat_id'];	
		$sql_edit = "update cat set cat_title = '$title' where cat_id = '$cat_id'";
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
			<header class="panel-heading">Categories</header>
			<div class="panel-body">
			<?php if($admin_add == 1 || $admin_id == 1){ ?>
			<button data-toggle="modal" data-target="#add_new" data-backdrop="static" data-keyboard="false" style="margin-bottom:10px;" class="btn btn-success btn-addon btn-sm"><i class="fa fa-plus"></i>
            Add New Category</button>
			<?php } ?> 
			<div class="clearfix"></div>
			<?php if($admin_add == 1 || $admin_id == 1){ ?>
			<!------------------ add New Category form ------------------------>
			<div id="add_new" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add New Category</h4>
				  </div>
				  <div class="modal-body">
					<form  action="" method="post" role="form">
									<div class="form-group">
										<input type="text" name="title" tabindex="1" class="form-control" placeholder="Category Name" value="">
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="save" tabindex="4" class="form-control btn btn-success" value="Add New Category">
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
			<!------------------end add new Category form --------------------->
			<?php }; ?>
		<table id="example" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
        <thead>
            <tr>
			    <th>S.No</th>
				<th>Category Name</th>
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
			    <th>Category Name</th>
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
			$Category = "select * from cat";
			$run_Category = mysqli_query($conn,$Category);
			while($row = mysqli_fetch_array($run_Category)){
				echo'
				<tr id="'.$row['cat_id'].'">
				    <td>'.$c.'</td>
					<td>'.$row['cat_title'].'</td>
					';
					if($admin_edit== 1 || $admin_id == 1)
					echo'<td><button data-toggle="modal" data-target="#edit_'.$row['cat_id'].'" data-backdrop="static" data-keyboard="false"  class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button></td>';
				    if($admin_remove == 1 || $admin_id == 1)
					echo'<td><a href="javascript:;" title="Delete" id="del" rel="'.$row['cat_id'].'" class="btn btn-default btn-xs"><i class="fa fa-times"></i></a></td>';
					
				echo'</tr>';
				if($admin_edit == 1 || $admin_id == 1){
				echo'<!------------------Edit Category --------------------------------->
			<div id="edit_'.$row['cat_id'].'" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit Category</h4>
				  </div>
				  <div class="modal-body">
					<form  action="" method="post" role="form">
									<div class="form-group">
										<input type="text" name="title" tabindex="1" class="form-control" value="'.$row['cat_title'].'">
									</div>
							        
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
											    <input type="hidden" name="cat_id" value="'.$row['cat_id'].'" />
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
		
			<!---------------end edit Category -------------------------------->

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