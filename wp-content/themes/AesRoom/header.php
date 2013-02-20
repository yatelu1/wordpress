<?php $options = get_option( 'AesRoom_theme_settings' ); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title><?php wp_title(); ?> <?php bloginfo( 'name' ); ?></title>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link href="<?php bloginfo('template_url');?>/style.css" rel="stylesheet" type="text/css"/>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php
	
	if (is_single()){
	$tags = wp_get_post_tags($post->ID);
			foreach ($tags as $tag ) {
				$keywords = $keywords . $tag->name . ",";
			}
?>
<meta name="keywords" content="<?php echo substr($keywords,0,strlen($keywords)-1); ?>" />
<meta name="description" content="<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 100,"..."); ?>" />
<?php
	}
	else if (is_home()) {
?>
<meta name="keywords" content="<?php echo $options['index_key']; ?>" />
<meta name="description" content="<?php echo $options['index_desc']; ?>" />
<?php }
	else if (is_category) {
		if($options[the_category_ID('',false)]!=""){
?>
<meta name="keywords" content="<?php echo $options[the_category_ID('',false)];?>" />
<?php 
		}else{
?>
<meta name="keywords" content="<?php echo $options['index_key']; ?>" />
<?php 
		}
		if($options[single_cat_title('', false)]!=""){
?>
<meta name="description" content="<?php echo $options[single_cat_title('', false)]; ?>" />
<?php 
		}
		else{
?>
<meta name="description" content="<?php echo $options['index_desc']; ?>" />
<?php
		}
	}
?>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="icon" href="<?php echo $options['upload_favicon']; ?>" type="image/x-icon"/>
<link rel="stylesheet" href="http://www.dwlxjz.com/wp-content/plugins/wp-code-highlight/css/wp-code-highlight.css" />
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery-1.4.4.min.js"></script>
<script type='text/javascript' src='<?php bloginfo('template_url');?>/js/color-animate.js'></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/lazyload.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/linkhover.js"></script>
<script type="text/javascript">
	$("img.lazy").lazyload();
	jQuery(function($) {
		var $liveTip = $('<div id="livetip"></div>').hide().appendTo('body');
		var tipTitle = '';
		$(".widget,#link,#foot,.post-box").bind('mouseover mouseout mousemove', function(event) {
		var $link = $(event.target).closest('a');
		if (!$link.length) {
			return; 
		}
		var link = $link[0];
		if (event.type == 'mouseover' || event.type == 'mousemove') {
			$liveTip.css({
			top: event.pageY + 12,
			left: event.pageX + 12
			});
		};
		if (event.type == 'mouseover') {
			tipTitle = link.title;
			link.title = '';
			$liveTip.html('<div>' + tipTitle + '</div><div>' + link.href + '</div>')
			.show();
		};
		if (event.type == 'mouseout') {
			$liveTip.hide();
			if (tipTitle) {
			link.title = tipTitle;
		};
	};
});
});
	function ceshi(obj){
		
		$(obj).parent().find("div").css("display","block");
		$(obj).remove();
	}
</script>
</head>
<body>
<div id="container">
	<div id="head">
		
		<div id="nav">
			<div id="logo">
				<?php
					if ($options['logo']!=""){
				?>
				<a href="<?php bloginfo('url'); ?>"><img src="<?php echo $options['logo']; ?>" width="230" height="35"/></a>
				<?php 
					}else{
				?>
				<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url');?>/images/logo.png" width="230" height="35"/></a>
				<?php
					}
				?>
				
			</div>
			<!--nav-->
			<?php wp_nav_menu( array( 'container_id' => 'menu', 'theme_location' => 'primary','fallback_cb'=> '' ) ); ?>
		</div>
	</div>
	<!--head结束-->
	<div id="content">