<?php get_header(); ?>
<div id="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h3><?php the_title('',' &raquo;'); ?></h3>
			<div class="post">
				<?php the_content(); ?>
			</div>
		</div>
		<?php comments_template(); ?>
		<?php endwhile; else: ?>
		<div class="post">哦！您要找的日志可能已经更换地址，重新搜索一下吧，或者点击<a title="Home" class="active" href="<?php echo get_option('home'); ?>/">这里</a>回首页看看吧</div>
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>