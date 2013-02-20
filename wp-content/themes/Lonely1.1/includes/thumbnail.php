<div class="thumbnail_box">
	<div class="thumbnail">
		<?php if ( has_post_thumbnail() ) { ?>
		<a href="<?php the_permalink() ?>" rel="bookmark" title="阅读更多关于《<?php the_title(); ?>》"><?php the_post_thumbnail('thumbnail', array( 'alt' => trim(strip_tags( $post->post_title )), 'title' => trim(strip_tags( $post->post_title )))); ?></a>
		<?php } else { ?>
		<a href="<?php the_permalink() ?>" rel="bookmark" title="阅读更多关于《<?php the_title(); ?>》"><img src="<?php echo get_featcat_image(); ?>" alt="阅读更多关于《<?php the_title(); ?>》" /></a>
		<?php } ?>
	</div>
</div>