<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="verify-v1" content="DT/mN53aF5TG9nHmDTXr2pAzZOci1bwiJ/RrwjBHQzE=" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if IE]><link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie.css" type="text/css" media="screen" /><![endif]-->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="http://www.cksky.cn/index.php/feed" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="/favicon.ico" /> 
<?php wp_head(); ?>
<script language="javascript"s src="<?php bloginfo('stylesheet_directory'); ?>/jquery-1.3.2.min.js"></script>
<script language="javascript"s src="<?php bloginfo('stylesheet_directory'); ?>/jquery.corner.js"></script>
<script language="javascript"s src="<?php bloginfo('stylesheet_directory'); ?>/jquery_cookie.js"></script>
</head>

<body>
<div id="ckhead">
<a href="<?php echo get_option('home'); ?>/"><img id="cklogo" src="<?php bloginfo('stylesheet_directory'); ?>/images/cklogo.gif" /></a>

<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar('Top Navigation') ) : ?>
			<ul>
            <li><a <? if(is_home()) echo 'class="select"'; ?> href="<?php echo get_option('home'); ?>/">首页</a></li>
            <?php wp_list_cats('sort_column=name&optioncount=0'); ?>
           <li id="cklogin"><a href="/index.php/links">连接</a></li>
          <li id="cklogin"><a href="/index.php/guestbook">留言</a></li>
					<li id="cklogin"><?php wp_loginout(); ?></li>
                     <?php wp_register(); ?>
                     
                    
			</ul>
		<?php endif; ?>
        
</div>

	<div id="header">
    <div id="wrapper">
		<div id="logo">
		<h1><a href="<?php echo get_option('home'); ?>/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/bcklogo.gif" /></a></h1>
		
		</div>
	
    	<div id="head_nav">
        <div id="serve">
<form method="get" id="searchform_top" action="<?php bloginfo('url'); ?>/">
<input type="text" value="What Do You Want To Search?" name="s" id="searchform_top_text" onclick="this.value='';" />
</form>
</div>
</div>
    <div class="clear"></div>
    </div>
	</div>
<div id="wrapper">
	