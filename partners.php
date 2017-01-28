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
            text: "Are you sure that you want to Remove this Partner?", 
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "Yes, Remove it!",
            confirmButtonColor: "#ec6c62"
        }, function() {
        $.ajax(
            {
                type: "get",
                url: "partners.php",
                data: "del_id="+$t+"&tblname=partners&row_name=partner_id",
                success: function(data){		
				//document.getElementById("get_processed_data").innerHTML = xmlhttp.responseText; 
                $('tr#'+$t).remove(); 
				}
                }
            )
            .done(function(data) {
                swal("Canceled!", "Partner was successfully canceled!", "success");
                        //$('#orders-history').load(document.URL +  ' #orders-history');
                })
                .error(function(data) {
                    swal("Oops", "We couldn't connect to the server!", "error");
                });

				xmlhttp.open('GET', 'partners.php?del_id='+$t+'&tblname=partners&row_name=partner_id', true);
				xmlhttp.send();
			});
            });
});

 
</script>
<div class="wrapper row-offcanvas row-offcanvas-left">
<aside class="left-side sidebar-offcanvas">
<!-- sidebar: style can be found in sidebar.less -->
<?php include"includes/sidebar.php"; 
if(!in_array('Partners',$admin_pages))
echo '<script>window.open("index.php","_self")</script>';
?>
<!-- /.sidebar -->
</aside>
<aside class="right-side">
<!-- Main content -->
<section class="content">
<?php 
if(isset($_REQUEST['del_id'])){
	$del_sql = "delete from partners where partner_id = '$_REQUEST[del_id]'";
    $run_del = mysqli_query($conn,$del_sql);
}
$msg = '';
if(isset($_POST['save'])){
	for($i=0;$i<count($_FILES["img"]["name"]);$i++)
            {
				$title = mysqli_real_escape_string($conn,strip_tags($_POST['title']));
				$url = mysqli_real_escape_string($conn,$_POST['url']);
                $file_name = rand(0,9999).'_'.time().'_'.$_FILES['img']['name'][$i];
				$path_folder = "../templates/images/partners/".$file_name;
				$img = "templates/images/partners/".$file_name;
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
					$sql = "insert into partners (partner_title,partner_url,partner_img) values ('$title','$url','$img')";
					$run_sql = mysqli_query($conn,$sql);
					if($run_sql){
						$msg = '<div class=\"col-md-6 col-md-offset-3\">
						<div class="alert alert-success text-center lead" id="suc">Add New Partner Done Successfully</div></div>
						';
					}
                }
			    }
                
            }
