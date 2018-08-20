<?php 
get_header();
?>


<div id="content">



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
	<h3 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
	
	
	<div class="productcontent">
		<?php the_content(); ?>
	</div>
 <?php if($_GET['product_id']) {?>
	<div id="more_products">
		<span class="title"><img src="<?php bloginfo('template_url'); ?>/img/more.gif" /></span>
		<ul>
			<?php display_more_products(); ?>
		</ul>
	</div>
	<?php } ?>
</div>


<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>


</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
