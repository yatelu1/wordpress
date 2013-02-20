<?php get_header(); ?>
						<div class="s_position">
							<i class="lt"></i>
							<i class="rt"></i>
							<i class="lb"></i>
							<i class="rb"></i>
							<?php
								// If this is a category archive
								if (is_category()) {
									printf("<h3>栏目:
								<span class='cate_spe'>".single_cat_title('', false)."</span> 下的所有文章</h3>" );
									if (category_description()) echo '<p>'.category_description().'</p>';
								// If this is a tag archive
								} elseif (is_tag()) {
									printf("<h3>标签:
								<span class='cate_spe'>".single_tag_title('', false).'</span> 下的所有文章</h3>' );
									if (tag_description()) echo '<p>'.tag_description().'</p>';
								// If this is a daily archive
								} elseif (is_day()) {
									printf('<h3>
								'.get_the_time('Y年n月j日').'</h3>' );
								// If this is a monthly archive
								} elseif (is_month()) {
									printf('<h3>
									'.get_the_time('Y年n月').'</h3>' );
								// If this is a yearly archive
								} elseif (is_year()) {
									printf('<h3>
									'.get_the_time('Y年').'</h3>' );
									// If this is an author archive
								} elseif (is_author()) {
										echo '作者存档';
								// If this is a paged archive
								} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
									echo '博客存档';
								}
								?>
						</div>
		<?php
			if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<!-- Blog Post -->
		
		 <div class="post-box">
			<i class="lt"></i>
			<i class="rt"></i>
			<i class="lb"></i>
			<i class="rb"></i>
			<div class="post-head">
				<div class="post-title">
					<h2><a href="<?php the_permalink(); ?>" title="点击查看 <?php the_title(); ?> 链接:"><?php the_title(); ?></a></h2>
					<span class="comment_span"><?php comments_popup_link( "<span class='leave-reply'>" . __( '沙发空缺', 'san-kloud' ) . "</span>", __( '评论:1条', 'san-kloud' ), __( '评论:%条', 'san-kloud' ) ); ?></span>
				</div>
				<div class="post-img">
					<?php if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail(); ?>
					<?php } else {?>
					<img src="<?php bloginfo('template_url'); ?>/images/<?php echo rand(1,6)?>.jpg" />
					<?php } ?>
				</div>
				
				<div class="post-content">
					
					<p>
						<?php $content=get_the_content(); 
						if(strpos($content,"embed")){
							$first = stripos($content,"embed");
							$end = strripos($content,"</object>");
							$c = substr($content,$first,$end-$first-1);
							$embedPath = "<".$c.">";
						echo "<style>
						.post-box embed{
							width:520px;
							height:300px;
							}
							.post-content{
								height:auto ;
							}
					</style><div style='display:none'>".$embedPath."</div>"."<img src='http://www.dwlxjz.com/wp-content/themes/AesRoom/images/embed.png' title='点击播放视频' width='500px' height='150px' onclick='ceshi(this)'/>";
						}else{
							echo mb_strimwidth(strip_tags(apply_filters('the_excerpt', $post->post_content)), 0, 400,"...");
						}
						?>
					</p>
				</div>
			</div>
			<div class="post-bottom">
				<div class="post-time">
					<span><?php the_time('Y-m-d'); ?></span>
				</div>
				<div class="post-infos">
					<span class="tags"><?php the_tags('','&nbsp;'); ?></span><span class="cate"><?php the_category('&nbsp;') ?></span>
					<div class="post-readmore">
						<a href="<?php the_permalink() ?>" title="链接至文章正文!">阅读全文</a>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
		
		
		<?php pagination($query_string); ?>
		
		<?php else : ?>
		<h1 class="title"><a href="#" rel="bookmark">未找到</a></h1>
		<p>没有找到任何文章！</p>
		<?php endif; ?>
		</div>
<?php get_sidebar(); ?>


<?php get_footer(); ?>

