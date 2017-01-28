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
$main = "select * from main";
$run_main = mysqli_query($conn,$main);
while($row = mysqli_fetch_array($run_main)){
	$site_name = $row['site_name'];
	$site_url = $row['site_url'];
	$site_disc = $row['site_disc'];
	$site_tags = $row['site_tags'];
	$site_status = $row['site_status'];
	$close_msg = $row['close_msg'];
    $sub_title = $row['sub_title'];
    $site_mail = $row['site_mail'];
    $site_contact = $row['site_contact'];
    $site_copyrights = $row['site_copyrights'];
	$about_us = $row['about_us'];
}
if(isset($_POST['done'])){
    $site_name =  mysqli_real_escape_string($conn,strip_tags($_POST['site_name']));
    $site_url =  mysqli_real_escape_string($conn,strip_tags($_POST['site_url']));
    $site_mail =  mysqli_real_escape_string($conn,strip_tags($_POST['site_mail']));
    $site_disc =  mysqli_real_escape_string($conn,strip_tags($_POST['site_disc']));
    $site_tags =  mysqli_real_escape_string($conn,strip_tags($_POST['site_tags']));
    $site_status =  mysqli_real_escape_string($conn,strip_tags($_POST['site_status']));
    $site_msg =  mysqli_real_escape_string($conn,$_POST['close_msg']);
    $sub_title =  mysqli_real_escape_string($conn,$_POST['sub_title']);
    $site_contact =  mysqli_real_escape_string($conn,$_POST['site_contact']);
    $site_copyrights =  mysqli_real_escape_string($conn,$_POST['site_copyrights']);
    $about_us =  mysqli_real_escape_string($conn,$_POST['about_us']);
    $up_sql = "update main set site_name = '$site_name', site_mail = '$site_mail', site_url = '$site_url',
    sub_title = '$sub_title', site_disc = '$site_disc' , site_tags = '$site_tags',site_status = '$site_status', close_msg = '$site_msg',
    site_contact = '$site_contact', site_copyrights = '$site_copyrights', about_us = '$about_us' where id = 1
    ";
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
			<header class="panel-heading">Main Settings</header>
			<div class="panel-body">
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                      <fieldset>
                                        <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label" for="typeahead">Site Name </label>
                                          <div class="col-sm-10">
                                            <input type="text" name="site_name" value="<?php echo $site_name; ?>"  class="form-control"/>
                                           
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label" for="typeahead">Site Sub Title </label>
                                          <div class="col-sm-10">
                                            <input type="text" name="sub_title" value="<?php echo $sub_title; ?>"  class="form-control"/>
                                           
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label" for="typeahead">Site E-mail  </label>
                                          <div class="col-sm-10">
                                            <input type="email" name="site_mail" value="<?php echo $site_mail; ?>"  class="form-control"/>
                                           
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label" for="typeahead">Site Url </label>
                                          <div class="col-sm-10">
                                            <input type="text" name="site_url" value="<?php echo $site_url; ?>"  class="form-control"/>
                                            
                                          </div>
                                        </div>
                                        
                                         <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label" for="typeahead">Site Tags </label>
                                          <div class="col-sm-10">
                                            <textarea class="form-control textarea" placeholder="Enter text ..." style="height: 200px" name="site_tags"  class="form-control"><?php echo $site_tags; ?></textarea>
                                          </div>
                                        </div>
                                         <div class="form-group">
                                          <label class="col-sm-2 col-sm-2 control-label" for="typeahead">Site Discription </label>
                                          <div class="col-sm-10">
                                            <textarea class="form-control textarea" placeholder="Enter text ..." style="height: 200px" name="site_disc"  class="form-control"><?php echo $site_disc; ?></textarea>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-sm-2 control-label" for="select01">Site Status</label>
                                          <div class="col-sm-10">
                                            <select id="select01" name="site_status" class="form-control">
                                             
                                              <option value="Open" <?php if($site_status == 'Open') echo "selected"; ?>>Open</option>
                                              <option value="Close" <?php if($site_status == 'Close') echo "selected"; ?>>Close</option>
                                      
                                            </select>
                                          </div>
                                        </div>
                                         <div class="form-group">
                                          <label class="col-sm-2 control-label" for="typeahead">Close Message </label>
                                          <div class="col-sm-10">
                                            <textarea class="form-control textarea" name="close_msg" placeholder="Enter text ..." style="height: 200px"><?php echo $close_msg; ?></textarea>
                                          </div>
                                        </div>
                                        
                                        <div class="form-group">
                                          <label class="col-sm-2 control-label" for="typeahead">Site Contact Details </label>
                                          <div class="col-sm-10">
                                            <textarea class="form-control textarea" name="site_contact" placeholder="Enter text ..." style="height: 200px"><?php echo $site_contact; ?></textarea>
                                          </div>
                                        </div>
										<div class="form-group">
                                          <label class="col-sm-2 control-label" for="typeahead">About Us </label>
                                          <div class="col-sm-10">
                                            <textarea class="form-control textarea" name="about_us" placeholder="Enter text ..." style="height: 200px"><?php echo $about_us; ?></textarea>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-sm-2 control-label" for="typeahead">Site Copyrights </label>
                                          <div class="col-sm-10">
                                            <textarea class="form-control textarea" name="site_copyrights" placeholder="Enter text ..." style="height: 200px"><?php echo $site_copyrights; ?></textarea>
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