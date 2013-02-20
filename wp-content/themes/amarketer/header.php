<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

	<title><?php if (is_single() || is_page() || is_archive()) { ?><?php wp_title('',true); ?> | <?php } bloginfo('name'); ?> </title>

	<?php if (is_single() || is_page() || is_home() || is_category() ) : ?><meta name="robots" content="index,follow" /><?php else : ?>	<meta name="robots" content="noindex,follow" /><?php endif; ?>

	<meta http-equiv="Content-Type" content="<?php bloginfo('charset'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen, projection" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>	
	<script src="<?php bloginfo('template_url'); ?>/js/tab.js"></script>
</head>
<body>
<!--  header -->
	<div id="header">
		<a href="<?php echo get_settings('home'); ?>" id="logo"></a>
		<div id="menu">
			<div id="menu-left"><div id="menu-right">
			<li class="<?php if ( is_home() ) { ?>current_page_item<?php } else { ?>page_item<?php } ?>"><a href="<?php echo get_settings('home'); ?>" title="<?php bloginfo('name'); ?>">首页</a></li>
			<?php wp_list_pages('title_li=&depth=1'); ?>
		</div></div></div>
		<span id="feed"><a href="<?php bloginfo('rss_url'); ?>"></a></span>
	</div>
<div id="wrapper">