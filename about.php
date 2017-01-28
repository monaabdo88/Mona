<?php include"includes/header.php"; ?>
<div class="wrapper row-offcanvas row-offcanvas-left">
<aside class="left-side sidebar-offcanvas">
<!-- sidebar: style can be found in sidebar.less -->
<?php include"includes/sidebar.php"; ?>
<!-- /.sidebar -->
</aside>
<aside class="right-side">
<!-- Main content -->
<section class="content">
<?php 
$main = "select * from about";
$run_main = mysqli_query($conn,$main);
while($row = mysqli_fetch_array($run_main)){
	$standard = $row['standard'];
    $enterprise = $row['enter'];
    $basic = $row['basic'];
 
}
if(isset($_POST['done'])){
    $standard =  mysqli_real_escape_string($conn,strip_tags($_POST['standard']));
    $enterprise =  mysqli_real_escape_string($conn,strip_tags($_POST['enterprise']));
    $basic =  mysqli_real_escape_string($conn,strip_tags($_POST['basic']));
    $up_sql = "update about set standard = '$standard', enter = '$enterprise', basic = '$basic' where id = 1";
    $run_up = mysqli_query($conn,$up_sql);
    if($run_up){
        echo '<div class=\"col-md-6 col-md-offset-3\">
            <div class="alert alert-success text-center lead" id="suc">Update Data Done Successfully</div></div>
            ';
    }
}

?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">About Us</header>
			<div class="panel-body">
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                      <fieldset>
                                      <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label" for="typeahead">Enterprise</label>
                                          <div class="col-sm-10">
                                            <textarea class="form-control textarea" placeholder="Enter text ..." style="height: 200px" name="enterprise"  class="form-control"><?php echo $enterprise; ?></textarea>
                                          </div>
                                        </div>
                                         <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label" for="typeahead">Standard</label>
                                          <div class="col-sm-10">
                                            <textarea class="form-control textarea" placeholder="Enter text ..." style="height: 200px" name="standard"  class="form-control"><?php echo $standard; ?></textarea>
                                          </div>
                                        </div>
                                        
                                         <div class="form-group">
                                          <label class="col-sm-2 control-label" for="typeahead">Basic </label>
                                          <div class="col-sm-10">
                                            <textarea class="form-control textarea" name="basic" placeholder="Enter text ..." style="height: 200px"><?php echo $basic; ?></textarea>
                                          </div>
                                        </div>
										<?php if($admin_edit == 1 || $admin_id == 1){ ?>
                                        <div class="form-actions">
                                          <center><input type="submit" name="done" class="btn btn-primary" value="Save changes" />
                                         </center>
                                        </div>
										<?php }; ?>
                                      </fieldset>
                                    </form>
			</div>
		</section>
	</div>
</div>
</section><!-- /.content -->

<?php include"includes/footer.php"; ?>