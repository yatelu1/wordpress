<?php get_header(); ?>
<div id="main">
	<?php if (is_tag()) { ?><div class="post_nav">标签类目:<?php single_tag_title(); ?></div><?php } ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<h2><div class="time"><?php the_author() ?> | <?php the_category(',') ?> | <?php the_date(); ?></div><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<?php the_content(__('继续阅读 &raquo;')); ?>
		<div class="meta">
			<div class="alignleft"><?php the_tags(__(' '), '、'); ?></div>
			<div class="alignright"><?php comments_popup_link(__('没有评论 '), __('1条评论'), __('%条评论')); ?></div>
		</div>
	</div>
	<?php endwhile; else: ?>
	<div class="post">哦！您要找的日志可能已经更换地址，重新搜索一下吧，或者点击<a title="Home" class="active" href="<?php echo get_option('home'); ?>/">这里</a>回首页看看吧</div>
	<?php endif; ?>
	<div class="navigation">
		<span class="alignleft"><?php next_posts_link('&laquo; 更早的文章') ?></span>
		<span class="alignright"><?php previous_posts_link('较新的文章 &raquo;') ?></span>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>