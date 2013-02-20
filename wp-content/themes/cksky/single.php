<?php get_header(); ?>

	<div id="content">
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
		
		<div class="post content_index">
			
           
            <h1><a><?php the_title(); ?></a></h1>
            
			
			
			
			
			
	
			
      
      <div class="wenzhang_info">
      
          <?php the_author_posts_link(); ?>
          / <?php the_time('F jS, Y') ?>
          / <?php comments_popup_link(__('No Comments /', 'kubrick'), __('1 Comment /', 'kubrick'), __('% Comments /', 'kubrick'), '', __('Comments Closed /', 'kubrick') ); ?>
		  <?php the_tags(__('Tags:', 'kubrick') . ' ', ', ', '/'); ?>
		  <?php printf(__('Posted in %s', 'kubrick'), get_the_category_list(', ')); ?>
              / <?php if(function_exists('the_views')) {the_views();} ?>
              </div>
             <p> <?php the_content(); ?>
             

             </p>
             
    
                 <div class="rss_c">



<img src="<?php bloginfo('stylesheet_directory'); ?>/images/r2.gif" />
欢迎订阅: <a href="http://fusion.google.com/add?feedurl=http://www.cksky.cn/index.php/feed" target="_blank">Google Reader</a> | <a href="http://www.xianguo.com/subscribe.php?url=http://www.cksky.cn/index.php/feed" target="_blank">鲜果</a> | <a href="http://www.zhuaxia.com/add_channel.php?url=http://www.cksky.cn/index.php/feed" target="_blank">抓虾</a> | <a href="http://9.douban.com/reader/subscribe?url=http://www.cksky.cn/index.php/feed" target="_blank">九点</a> | <a href="http://mail.qq.com/cgi-bin/feed?u=http://www.cksky.cn/index.php/feed" target="_blank">QQ邮箱</a> | <a href="http://reader.youdao.com/b.do?url=http://www.cksky.cn/index.php/feed" target="_blank">有道</a> | <a href="http://www.cksky.cn/index.php/feed">更多</a>

</div>
    <div class="clear"></div>
    
    

<div id="gg_content">
<script type="text/javascript"><!--
google_ad_client = "pub-8884570557731258";
/* 分页内容468x60, 创建于 09-5-27 */
google_ad_slot = "7031986658";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src=" http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

 </div>



<?php if (function_exists('ajaxrp')) ajaxrp(); ?>
	</div>	
		<?php comments_template(); ?>
		
        
        

     
        
		<?php endwhile; ?>

		<div class="navigation">
		
            <?php wp_pagenavi(); ?>   
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>
    
    
    

	</div>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>