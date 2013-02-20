	<div id="sidebar">
	<?php if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar('Sidebar') ) : ?>

   <div class="block">
        <div class="line"></div>
			<?php wp_cumulus_insert(); ?> 
           <div class="line"></div>
		</div>
        
        
        <div class="block">
			<h3>Recent Posts</h3>
				<?php query_posts('showposts=5'); ?>
				<ul>
					<?php while (have_posts()) : the_post(); ?>
					<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
					<?php endwhile;?>
				</ul>
		</div>
        
        
        <div class="block">
			<h3>Search</h3>
				<div id="search_content">
			<form method="get" id="searchform_top" action="<?php bloginfo('url'); ?>/">
           
                <input type="text" value="What Do You Want To Search?" name="s" id="searchform_top_text" onclick="this.value='';" />
               
			
        </form>
				</div>
		</div>
		
        
        
		<div class="block">
       <?php wp_list_bookmarks('title_before=<h3>&title_after=</h3>&category_before=&category_after='); ?>
       <div id="ourlink"> <img src="http://www.cksky.cn/wp-content/uploads/2009/05/logolink.gif" /><strong>CCKZONE</strong>our link</div>
            <div class="clear"></div>
         </div>
        
        
        
        

   <div class="block">     
 <!-- Include the Google Friend Connect javascript library. -->
<script type="text/javascript" src="http://www.google.com/friendconnect/script/friendconnect.js"></script>
<!-- Define the div tag where the gadget will be inserted. -->
<div id="div-8579736282369358431" style="width:245px;border:1px solid #DDD;"></div>
<!-- Render the gadget into a div. -->
<script type="text/javascript">
var skin = {};
skin['BORDER_COLOR'] = '#DDD';
skin['ENDCAP_BG_COLOR'] = '#fcfcfc';
skin['ENDCAP_TEXT_COLOR'] = '#333333';
skin['ENDCAP_LINK_COLOR'] = '#CC0000';
skin['ALTERNATE_BG_COLOR'] = '#ffffff';
skin['CONTENT_BG_COLOR'] = '#ffffff';
skin['CONTENT_LINK_COLOR'] = '#CC0000';
skin['CONTENT_TEXT_COLOR'] = '#333333';
skin['CONTENT_SECONDARY_LINK_COLOR'] = '#cccccc';
skin['CONTENT_SECONDARY_TEXT_COLOR'] = '#666666';
skin['CONTENT_HEADLINE_COLOR'] = '#333333';
skin['NUMBER_ROWS'] = '4';
google.friendconnect.container.setParentUrl('/' /* location of rpc_relay.html and canvas.html */);
google.friendconnect.container.renderMembersGadget(
 { id: 'div-8579736282369358431',
   site: '06354219707324957487' },
  skin);
</script>
<div class="line"></div>	

<a target="_blank" href="http://reader.youdao.com/b.do?keyfrom=bookmarklet&url=http%3A%2F%2Fwww.cksky.cn"><img src="http://reader.youdao.com/images/toolbox/readertoolblues.gif" border="0" alt="订阅到有道阅读" /></a>
<br />

<a target=_blank href="http://www.zhuaxia.com/add_channel.php?sourceid=102&url=http%3A%2F%2Fwww.cksky.cn"><img src="http://www.zhuaxia.com/images/subscribe_12.gif" border="0" alt="订阅到抓虾" /></a>
<br />


<a target="_blank" title="订阅到鲜果 RSS阅读器" href="http://xianguo.com/subscribe?url=http%3A%2F%2Fwww.cksky.cn"><img src="http://xgres.com/static/images/sub/sub_XianGuo_06.gif" border="0" alt="鲜果阅读器订阅图标" /></a>
        </div>
        
        
        
	 <div class="line"></div>	
		
		<div class="block">
			<h3>Meta</h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="<?php bloginfo('rss2_url'); ?>">RSS</a></li>
					<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comment RSS</a></li>
					<!--<li><a rel="nofollow" href="http://validator.w3.org/check/referer">Valid XHTML</a></li>-->
					<?php wp_meta(); ?>
				</ul>
		</div>
		
	<?php endif; ?>
	</div>
    
    
   
    <!-- NEWS ----------------------------------------------------------- Include the Google Friend Connect javascript library. -->
<script type="text/javascript" src="http://www.google.com/friendconnect/script/friendconnect.js"></script>
<!-- Define the div tag where the gadget will be inserted. -->
<div id="div-8579736282369358431"></div>
<!-- Render the gadget into a div. -->
<script type="text/javascript">
var skin = {};
skin['BORDER_COLOR'] = '#DDD';
skin['ENDCAP_BG_COLOR'] = '#fcfcfc';
skin['ENDCAP_TEXT_COLOR'] = '#333333';
skin['ENDCAP_LINK_COLOR'] = '#CC0000';
skin['ALTERNATE_BG_COLOR'] = '#ffffff';
skin['CONTENT_BG_COLOR'] = '#ffffff';
skin['CONTENT_LINK_COLOR'] = '#CC0000';
skin['CONTENT_TEXT_COLOR'] = '#333333';
skin['CONTENT_SECONDARY_LINK_COLOR'] = '#cccccc';
skin['CONTENT_SECONDARY_TEXT_COLOR'] = '#666666';
skin['CONTENT_HEADLINE_COLOR'] = '#333333';
skin['NUMBER_ROWS'] = '4';
google.friendconnect.container.setParentUrl('/' /* location of rpc_relay.html and canvas.html */);
google.friendconnect.container.renderMembersGadget(
 { id: 'div-8579736282369358431',
   site: '06354219707324957487' },
  skin);
</script>