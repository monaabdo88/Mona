<form class="cmxform" id="register-form"  name="singup-form" action="" method="post" role="form" style="display: none;" enctype="multipart/form-data" >
									<div class="form-group">
										<input type="text" required="" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="email" required="" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" required="" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" required="" name="confirm" id="confirm" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
                                        <img class="img-responsive thumbnail" id="view" />
										<input type="file" name="img" id="img" tabindex="2" class="form-control">
									</div>
									<div class="form-group">
										<select name="country" required="" class="form-control country">
                                        <option selected=\"true\" disabled=\"disabled\" value=''>Select Country</option>
										    <?php get_all_country(); ?>
										</select>
									</div>
									<div class="form-group">
										<select name="city" required="" class="form-control city">
										  <?php //get_city(); ?>
										</select>
									</div>
									<div class="form-group">
										<input type="number" required="" name="contact" min="11"  id="contact" tabindex="2" class="form-control" placeholder="Contact number">
									</div>
									<div class="form-group">
										<textarea name="address" required="" class="form-control" id="address" placeholder="Write Your Address"></textarea>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
											 
										</div>
										
									</div>
								</form>