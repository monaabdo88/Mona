	<form class="cmxform" id="edit-form"  name="edit-form" action="" method="post" role="form"  style="display: block;" enctype="multipart/form-data" >
								<?php 
                                $select_edit = "select * from customer where user_name = '$_SESSION[user_name]'";
                                $run_edit = mysqli_query($conn,$select_edit);
                                while($rows_edit = mysqli_fetch_assoc($run_edit)){
                                    $edit_img = $rows_edit['user_img'];
									$customer_id = $rows_edit['user_id'];
                                ?>
                                	<div class="form-group">
										<input type="text" required="" value="<?php echo $rows_edit['user_name']; ?>" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="email" required="" value="<?php echo $rows_edit['user_mail']; ?>" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" required="" name="password" value="<?php echo $rows_edit['pass_md'] ?>" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
                                    <?php if($rows_edit['user_img'] != ''){ ?>
                                        <img class="img-responsive thumbnail" style="width: 25%;height:150px;" src="<?php echo $rows_edit['user_img']; ?>" id="view2" />
									<?php } ?>
                                    	<input type="file" name="img" id="img2" tabindex="2" class="form-control">
                                        <input type="hidden" name="img_up" id="img_up" value="<?php $rows_edit['user_img']; ?>" />
									</div>
									<div class="form-group">
										<select name="country" required="" class="form-control country">
                                        <option selected=\"true\" disabled=\"disabled\" value=''>Select Country</option>
										    <?php get_all_country($rows_edit['user_country']); ?>
										</select>
									</div>
									<div class="form-group">
										<select name="city" required="" class="form-control city">
										  <?php get_city($rows_edit['user_city'],$rows_edit['user_country']); ?>
										</select>
									</div>
									<div class="form-group">
										<input type="number" required="" value="<?php echo $rows_edit['user_contact']; ?>" name="contact" min="11"  id="contact" tabindex="2" class="form-control" placeholder="Contact number">
									</div>
									<div class="form-group">
										<textarea name="address" required="" class="form-control" id="address" placeholder="Write Your Address"><?php echo $rows_edit['user_address']; ?></textarea>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="edit-submit" id="edit-submit" tabindex="4" class="form-control btn btn-register" value="Save Changes">
											</div>
											 
										</div>
										
									</div>
                                    <?php }; ?>
								</form>