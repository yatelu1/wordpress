<?php get_header(); ?>

<!--  container -->
<div id="container">
<div id="lead">您的位置：<a href="<?php bloginfo('url'); ?>">首页</a> > <?php the_title(); ?> </div>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="entry">
					<p class="postmetadata">
							<span class="post-author"><?php the_author_posts_link(); ?></span>
							<span class="post-cat"><?php the_category(', ') ?></span>
							<span class="post-date"><?php the_time('Y/m/d') ?></span>
							<span class="post-comments"><?php comments_popup_link('给我留言', '1 条留言', '% 条留言'); ?></span>
							<span class="post-views"><?php if(function_exists('the_views')) {the_views();} ?></span>
							<span class="post-author"><?php edit_post_link('编辑',''); ?></span>
					</p>
					<?php the_content(); ?>
				</div>	
			</div>
		<?php endwhile; ?>
	<?php else : ?>
		<div class="sorry-post">
			<h2 >找不到相关页面 404</h2>
			<div class="entry">不好意思，您所查看的内容不再这里，您可以通过搜索工具查一下。</div>
			<div id="search-center"><?php include (TEMPLATEPATH . '/searchform.php'); ?></div>
			<div id="404-flash">
					<p>如有闲情可尝试一下下面的小游戏。如何不让猫咪跑出去？</p>
					<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="600" height="480" title="404-flash">
                     <param name="movie" value="http://www.simpleseo.cn/uploads/404-flash.swf" />
                     <param name="quality" value="high" />
                     <embed src="http://www.simpleseo.cn/uploads/404-flash.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="600" height="480"></embed>
					</object>
			</div>
		</div>
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>