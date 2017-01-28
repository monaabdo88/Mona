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
            text: "Are you sure that you want to Remove this Admin?", 
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: "Yes, Remove it!",
            confirmButtonColor: "#ec6c62"
        }, function() {
        $.ajax(
            {
                type: "get",
                url: "admins.php",
                data: "del_id="+$t+"&tblname=admin&row_name=admin_id",
                success: function(data){		
				//document.getElementById("get_processed_data").innerHTML = xmlhttp.responseText; 
                $('tr#'+$t).remove(); 
				}
                }
            )
            .done(function(data) {
                swal("Canceled!", "Admin was successfully canceled!", "success");
                        //$('#orders-history').load(document.URL +  ' #orders-history');
                })
                .error(function(data) {
                    swal("Oops", "We couldn't connect to the server!", "error");
                });

				xmlhttp.open('GET', 'admins.php?del_id='+$t+'&tblname=admin&row_name=admin_id', true);
				xmlhttp.send();
			});
            });
			
		
});

</script> 
<?php 
if(isset($_REQUEST['del_id'])){
	$del_sql = "delete from admin where admin_id = '$_REQUEST[del_id]'";
    $run_del = mysqli_query($conn,$del_sql);
}
$msg = '';
if(isset($_POST['admin_submit'])){
	$admin_name = mysqli_real_escape_string($conn,strip_tags($_POST['admin_name']));
	$admin_mail = mysqli_real_escape_string($conn,strip_tags($_POST['admin_mail']));
	$admin_pass = mysqli_real_escape_string($conn,strip_tags(md5(sha1($_POST['admin_pass']))));
	$admin_md = mysqli_real_escape_string($conn,strip_tags($_POST['admin_pass']));
	if(isset($_POST['pages']))
	    $pagess = implode(',',$_POST['pages']);
	else
		$pagess = '';

	if(isset($_POST['add']))
		$add = 1;
	else
		$add = 0;
	if(isset($_POST['edit']))
		$edit = 1;
	else
		$edit = 0;
	if(isset($_POST['remove']))
		$remove = 1;
	else
		$remove = 0;
	
	 $sql_username = "select * from admin where admin_name = '$admin_name' or admin_mail = '$admin_mail'";
        $run_sql = mysqli_query($conn,$sql_username);
        if(mysqli_num_rows($run_sql) > 0 ){
            $img_confirm = 0;
            $msg = "<div class=\"col-md-6 col-md-offset-3\">
            <div class='alert alert-danger text-center lead' id='danger'>
            Sorry Admin Name or Admin Email is already taken Please try again</div></div><div class='clearfix'></div>";
            
        }else{
			$insert_sql ="INSERT INTO `admin`(`admin_name`,`admin_pass`,`admin_mail`,`pages`,`add`,`edit`,`remove`,`md_pass`) 
              VALUES ('$admin_name','$admin_pass','$admin_mail','$pagess','$add','$edit','$remove','$admin_md')";
             $msg =  $run_insert = mysqli_query($conn,$insert_sql);
              if($run_insert){
                $msg= '<div class="col-md-6 col-md-offset-3">
                <div class="alert alert-success text-center lead" id="suc">Add New Admin Done Successfully</div></div>
                <div class="clearfix"></div>
                ';
		}
}
}
if(isset($_POST['edit_submit'])){
	$admin_name = mysqli_real_escape_string($conn,strip_tags($_POST['admin_name']));
	$admin_mail = mysqli_real_escape_string($conn,strip_tags($_POST['admin_mail']));
	$admin_pass = mysqli_real_escape_string($conn,strip_tags(md5(sha1($_POST['admin_pass']))));
	$admin_md = mysqli_real_escape_string($conn,strip_tags($_POST['admin_pass']));
	$edit_id = $_POST['edit_id'];
	if(isset($_POST['pages']))
	    $pagess = implode(',',$_POST['pages']);
	else
		$pagess = '';

	if(isset($_POST['add']))
		$add = 1;
	else
		$add = 0;
	if(isset($_POST['edit']))
		$edit = 1;
	else
		$edit = 0;
	if(isset($_POST['remove']))
		$remove = 1;
	else
		$remove = 0;
			$insert_sql ="UPDATE admin SET `admin_name` = '$admin_name',
			`admin_pass` = '$admin_pass',`admin_mail`='$admin_mail',`pages` = '$pagess',
			`add` ='$add',`edit` = '$edit',`remove` = '$remove',`md_pass` = '$admin_md' WHERE `admin_id` = '$edit_id'";
             $msg =  $run_insert = mysqli_query($conn,$insert_sql);
              if($run_insert){
                $msg= '<div class="col-md-6 col-md-offset-3">
                <div class="alert alert-success text-center lead" id="suc">UPDATE Admin Done Successfully</div></div>
                <div class="clearfix"></div>
                ';
		}else{
			$msg = mysqli_error($conn);
		}

}
?>
<div class="wrapper row-offcanvas row-offcanvas-left">
<aside class="left-side sidebar-offcanvas">
<!-- sidebar: style can be found in sidebar.less -->
<?php include"includes/sidebar.php"; 
if(!in_array('Admins',$admin_pages))
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
			<header class="panel-heading">Admins</header>
			<div class="panel-body">
			<?php if($_SESSION['admin_id'] == 1){ ?>
			<button class="btn btn-success" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#add_new">
		    <i class="fa fa-plus" aria-hidden="true"></i>
			Add New Admin</button>
			<?php }; ?>
			<br /><br/>
			<div class="clearfix"></div>
			<?php if($_SESSION['admin_id'] == 1){ ?>
             <!---------------------- Add New Admin Modal ------------------------------>
			 <div id="add_new" class="modal fade" role="dialog">
			<div class="modal-dialog">
			<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add New Admin</h4>
				  </div>
				  <div class="modal-body">
				  
				   <form method="post" action="">
				   <div class="group">
						<label>Admin Name</label>
						<input type="text" name="admin_name" required="" class="form-control">
					</div>
					
					<div class="group">
						<label>Admin Email</label>
						<input type="email" name="admin_mail" class="form-control">
					</div>
					<div class="group">
						<label>Admin Password</label>
						<input type="password" name="admin_pass" class="form-control">
					</div>
					<div class="group"><hr/>
						<label>Admin Privilege</label><hr/>
						<input type="checkbox" name="add" class="g"/> Add<br>
						<input type="checkbox" name="edit" class="g"/> Edit<br>
						<input type="checkbox" name="remove" class="g"/> Delete <br>
						<input type="checkbox" checked name="readonly" id="readonly"/> View<br>
					</div>
					<div class="form-group"><hr/>
					<label class="label-control">Pages</label><hr/>
					<?php
					foreach ($pages as $key=>$value) {
						$page_url = $key;
						$page_sub_url = $pages[$key]['sub_url'];
						$page_title = $pages[$key]['title'];
						
						echo '<input  type="checkbox" name="pages[]" value="'.$page_url.'"
					 class="pages"> '.$page_title.'<br>';
					}
					
					?>
					</div>
					<div class="group">
						<label></label>
						<input type="submit" name="admin_submit" class="btn btn-success btn-lg btn-block" value="Submit">
					</div>
				 </form>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>

			  </div>
			</div>
			 <!----------------------end add new Admin Modal ---------------------------->
			<?php } ?>
		   <div id="get_item_data_list">
		   <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead class="text-center">
            <tr class="info">
                <th>S.NO</th>
                <th>Name</th>
                <th>E-mail</th>
				<th>Edit</th>
                <th>Delete</th>
			
            </tr>
			</thead>
			<tfoot>
            <tr>
			    <th>S.NO</th>
                <th>Name</th>
                <th>E-mail</th>
				<th>Edit</th>
                <th>Delete</th>
				
            </tr>
			</tfoot>
			<tbody>
			<?php
			$items_sql =  "SELECT * FROM admin ";
            $run_items = mysqli_query($conn,$items_sql);
            $c = 1;
            while($rows = mysqli_fetch_assoc($run_items)){
				
                echo'<tr id="'.$rows['admin_id'].'">
                <td>'.$c.'</td>
                <td>'.$rows['admin_name'].'</td>
                <td>'.$rows['admin_mail'].'</td><td>';
                if($_SESSION['admin_id'] == 1 || $rows['admin_id'] !=1){
				echo '<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit_item'.$rows['admin_id'].'"><i class="fa fa-pencil" aria-hidden="true"></i></button>';
				
				echo'</td><td>';
				
				if($_SESSION['admin_id'] != $rows['admin_id'] && $admin_remove ==1 && $rows['admin_id'] != 1)
                echo'<a href="javascript:;" title="Delete" id="del" rel="'.$rows['admin_id'].'" class="btn btn-danger btn-xs" ><i class="fa fa-times" aria-hidden="true"></i></a>';
			    
				echo'</td>';
			    }
				if($admin_id == 1 || $rows['admin_id'] !=1){
					echo' <!---------------------- edit Admin Modal ------------------------------>
			 <div id="edit_item'.$rows['admin_id'].'" class="modal fade" role="dialog">
			<div class="modal-dialog">
			<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add New Admin</h4>
				  </div>
				  <div class="modal-body">
				  
				   <form method="post" action="">
				   <div class="group">
						<label>Admin Name</label>
						<input type="text" name="admin_name" value="'.$rows['admin_name'].'" required="" class="form-control">
						<input type="hidden" name="name2" value="'.$rows['admin_name'].'" />
					</div>
					<div class="group">
						<label>Admin Email</label>
						<input type="email" name="admin_mail" value="'.$rows['admin_mail'].'" class="form-control">
						<input type="hidden" name="mail2" value="'.$rows['admin_mail'].'" />
					</div>
					<div class="group">
						<label>Admin Password</label>
						<input type="password" name="admin_pass" value="'.$rows['md_pass'].'" class="form-control">
					</div>
					<div class="group"><hr/>
						<label>Admin Privilege</label><hr/>
						<input type="checkbox" name="add" class="g"'; if($rows['add']) echo'checked'; echo'/> Add<br>
						<input type="checkbox" name="edit" class="g"'; if($rows['edit']) echo'checked'; echo'/> Edit<br>
						<input type="checkbox" name="remove" class="g"'; if($rows['remove']) echo'checked'; echo'/> Delete <br>
						<input type="checkbox" name="readonly" id="readonly" checked/> View<br>
					</div>
					<div class="form-group"><hr/>
					<label class="label-control">Pages</label><hr/>
					';
					foreach ($pages as $key=>$value) {
						$page_url = $key;
						$page_sub_url = $pages[$key]['sub_url'];
						$page_title = $pages[$key]['title'];
						$adm_pages =explode(',',$rows['pages']);
						if(isset($adm_pages) && in_array($page_url,$adm_pages))
							$checked = 'checked="checked"';
							else
							$checked = '';
        
						echo '<input '.$checked.' type="checkbox" name="pages[]" value="'.$page_url.'"
					 class="pages"> '.$page_title.'<br>';
					}
					
					echo'
					</div>
					<div class="group">
						<label></label>
						<input type="hidden" name="edit_id" value="'.$rows['admin_id'].'" />
						<input type="submit" name="edit_submit" class="btn btn-success btn-lg btn-block" value="Submit">
					</div>
				 </form>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>

			  </div>
			</div>
			 <!----------------------end edit Admin Modal ---------------------------->
			';
				}
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
 