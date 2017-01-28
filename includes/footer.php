<section class=l-foot>
<div class=container>
<div class=row>
<div class="col-lg-5 col-md-6">
<h2>Littel About Us</h2>
<p class=lead><?php echo $about; ?></p>

<div class=clearfix></div>
</div>

<div class="col-lg-4">
<h3 class=text-center>Popluar Products</h3>
<?php 
$pop = "select * from products order by view desc limit 2";
$run_pop = mysqli_query($conn,$pop);
while($row_pop = mysqli_fetch_array($run_pop)){
	echo'<div class=blog>
<a href="details.php?id='.$row_pop['product_id'].'"><img class=img-thumbnail src="'.$row_pop['product_image'].'" alt="'.$row_pop['product_title'].'" /></a>
<p>
'.substr(strip_tags($row_pop['product_disc']),0,200).'....</p>
</div><div class="clearfix"></div>';
}
?>
</div>
<div class="col-lg-3">
<h3>Search Our Site</h3>
<form class=inline-form method="get" action="result.php">
<input type="text" name="search" style="max-width:180px;" required placeholder="Search...!!!"/>
<input type="submit" name="done" value="Search" class="btn btn-sm btn-info"/>
</form>
<h3>Brands</h3>
<ul class="list-unstyled tag">
<?php 
$brands = "SELECT * FROM brands ORDER BY RAND() LIMIT 10";
$run_brands = mysqli_query($conn,$brands);
while($row_brand = mysqli_fetch_array($run_brands)){
	echo'<li><a href="brand.php?brand_id='.$row_brand['brand_id'].'">'.$row_brand['brand_title'].'</a></li>';
}
?>
</ul>
</div>
</div>
</div>
</section>
<footer class=copy>
<div class=container>
<div class="col-md-offset-4 col-lg-6 col-md-6">
<p class=text-center><?php echo $copy; ?></p>
</div>

</div>
</footer>
<div id=scroll-top>
<i class="fa fa-chevron-up fa-3x"></i>
</div>
<!--[if lt IE 9]-->
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<!--[endif]-->
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>
<script defer src="templates/js/jquery.flexslider.js"></script>
<script src="templates/js/bootstrap.min.js"></script>
<script src="templates/js/wow.min.js"></script>
<script>new WOW().init();</script>
<script src="templates/js/scroll.js"></script>
<script src="templates/js/plugins.js"></script>
<script src="templates/js/sweetalert.min.js"></script>
<script src="templates/js/jquery.validate.js"></script>
<script type="text/javascript">
$(function() {

//////////////////////////login /singup modal display /////////////////
    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
/////////////////////// edit /order/delete modales display //////////////////
 $('#edit_account').click(function(e) {
		$("#edit-form").delay(100).fadeIn(100);
 		$("#order-form").fadeOut(100);
        $("#delete-form").fadeOut(100);
		$('#orders').removeClass('active');
        $('#del_account').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#orders').click(function(e) {
		$("#orders-form").delay(100).fadeIn(100);
 		$("#edit-form").fadeOut(100);
        $("#delete-form").fadeOut(100);
		$('#edit_account').removeClass('active');
        $('#del_account').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});    
    
    $('#del_account').click(function(e) {
		$("#delete-form").delay(100).fadeIn(100);
 		$("#edit-form").fadeOut(100);
        $("#orders-form").fadeOut(100);
		$('#orders').removeClass('active');
        $('#edit_account').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});    
    
 ////////////////////////change country //////////////////////////////////
    $('.country').on("change",function () {
        var categoryId = $(this).find('option:selected').val();
        $.ajax({
            url: "city.php",
            type: "POST",
            data: "categoryId="+categoryId,
            success: function (response) {
               $(".city").html(response);
            },
        });
    });
	
   
 //////////////////////////////messages ///////////////////////
 
    $("#danger").fadeTo(2000,3000).slideUp(1000,function(){
        $("#add_new_form").submit();
    });
    $("#suc").fadeTo(2000,1000).slideUp(1000,function(){
        $("#add_new_form").submit();
    });
});
//////////////////////////form validation//////////////////////
$().ready(function() {
    // validate signup form on keyup and submit
		$("#register-form").validate({
			rules: {
				username: "required",
				password: "required",
                confirm:"required",
                email:"required",
                contact:"required",
                address:"required",
				username:{
					required: true,
					minlength: 2
				},
				password: {
					required: true,
					minlength: 5
				},
				confirm: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
                contact:{
                   	required: true,
					minlength: 11   
                },
				email: {
					required: true,
					email: true
				}/*,
				/*topic: {
					required: "#newsletter:checked",
					minlength: 2
				},
				agree: "required"*/
			},
			messages: {
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 2 characters"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
                contact:{
                    required: "Please provide a Contact Number",
					minlength: "Your Contact Number must be at least 11 Number long"
                },
				email: "Please enter a valid email address"/*,
				/*agree: "Please accept our policy",
				topic: "Please select at least 2 topics"*/
			}
		});
        $("#login-form").validate({
			rules: {
				name: "required",
				pass: "required",
				name:{
					required: true,
					minlength: 2
				},
				pass: {
					required: true,
					minlength: 5
				}
			},
			messages: {
				name: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 2 characters"
				},
				pass: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				}
			}
		});
        $("#forget-form").validate({
			rules: {
				email: {
					required: true,
					email: true
				}
			},
			messages: {
				email: "Please enter a valid email address"
			}
		});
        $("#edit-form").validate({
            rules: {
				username: "required",
				password: "required",
                confirm:"required",
                email:"required",
                contact:"required",
                address:"required",
				username:{
					required: true,
					minlength: 2
				},
				password: {
					required: true,
					minlength: 5
				},
                contact:{
                   	required: true,
					minlength: 11   
                },
				email: {
					required: true,
					email: true
				}/*,
				/*topic: {
					required: "#newsletter:checked",
					minlength: 2
				},
				agree: "required"*/
			},
			messages: {
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 2 characters"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
                contact:{
                    required: "Please provide a Contact Number",
					minlength: "Your Contact Number must be at least 11 Number long"
                },
				email: "Please enter a valid email address"/*,
				/*agree: "Please accept our policy",
				topic: "Please select at least 2 topics"*/
			}
        });
		//////////////////contact form validation//////////////////////
		$("#contact-form").validate({
			rules: {
				name: "required",
				sub: "required",
                msg:"required",
                tel:"required",
                mail:"required",
				name:{
					required: true,
					minlength: 2
				},
				sub: {
					required: true,
					minlength: 5
				},
				msg: {
					required: true,
					minlength: 25
					
				},
                tel:{
                   	required: true,
					minlength: 11   
                },
				mail: {
					required: true,
					email: true
				}
			},
			messages: {
				name: {
					required: "Please enter Your Name",
					minlength: "Your Name must consist of at least 2 characters"
				},
				sub: {
					required: "Please provide a Subject Fro your Message",
					minlength: "Your Message Subject must be at least 5 characters long"
				},
				msg:{
					required: "Please enter Your Message",
					minlength: "Your Message Content must consist of at least 25 characters"	
				},
                tel:{
                    required: "Please provide a Contact Number",
					minlength: "Your Contact Number must be at least 11 Number long"
                },
				mail: "Please enter a valid email address"
			}
		});
});
////////////////////////reset modal /////////////////////////
$(function() {
        $('.modal').on('hidden.bs.modal', function(){
            $('.cmxform label').removeClass('error');
            $('.cmxform label').remove();
            $(".cmxform")[0].reset();
            $(".cmxform")[1].reset();
            $("#view").attr('src','');
            $("#view").css({
                width:'',
                height:''
            });
        });
    });
