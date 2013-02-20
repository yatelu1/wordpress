<?php get_header(); ?>

 <div id="commend_h">  
     <div class="recommend_r_h"></div>
        <div class="recommend_l_h"></div>
        <div class="clear"></div>
   </div>
   <div id="recommend">
   
  <div class="a_combox">
  <img src="/gg/banner.gif" />
 <!--
<script language="javascript" src="/gg/flash.js"></script>
       <div id="redianxinwen"> 
         
            <p> 
                <a href='#'> 
                    <img src='/gg/zhaoxin 620-170.gif' alt='' /> 
                </a> 
            </p> 
          <p> 
                <a href='#'> 
                    <img src='/gg/about.gif' alt='' /> 
                </a> 
            </p> 
          
        
        </div> 
        <script type="text/javascript"> 
	
		
            var redianxinwenflash = new FlashPicture("redianxinwen")
            
            redianxinwenflash.Width = 620;
            redianxinwenflash.Height = 170;
            redianxinwenflash.AutoTime = 3;
            redianxinwenflash.Tween = 2;
            redianxinwenflash.TitleAlpha = 0;
            redianxinwenflash.ShowButton = 1;
            redianxinwenflash.TitleBackground = "FF6600";
            redianxinwenflash.ButtonColor = "FF6600";
            redianxinwenflash.ButtonOver = "000033";
            redianxinwenflash.TitlePosition = 10;
            redianxinwenflash.Show();
            
        </script> 


-->
  
   </div>
   
   <div id="tagbox">
   <h1 class="recommend_title"></h1>
   
   
   <script type="text/javascript"><!--
google_ad_client = "pub-8884570557731258";
/* 首页头部234x60, 创建于 09-5-27 */
google_ad_slot = "3193814506";
google_ad_width = 234;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src=" http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
 
   </div>
   <div class="clear"></div>
   
   </div>

<div id="commend_f">  
    <div class="recommend_r_f"></div>
     <div class="recommend_l_f"></div>
      <div class="clear"></div>
   </div>
   
     <div id="user_info">
        <span><?php if(!empty($_COOKIE['cksky_author'])){echo "<strong>".$_COOKIE['cksky_author']."</strong>欢迎你再次光临CKSKY.CN,有你的参与是本站的荣幸";}?></span>
   <a id="twriter" href="http://twitter.com/ckken" target="_blank"> </a>
    <a id="call" href="/index.php/other" target="_blank"> </a>
     <a id="emall" href="mailto:ckken@qq.com" target="_blank"> </a>
    <a id="rss" href="http://feeds2.feedburner.com/cksky" target="_blank"> </a>
   <div class="clear"></div>
   </div>
   <div id="index_box_head">
   <?php wp_pagenavi(); ?>
   </div>
     <div class="line"></div>




	<div id="content">
    
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
		
		<div class="post">
			
           
            <h1><img src="<?php bloginfo('stylesheet_directory'); ?>/images/tb1.gif" /><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
            
			
     
			 <div class="wenzhang_info">
          <?php the_author_posts_link(); ?>
          / <?php the_time('F jS, Y') ?>
          / <?php comments_popup_link(__('No Comments /', 'kubrick'), __('1 Comment /', 'kubrick'), __('% Comments /', 'kubrick'), '', __('Comments Closed /', 'kubrick') ); ?>
		  <?php the_tags(__('Tags:', 'kubrick') . ' ', ', ', '/'); ?>
		  <?php printf(__('Posted in %s', 'kubrick'), get_the_category_list(', ')); ?>
          / <?php if(function_exists('the_views')) {the_views();} ?>
              </div>
              
               <?php 
              $szPostContent = $post->post_content; 
              $szSearchPattern = '~<img [^\>]*\ />~'; // 搜索所有符合的图片 
              preg_match_all( $szSearchPattern, $szPostContent, $aPics ); 
              $iNumberOfPics = count($aPics[0]); // 检查一下至少有一张图片 
              if ( $iNumberOfPics > 0 ) { 
             
              echo '<div class="archive_c">'.$aPics[0][0].'</div>'; 
      
              }; 
            
              ?>
             
               <p><?php   echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 300,"..."); ?></p>
             
		</div>
		
        
        
		<?php comments_template(); ?>
		
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

		<div class="list_page">
		<?php wp_pagenavi(); ?>   
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>

	</div>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>