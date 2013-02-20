<?php get_header(); ?>

<!--  container -->
<div id="container">
<div id="lead">您的位置：<a href="<?php bloginfo('url'); ?>">首页</a> > <?php the_category(', ') ?> > <?php the_title(); ?> </div>
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
					<div class="ps">
						本文地址：<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;文章出处：<a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a>
						<p>转载请以链接形式注明原始出处和作者，谢绝不尊重版权者抄袭！</p>
					</div>
					<p class="post-tag"><?php the_tags(); ?></p>
				</div>	
			</div>
		<?php endwhile; ?>
		<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&laquo; 上一页') ?></div>
				<div class="alignright"><?php previous_posts_link('下一页 &raquo;') ?></div>
		</div>
		<div class="comments-template">
		<?php comments_template(); ?>
		</div>
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