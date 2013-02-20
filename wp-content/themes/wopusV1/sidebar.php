<div id="sidebar">
	<ul>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
		<li><h4>最新日志</h4>
			<?php query_posts('showposts=10'); ?>
			<ul>
				<?php while (have_posts()) : the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile;?>
			</ul>
		</li>
		<li><h4>最新评论</h4>
			<?php
			global $wpdb;
			$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
			comment_post_ID, comment_author, comment_date_gmt, comment_approved,
			comment_type,comment_author_url,
			SUBSTRING(comment_content,1,33) AS com_excerpt
			FROM $wpdb->comments
			LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
			$wpdb->posts.ID)
			WHERE comment_approved = '1' AND comment_type = '' AND
			post_password = ''
			ORDER BY comment_date_gmt DESC
			LIMIT 10";
			$comments = $wpdb->get_results($sql);
			$output = $pre_HTML;
			$output .= "\n<ul>";
			foreach ($comments as $comment) {
			$output .= "\n<li>".strip_tags($comment->comment_author)
			.":" . "<a href=\"" . get_permalink($comment->ID) .
			"#comment-" . $comment->comment_ID . "\" title=\"on " .
			$comment->post_title . "\">" . strip_tags($comment->com_excerpt)
			."</a></li>";
			}
			$output .= "\n</ul>";
			$output .= $post_HTML;
			echo $output;?>	
		</li>
		<li><h4>日志存档</h4>
			<form class="sidebar_box" id="archiveform" action=""> 
				<select name="archive_chrono" onchange="window.location = 
				(document.forms.archiveform.archive_chrono[ 
				document.forms.archiveform.archive_chrono.selectedIndex].value);"> 
				<option value=''>请选择月份查看</option> 
				<?php wp_get_archives('type=monthly&format=option&show_post_count=true'); ?> 
				</select> 
			</form>
		</li>
		<li><h4>友情链接</h4>
			<ul>
				<li><a href="http://www.wopus.org">Wopus中文博客平台</a></li>
				<li><a href="http://themes.wopus.org">WordPress主题站</a></li>
				<li><a href="http://plugins.wopus.org">WordPress插件站</a></li>
				<li><a href="http://tool.wopus.org">Wopus博客工具</a></li>
				<li><a href="http://help.wopus.org">Wopus帮助</a></li>
				<li><a href="http://bbs.wopus.org">Wopus论坛</a></li>
			</ul>
		</li>
		<?php endif; ?>
	</ul>
</div>
