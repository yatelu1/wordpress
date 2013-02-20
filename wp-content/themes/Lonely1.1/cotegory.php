<?php get_header(); ?>
<div id="container">
	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
	<div class="post" id="post-<?php the_ID(); ?>">
		<h2><a href="<?php the_permalink(); ?>" title="阅读更多关于《<?php the_title(); ?>》"><?php the_title(); ?></a></h2>
		<div class="entry">
			<div class="postmetadata">
				作者: <?php the_author_posts_link(); ?> 发表日期: <span><?php the_time('Y年m月d日'); ?></span> 分类: <?php the_category(', ') ?> 
                <?php the_tags('标签: ', ' , ' , ''); ?> 
				评论数: <?php comments_popup_link('0', '1', '%'); ?> 条 <?php edit_post_link('[编辑]'); ?>
			</div>
            <?php include('includes/thumbnail.php'); ?>
			<p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 400,"......"); ?></p>
            <div class="readmore">
            	<span><?php if(function_exists('the_views')) { echo"阅读次数: "; the_views(); } ?></span>
            	<span style="font-weight:700;"><a href="<?php the_permalink(); ?>" title="阅读更多关于《<?php the_title(); ?>》">阅读更多>></a></span>
            </div>         
		</div>
	</div>
	<?php endwhile; ?>
    <?php include (TEMPLATEPATH . '/includes/paginate.php'); ?>
	<?php else : ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><?php _e('抱歉，暂时没有搜索到您需要的内容！不过，以下内容或许能帮到您！'); ?></h2>
			<?php include (TEMPLATEPATH . '/404.php'); ?>
		</div>
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>