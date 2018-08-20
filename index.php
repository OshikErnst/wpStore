<?php 
get_header();
?>


<div id="content">



<div id="homepage_products">
<span class="title"><img src="<?php bloginfo('template_url'); ?>/img/new.gif" /></span>
<ul>
<?php display_homepage_products(4); ?>
</ul>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
