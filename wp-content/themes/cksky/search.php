<?php get_header(); ?>

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
         
              </div>
             
           <p><?php   echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 300,"..."); ?></p>
		</div>
		
		<?php comments_template(); ?>
		
		<?php endwhile; ?>

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