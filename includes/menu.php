<nav class="navbar navbar-default" role=navigation>
<div class=container>
<div class=navbar-header>
<button type=button class="navbar-toggle collapsed" data-toggle=collapse data-target="#bs-example-navbar-collapse-1">
<span class=sr-only>Toggle navigation</span>
<span class=icon-bar></span>
<span class=icon-bar></span>
<span class=icon-bar></span>
</button>
<a class="navbar-brand wow pulse" href="index.php">WeZa Shopping</a>
</div>
<div class="collapse navbar-collapse" id=bs-example-navbar-collapse-1>
<ul class="nav navbar-nav navbar-right">
<li><a href="<?php echo $site_url; ?>">Home</a></li>
<li><a href="all.php?all">All Products</a></li>
<?php get_cats(); ?>
<li><a href="contact.php">Contact Us</a></li>
</ul>
</div>
</div>
</nav>