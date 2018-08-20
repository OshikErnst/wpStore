<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> 
    <link id="page_favicon" href="<?php bloginfo('template_url'); ?>/img/favicon.ico" rel="icon" type="image/x-icon" />
	

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


	<?php wp_head(); ?>
	
	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
		<?php 
		if ($_GET['category'] == ''){
		?>
	
		strong.cattitles {display:none;	z-index:1;}
	<?php } ?>
	</style>
	
	
</head>

<body>
<div id="wrapper">

<div id="header">
<div id="header_top">
<div id="logo"><h1><a href="<?php bloginfo('url'); ?>" title="Home"><span><?php bloginfo('name'); ?></span></a></h1></div>
<div id="nav">
<ul>
			<li><a href="<?php echo get_option('home'); ?>">Home</a></li>
			<li><a href="<?php bloginfo('rss2_url'); ?>">RSS</a></li>
	
			<?php wp_list_pages('title_li=&depth=2'); ?>
		</ul>
</div>
</div>
<div id="header_middle">
<div id="latestbox">

<div id="latestproducts">
<span class="title"><img src="<?php bloginfo('template_url'); ?>/img/latest.gif" /></span>
<ul>
<?php display_latest_products(3); ?>
</ul>
</div>

<div id="storedesc">
<div class="box">
	<h2><?php bloginfo('name'); ?></h2>
	<p><?php bloginfo('description'); ?></p>
</div>
</div>


</div>
</div>
<div id="header_bottom">


<ul id="categories">
<?php show_cats(1); ?>
</ul>

<div id="search">
<?php get_search_form(); ?>
</div>
</div>
</div>
	