///////////////////////display image on upload add///////////////
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#view').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$("#img").change(function(){
    readURL(this);
    $("#view").css({
        width:'25%',
        height:'150px'
    });
});
////////////////////display image on edit //////////////////////
function readURL2(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#view2').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$("#img2").change(function(){
    readURL2(this);
    $("#view2").css({
        width:'25%',
        height:'150px'
    });
});
/////////////////////////add to cart ////////////////////////////
  $(document).ready(function(){

      $.ajax({
        type:'post',
        url:'ajax_action.php',
        data:{
          total_cart_items:"totalitems"
        },
        success:function(response) {
          document.getElementById("total_items").value=response;
        }
      });

    });

    function cart(id)
    {
	  var ele=document.getElementById(id);
	  var img_src=ele.getElementsByTagName("img")[0].src;
	  var name=document.getElementById(id+"_name").value;
	  var price=document.getElementById(id+"_price").value;
      var qty = document.getElementById(id+"_qty").value;
	
	  $.ajax({
        type:'post',
        url:'ajax_action.php',
        data:{
          item_src:img_src,
          item_name:name,
          item_price:price,
          item_qty:qty
        },
        success:function(response) {
          document.getElementById("total_items").value=response;
        }
      });
	
    }

   /* function show_cart()
    {
      $.ajax({
      type:'post',
      url:'ajax_action.php',
      data:{
        showcart:"cart"
      },
      success:function(response) {
        document.getElementById("mycart").innerHTML=response;
        $("#mycart").slideToggle();
      }
     });

    }*/
//////////////////////flexslider /////////////////////////////////
    $(window).load(function(){
      $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 210,
        itemMargin: 5,
        asNavFor: '#slider'
      });

      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
	$(window).load(function() {
	  $('.flexslider').flexslider({
		animation: "slide"
	  });
	});
// This is the first thing we add
    $(document).ready(function() {
        
        $('.rate_widget').each(function(i) {
            var widget = this;
            var out_data = {
                widget_id : $(widget).attr('id'),
                fetch: 1
            };
            $.post(
                'ratings.php',
                out_data,
                function(INFO) {
                    $(widget).data( 'fsr', INFO );
                    set_votes(widget);
                },
                'json'
            );
        });
    

        $('.ratings_stars').hover(
            // Handles the mouseover
            function() {
                $(this).prevAll().andSelf().addClass('ratings_over');
                $(this).nextAll().removeClass('ratings_vote'); 
            },
            // Handles the mouseout
            function() {
                $(this).prevAll().andSelf().removeClass('ratings_over');
                // can't use 'this' because it wont contain the updated data
                set_votes($(this).parent());
            }
        );
        
        
        // This actually records the vote
        $('.ratings_stars').bind('click', function() {
            var star = this;
            var widget = $(this).parent();
            
            var clicked_data = {
                clicked_on : $(star).attr('class'),
                widget_id : $(star).parent().attr('id')
            };
            $.post(
                'ratings.php',
                clicked_data,
                function(INFO) {
                    widget.data( 'fsr', INFO );
                    set_votes(widget);
                },
                'json'
            ); 
        });
        
        
        
    });

    function set_votes(widget) {

        var avg = $(widget).data('fsr').whole_avg;
        var votes = $(widget).data('fsr').number_votes;
        var exact = $(widget).data('fsr').dec_avg;
    
        window.console && console.log('and now in set_votes, it thinks the fsr is ' + $(widget).data('fsr').number_votes);
        
        $(widget).find('.star_' + avg).prevAll().andSelf().addClass('ratings_vote');
        $(widget).find('.star_' + avg).nextAll().removeClass('ratings_vote'); 
        $(widget).find('.total_votes').text( votes + ' votes recorded (' + exact + ' rating)' );
    }
    // END FIRST THING 
    </script>

</body>
</html>