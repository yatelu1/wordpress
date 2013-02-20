<?php
/*
Template Name: guestbook
*/
?>
<?php get_header(); ?>

<!--主体开始-->
					<div class="post-box">
						<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<h1><?php the_title(); ?> <?php echo '<strong>留言总数:</strong>'?><a href="#comment-list"> <?php comments_number('0','1','%'); ?></a></h1>
						<?php endwhile; ?>
						<?php the_content(); ?>
						<div class="comments-template">
							<?php comments_template(); ?>
						</div>
					</div>
			</div>
<?php get_sidebar(); ?>
<!--主体结束-->


<?php get_footer(); ?>
<!--底部结束-->
