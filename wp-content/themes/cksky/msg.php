<?php get_header(); ?>

	<div id="content">
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
		
		<div class="post content_index">
			
           
<?php comments_template('comments.php');?>            
			
			
			
			
			
	
			
      
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