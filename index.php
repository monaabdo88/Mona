<?php 
include "includes/header.php"; 
include"includes/menu.php";
?>
<section class=slider>
<?php include "slider.php"; ?>

</section>
<section class=content>
<div class=container>
<h2 class="text-center wow fadeInDown" data-wow-offset=100><?php echo $sub_title; ?></h2>
<div class=row>
<?php get_about(); ?>
</div>
<h4>Latest Products</h4>
<div class="row wow fadeInLeft" data-wow-offset=170>
<?php get_pro_desc(); ?>
</div>
<h4>Offers</h4>
<div class="row wow fadeInRight" data-wow-offset=200>
<?php get_pro_discount(); ?>
</div>
<h4>Our Partners</h4>
<div class=row>
<div class=our>
<ul class=list-unstyled>
<?php get_partners(); ?>
</ul>
</div>
</div>
</div>
</section>

<?php include "includes/footer.php"; ?>