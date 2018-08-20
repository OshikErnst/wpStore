<?php 
get_header();
?>


<div id="content">


<h2>Search Results for <i>'<?php the_search_query(); ?>'</i></h2>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
	<h3 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
	<div class="meta"><?php the_category(',') ?> </div>
	
	<div class="productcontent">
		<?php the_content(); ?>
	</div>

</div>


<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php posts_nav_link(' | ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?>


</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
