<?php 
get_header();
?>


<div id="content">
<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>
<h2 class="title">Archive for the <strong><?php single_cat_title(); ?></strong> Category</h2>
<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
<h2 class="title">Posts Tagged <strong><?php single_tag_title(); ?></strong></h2>
<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
<h2 class="title">Archive for <?php the_time('F jS, Y'); ?></h2>
<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<h2 class="title">Archive for <?php the_time('F, Y'); ?></h2>
<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<h2 class="title">Archive for <?php the_time('Y'); ?></h2>
<?php /* If this is an author archive */ } elseif (is_author()) { ?>
<h2 class="title">Author Archive</h2>
<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
<h2 class="title">Blog Archives</h2>
<?php } ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
	<h3 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>

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
