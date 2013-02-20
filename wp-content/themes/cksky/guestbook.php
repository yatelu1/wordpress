<?php
/*
Template Name: Guestbook
*/
?>
<?php get_header(); ?>

  <div id="user_info">
       

 
   
   <a id="twriter" href="http://twitter.com/ckken" target="_blank"> </a>
    <a id="call" href="/index.php/other" target="_blank"> </a>
     <a id="emall" href="mailto:ckken@qq.com" target="_blank"> </a>
       <a id="rss" href="http://feeds2.feedburner.com/cksky" target="_blank"> </a>
   
   <div class="clear"></div>
   </div>

	<div id="content">
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
		
		<div class="post content_index">
			
           
            <h3 class="index"><a><?php the_title(); ?></a></h3>
            
			
			
			
			
			
	
			
      
    
             <p> <?php the_content(); ?>
             

             </p>
             
    
                 <div class="rss_c">



<img src="<?php bloginfo('stylesheet_directory'); ?>/images/r2.gif" />
欢迎订阅: <a href="http://fusion.google.com/add?feedurl=http://www.cksky.cn/index.php/feed" target="_blank">Google Reader</a> | <a href="http://www.xianguo.com/subscribe.php?url=http://www.cksky.cn/index.php/feed" target="_blank">鲜果</a> | <a href="http://www.zhuaxia.com/add_channel.php?url=http://www.cksky.cn/index.php/feed" target="_blank">抓虾</a> | <a href="http://9.douban.com/reader/subscribe?url=http://www.cksky.cn/index.php/feed" target="_blank">九点</a> | <a href="http://mail.qq.com/cgi-bin/feed?u=http://www.cksky.cn/index.php/feed" target="_blank">QQ邮箱</a> | <a href="http://reader.youdao.com/b.do?url=http://www.cksky.cn/index.php/feed" target="_blank">有道</a> | <a href="http://www.cksky.cn/index.php/feed">更多</a>

</div>
    <div class="clear"></div>
    
    




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