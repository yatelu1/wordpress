<?php get_header(); ?>
<div id="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h2><div class="time"><?php the_author() ?> | <?php the_category(',') ?> | <?php the_date(); ?></div><?php the_title(); ?></h2>
			<?php the_content(); ?>
					<div class="meta"><div class="alignleft"><?php the_tags(__(' '), '、'); ?></div></div>
		</div>
		<div class="post_nav">
			<span class="alignleft"><?php previous_post_link('&laquo; %link') ?></span>
			<span class="alignright"><?php next_post_link('%link &raquo;') ?></span>
		</div>
		<?php comments_template(); ?>
		<?php endwhile; else: ?>
		<div class="post">哦！您要找的日志可能已经更换地址，重新搜索一下吧，或者点击<a title="Home" class="active" href="<?php echo get_option('home'); ?>/">这里</a>回首页看看吧</div>
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>