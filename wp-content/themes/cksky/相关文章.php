 <?php 
   $tags = wp_get_post_tags($post->ID);
if ($tags) {?>
    <div id="readmore"> 
    <h3>相关文章</h3>         
 <ul>
<?php

$first_tag = $tags[0]->term_id;
$args=array(
'tag__in' => array($first_tag),
'post__not_in' => array($post->ID),
'showposts'=>10,
'caller_get_posts'=>1
);
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {
while ($my_query->have_posts()) : $my_query->the_post(); ?>
<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?> <?php comments_number(' ','(1)','(%)'); ?></a> </li>
<?php
endwhile;
}

?>
</ul>
<div class="clear"></div>
</div>
	<?php }?>		
             
		</div>
        
        
        <meta name="keywords" content="网站设计,外挂快讯,PHP编程,设计生活,比赛作品,cck,创意平坊,cck创意平坊"> 
<meta name="description" content="网站设计,外挂快讯,PHP编程,设计生活,比赛作品,dota互通作弊图,漫游开心农场外挂,cck创意平坊,我们的创意作坊"> 


      <!--相关文章备份-->
    
   <?php 
   $tags = wp_get_post_tags($post->ID);
if ($tags) {?>
    <div id="readmore"> 
    <h3>相关文章</h3>         
 <ul>
<?php

$first_tag = $tags[0]->term_id;
$args=array(
'tag__in' => array($first_tag),
'post__not_in' => array($post->ID),
'showposts'=>10,
'caller_get_posts'=>1
);
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {
while ($my_query->have_posts()) : $my_query->the_post(); ?>
<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> </li>
<?php
endwhile;
}

?>
</ul>
<div class="clear"></div>
</div>
	<?php }?>	  
    
<!--相关文章备份-->