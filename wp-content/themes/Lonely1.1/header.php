<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
	<?php include('includes/seo.php'); ?>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php if(is_singular()) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
</head>
<body>
<div id="header">
<div id="nav">
	<div class="logo">
		<h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?> | <?php bloginfo('description'); ?>"></a></h1>
	</div>

	<form method="get" class="search-form" action="/" >
		<input class="search-input" name="s" type="text" placeholder="输入关键字 回车搜索" autofocus="" x-webkit-speech="">
		<input class="search-submit" type="submit" value="搜索">
	</form>

	<?php if ( function_exists( 'wp_nav_menu' ) ) { // 顶部导航开始 ?>
	<?php wp_nav_menu( array(
		'theme_location' => 'primary',
		'container' => false, 
		'menu_id' => 'topnav', 
		'fallback_cb' => 'revert_wp_menu_page'
		)); ?>
	<?php } else { ?>
		<ul id="topnav">
			<?php wp_list_pages(); ?>
		</ul><!-- topnav end -->
	<?php } ?>
</div>
</div>
<div id="wrapper">