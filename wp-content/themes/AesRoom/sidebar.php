<?php $options = get_option( 'AesRoom_theme_settings' ); ?>
<div id="sidebar">
		<div class="widget-wrap"><i class="lt"></i><i class="rt"></i><i class="lb"></i><i class="rb"></i>
			<div class="widget widget_search">	<form action="http://www.dwlxjz.com/" id="searchform" method="get">
			<label class="assistive-text" for="s"></label>
			<input type="text" placeholder="" id="s" name="s" class="field">
			<input type="submit" value="" id="searchsubmit" name="submit" class="submit">
			</form>
			</div>
		</div>
		<div class="widget-wrap">
			<i class="lt"></i>
			<i class="rt"></i>
			<i class="lb"></i>
			<i class="rb"></i>
			<div class="widget">
				<a href="#dialog" class="modalLink" title="点击下载最新主题"><img src="<?php bloginfo('template_url');?>/images/download.jpg" data-original="img/example.jpg" width="310" height="250"/></a>
			</div>
		</div>

		<div class="widget-wrap">
			<i class="lt"></i>
			<i class="rt"></i>
			<i class="lb"></i>
			<i class="rb"></i>
			<div class="widget">
				<div class="imgTitle"></div>
				<div id="imgBox">
					<?php 
						// 获得后台数据
						$cateId = $options['slide_id'];
						$cateNum =$options['slide_num'];
					?>
					<?php 
						query_posts("showposts=".$options['slide_id']."&cat=".$cateId)?>
					<ul>
						<?php while (have_posts()) : the_post(); ?>
						<li>
							<?php if ( has_post_thumbnail() ) { ?>

							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(array(310,250),array(
			
								'title'	=> get_the_title(),
							)); ?></a>
							<?php } else {?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/<?php echo rand(1,6)?>.jpg"  width="310" height="250" title="<?php the_title(); ?>"/></a>
							<?php } ?>
						</li>
						<?php endwhile; ?>
						
					</ul>
				</div>
				<div id="imgNum">
					<ul>
						<?php for($i=0;$i<$cateNum;$i++){
							if($i==0){
						?>
						<li>
							<span class="current"></span>
						</li>
						<?php
							}else{
						?>
						<li>
							<span></span>
						</li>
						<?php
							}
						} ?>
						
					</ul>
				</div>
			</div>
		</div>
		
		<!--
		<div class="widget-wrap">
			<div class="widget widget_recent_comments"><h2>近期评论</h2>
				<ul id="recentcomments">
					<?php 
						$limit_num = '6'; 
						$my_email = "'" . get_bloginfo ('admin_email') . "'"; 
						$rc_comms = $wpdb->get_results("
						 SELECT ID, post_title, comment_ID, comment_author, comment_author_email, comment_content
						 FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts
						 ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID)
						 WHERE comment_approved = '1'
						 AND comment_type = ''
						 AND post_password = ''
						
						 ORDER BY comment_date_gmt
						 DESC LIMIT $limit_num
						 ");
						$rc_comments = '';
						foreach ($rc_comms as $rc_comm) { //get_avatar($rc_comm,$size='50')
						$rc_comments .= "<li class='widget_c_li'>". get_avatar($rc_comm,$size='50') ."<span class='comment-au'>" . $rc_comm->comment_author . "</span>说<br/><a href='"
						. get_permalink($rc_comm->ID) . "#comment-" . $rc_comm->comment_ID
						//. htmlspecialchars(get_comment_link( $rc_comm->comment_ID, array('type' => 'comment'))) 
						. "' title='发表在 " . $rc_comm->post_title . "'>" . strip_tags($rc_comm->comment_content)
						. "</a></li>\n";
						}
						$rc_comments = convert_smilies($rc_comments);
						echo $rc_comments;
					?>
				</ul>
			</div>
		</div>
		-->
		<?php // 如果没有使用小工具才显示以下内容，否则会显示小工具的内容
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) :
		?>
		<div class="widget-wrap">
			<i class="lt"></i>
			<i class="rt"></i>
			<i class="lb"></i>
			<i class="rb"></i>
			<h2>主题简介</h2>
			<div class="widget">
				<p style="padding:10px;">远翔所做的第一个EShow主题,由于某些原因,做到一半以后,放弃了对其研究.感谢各位博友的支持,现推出AesRoom简洁版主题,
				寓意唯美空间,希望多多支持,以让我持续对其进行补充扩展。
				</p>
			</div>
		</div>
		<?php endif; ?>
</div>
<!--sidebar结束-->
