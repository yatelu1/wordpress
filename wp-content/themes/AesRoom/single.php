<?php get_header(); ?>

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<?php setPostViews(get_the_ID()); ?>
				<div class="s_position">
					<i class="lt"></i>
					<i class="rt"></i>
					<i class="lb"></i>
					<i class="rb"></i>
					<span class="index_icon"><a href="<?php bloginfo('url'); ?>">首页</a></span>>>文章阅读
				</div>
				<div class="s_content">
					<i class="lt"></i>
					<i class="rt"></i>
					<i class="lb"></i>
					<i class="rb"></i>
					<div class="s_panel">
						<div class="before"><span>上一篇:</span><?php if (get_previous_post()) { 

        previous_post_link('%link');

    } else {

        echo "到头啦.";

    } ?></div>
						<h2><?php if(is_sticky()) echo '<span>[置顶]</span>'; the_title(); ?></h2>
						<div class="s_info">
							<span class="date"><?php the_time('Y-m-d H:i'); ?></span>
							<span class="view"><?php echo getPostViews(get_the_ID()); ?></span>
							<span class="comt"><a href="#comment-list"><?php comments_number('0','1','%'); ?></a></span>
							<?php if (get_the_tags()): ?>
							<span class="tags"><?php the_tags('','&nbsp;'); ?></span>
							<?php endif; ?>
							<?php edit_post_link( __('编辑文章'), '<span class="edit">', '</span>' ); ?>
							<?php if (comments_open()) : ?><span class="ico cmt add"><a href="#respond">发表评论</a></span><?php endif; ?>
						</div>
							<?php the_content(); ?>
						<div class="next"><span>下一篇:</span><?php if (get_next_post()) { 

       next_post_link('%link');

    } else {

        echo "到底啦.";

    }?></div>

					</div>

				</div>
				<?php if (comments_open()) comments_template( '', true ); ?></div>
			<?php endwhile; ?>

			

<?php get_sidebar(); ?>
<?php get_footer(); ?>
