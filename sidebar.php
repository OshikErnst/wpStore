
<!-- begin sidebar -->
<div id="sidebar">

<div id="basket">
<?php echo nzshpcrt_shopping_basket(); ?>
</div>
<div class="sidebar_sep"></div>

<h2 class="brands">Brands</h2>
<ul id="brands">
<?php show_brands(2); ?>
</ul>


<div class="sidebar_sep"></div>

<h2 class="topproducts">Top Products</h2>
<ul id="topproducts">
<?php display_top_products(7); ?>
</ul>


<div class="sidebar_sep"></div>
<?php 	/* Widgetized sidebar, if you have the plugin installed. */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
		
<?php endif; ?>

</div>
<!-- end sidebar -->
