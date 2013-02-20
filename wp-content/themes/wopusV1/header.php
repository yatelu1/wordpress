<!DOCTYPE html>
<html>
<head profile="http://gmpg.org/xfn/11">
	<meta charset="UTF-8" />
	<title><?php if (is_home () ) { bloginfo('name'); } elseif ( is_category() ) { single_cat_title();
	echo " - "; bloginfo('name'); } elseif (is_single() || is_page() ) { single_post_title(); echo " - "; bloginfo('name'); }
	elseif (is_search() ) { bloginfo('name'); echo "search results:"; echo
	wp_specialchars($s); } else { wp_title('',true); } ?></title>
	<meta name="copyright" content="design by wopus.org" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-includes/js/jquery/jquery.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('.menu li').hover(function() {
				$('ul', this).slideDown(300)
			},
			function() {
				$('ul', this).slideUp(300)
			});
		});
	</script>
	<?php wp_head(); ?>
</head>

<body>
<div id="page">
	<div id="header">
		<h1><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<div id="search">
			<form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
				<input type="text" class="s-text" value="<?php the_search_query(); ?>" name="s" id="s" size="20" />
				<input type="submit" class="s-submit" value="" />
			</form>
		</div>
		<div id="nav">
			<div id="rss"><a id="rss_icon" title="订阅Wopus日志" href="<?php bloginfo('rss2_url'); ?>"></a></div>
			<?php wp_nav_menu( array('menu' => 'header-menu' )); ?>
		</div>
	</div>