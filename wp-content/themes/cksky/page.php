<?php get_header(); ?>


   
   
     <div id="user_info">
       
 <span id="ajax_page"></span>
 
   
   <a id="twriter" href="http://twitter.com/ckken" target="_blank"> </a>
    <a id="call" href="/index.php/other" target="_blank"> </a>
     <a id="emall" href="mailto:ckken@qq.com" target="_blank"> </a>
       <a id="rss" href="http://feeds2.feedburner.com/cksky" target="_blank"> </a>
   
   <div class="clear"></div>
   </div>



	<div id="content">
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
		
		<div class="post">
			
			<?php the_content('Read the rest of this entry &raquo;'); ?>
			 
		</div>
		
		<?php endwhile; ?>
        <div id="gg_content" class="archive">
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

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>

	</div>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>