if(isset($_POST['edit'])){
	$title = mysqli_real_escape_string($conn,strip_tags($_POST['title']));
	$url = mysqli_real_escape_string($conn,$_POST['url']);
	$partner_id = $_POST['partner_id'];
    if($_FILES['img']['name']){
        $file_name = rand(0,9999).'_'.time().'_'.$_FILES['img']['name'];
        $path_folder = "../templates/images/partners/".$file_name;
        $img = "templates/images/partners/".$file_name;
        $file_type = pathinfo($file_name,PATHINFO_EXTENSION);
        if($_FILES['img']['size'] > 2000000){
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
            move_uploaded_file($_FILES['img']['tmp_name'],$path_folder);
        }
        }else{
            $img_confirm = 1;
            $sql_img = "select * from partners where partner_id = '$partner_id'";
            $run_sql_img = mysqli_query($conn,$sql_img);
            while($row_img = mysqli_fetch_assoc($run_sql_img)){
                $img = $row_img['partner_img'];
            }
        }
        if($img_confirm == 1){		
		$sql_edit = "update partners set partner_title = '$title',partner_url = '$url' , partner_img = '$img' where partner_id = '$partner_id'";
		$run_edit = mysqli_query($conn,$sql_edit);
		if($run_edit){
			$msg = '<div class=\"col-md-6 col-md-offset-3\">
						<div class="alert alert-success text-center lead" id="suc">Update Data Done Successfully</div></div>
						';
		}
		}
}
echo $msg;
?>
<div class="row">
	<div class="col-md-12">
		<section class="panel tasks-widget">
			<header class="panel-heading">partners</header>
			<div class="panel-body" id="get_processed_data">
			<?php if($admin_add == 1 || $admin_id == 1){ ?>
			<button data-toggle="modal" data-target="#add_new" data-backdrop="static" data-keyboard="false" style="margin-bottom:10px;" class="btn btn-success btn-addon btn-sm"><i class="fa fa-plus"></i>
            Add New Partner</button>
			<?php } ?>
			<div class="clearfix"></div>
            <?php if($admin_add == 1 || $admin_id == 1){ ?>
			<!------------------ add New Partner form ------------------------>
			<div id="add_new" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add New Partner</h4>
				  </div>
				  <div class="modal-body">
					<form  action="" method="post" role="form" enctype="multipart/form-data" >
									<div class="form-group">
										<input type="text" name="title" tabindex="1" class="form-control" placeholder="Partner title" value="">
									</div>
									<div id="view_image">
										<div class="row">
										
										</div>
									</div>
									<div class="form-group">
                                        
										<input type="file" id="upload_file" onchange="preview_image();" required name="img[]" multiple tabindex="2" class="form-control">
									</div>
									<div class="form-group">
										<input type="text" name="url" tabindex="1" class="form-control" placeholder="Partner Webiste Link" value="">
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="save" tabindex="4" class="form-control btn btn-success" value="Add New Partner">
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
			<!------------------end add new Partner form --------------------->
		    <?php }; ?>
<table id="example" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
        <thead>
            <tr>
			    <th>S.No</th>
			    <th>Image</th>
                <th>Title</th>
                <th>Website Link</th>
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
			    <th>Image</th>
                <th>Title</th>
                <th>Website Link</th>
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
			$Partner = "select * from partners";
			$run_Partner = mysqli_query($conn,$Partner);
			while($row = mysqli_fetch_array($run_Partner)){
				echo'
				<tr id="'.$row['partner_id'].'">
				    <td>'.$c.'</td>
					<td style="width:25%;"><img src="../'.$row['partner_img'].'" class="img-responsive thumbnail" /></td>
					<td>'.$row['partner_title'].'</td>
					<td>'.$row['partner_url'].'</td>';
					if($admin_edit == 1 || $admin_id == 1)
					echo'<td><button data-toggle="modal" data-target="#edit_'.$row['partner_id'].'" data-backdrop="static" data-keyboard="false"  class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button></td>';
				    if($admin_remove == 1 || $admin_id == 1)
					echo'<td><a href="javascript:;" title="Delete" id="del" rel="'.$row['partner_id'].'" class="btn btn-default btn-xs"><i class="fa fa-times"></i></button></td>';
				echo'</tr>';
				if($admin_edit == 1 || $admin_id == 1){
				echo'<!------------------Edit Partner --------------------------------->
			<div id="edit_'.$row['partner_id'].'" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit Partner</h4>
				  </div>
				  <div class="modal-body">
					<form  action="" method="post" role="form" enctype="multipart/form-data" >
									<div class="form-group">
										<input type="text" name="title" tabindex="1" class="form-control" value="'.$row['partner_title'].'">
									</div>
									<div>
										<div class="row">
										   <img src="../'.$row['partner_img'].'" id="view2"  class="img-responsive thumbnail"/>
										</div>
									</div>
									<div class="form-group">
                                        
										<input type="file" name="img" id="img2" tabindex="2" class="form-control">
									</div>
									
									<div class="form-group">
										<input type="text" name="url" tabindex="1" class="form-control" value="'.$row['partner_url'].'">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
											    <input type="hidden" name="partner_id" value="'.$row['partner_id'].'" />
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
		
			<!---------------end edit Partner -------------------------------->

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