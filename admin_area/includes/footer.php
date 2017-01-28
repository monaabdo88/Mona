 <div class="footer-main">
                    Copyright &copy MonaAbdo88 
                </div>
            </aside><!-- /.right-side -->

        </div><!-- ./wrapper -->
		</body>
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="../templates/admin/js/jquery.min.js" type="text/javascript"></script>

        <!-- jQuery UI 1.10.3 -->
        <script src="../templates/admin/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="../templates/admin/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="../templates/admin/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

        <script src="../templates/admin/js/plugins/chart.js" type="text/javascript"></script>

        <!-- datepicker
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
        <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
        <!-- iCheck -->
		<script src="../templates/admin/js/jquery.dataTables.min.js"></script>
        <script src="../templates/admin/js/dataTables.bootstrap.min.js"></script>
        <script src="../templates/admin/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- calendar -->
        <script src="../templates/admin/js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

        <!-- Director App -->
        <script src="../templates/admin/js/Director/app.js" type="text/javascript"></script>
        <script src="../templates/js/sweetalert.min.js"></script>
        <!-- Director dashboard demo (This is only for demo purposes) -->
        <script src="../templates/admin/js/Director/dashboard.js" type="text/javascript"></script>
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>
		tinymce.init({
		  selector: 'textarea',
		  height: 200,
		  theme: 'modern',
		  plugins: [
			'advlist autolink lists link image charmap print preview hr anchor pagebreak',
			'searchreplace wordcount visualblocks visualchars code fullscreen',
			'insertdatetime media nonbreaking save table contextmenu directionality',
			'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
		  ],
		  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
		  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
		  image_advtab: true,
		  templates: [
			{ title: 'Test template 1', content: 'Test 1' },
			{ title: 'Test template 2', content: 'Test 2' }
		  ],
		  content_css: [
			'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
			'//www.tinymce.com/css/codepen.min.css'
		  ]
		 });
		</script>
        <script type="text/javascript">
            $(document).ready(function(){
               $("#danger").fadeTo(2000,3000).slideUp(1000,function(){
                $("#add_new_form").submit();
                });
                $("#suc").fadeTo(2000,1000).slideUp(1000,function(){
                    $("#add_new_form").submit();
                }); 
            
				$('#example').DataTable();
				/////////////////////change category //////////////////////////////////
				$('#category').on("change",function () {
					var categoryId = $(this).find('option:selected').val();
					$.ajax({
						url: "cat_brand.php",
						type: "POST",
						data: "categoryId="+categoryId,
						success: function (response) {
						   $("#sub").html(response);
						},
					});
				});
				$('#category2').on("change",function () {
					var categoryId = $(this).find('option:selected').val();
					$.ajax({
						url: "cat_brand.php",
						type: "POST",
						data: "categoryId="+categoryId,
						success: function (response) {
						   $("#sub2").html(response);
						},
					});
				});
			} );

////////////////////display image on add//////////////////////
function preview_image() 
{
 var total_file=document.getElementById("upload_file").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#view_image .row').append("<div class='col-md-4'><img style='height:200px;width:100%' class='img-responsive thumbnail' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
 }
}
////////////////////display image on edit//////////////////////
function preview_image2() 
{
 var total_file=document.getElementById("upload_file2").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#view_image2 .row').append("<div class='col-md-4'><img style='height:200px;width:100%' class='img-responsive thumbnail' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
 }
}
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
	
</script>
</body>
</html>