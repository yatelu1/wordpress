<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
		die (__('Please do not load this page directly. Thanks!'));
	}
?>
<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) { // if there's a password
	if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
?>
<h2><?php _e('Password Protected'); ?></h2>
<p><?php _e('Enter the password to view comments.'); ?></p>
<?php return;
	}
}
	/* This variable is for alternating comment background */
$oddcomment = 'alt';
?>
<!-- You can start editing here. -->
<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number('0 个回复', '1 个回复', '% 个回复' );?></h3>
	<?php if ( $comments ) : ?>
	<ol class="commentlist">
		<?php wp_list_comments();?>
	</ol>
	<?php else : // If there are no comments yet ?>
	<p><?php _e('No comments yet.'); ?></p>
	<?php endif; ?>
<?php else : // this is displayed if there are no comments so far ?>
<?php if ('open' == $post->comment_status) : ?>
	<!-- If comments are open, but there are no comments. -->
	<?php else : // comments are closed ?>
	<!-- If comments are closed. -->
	<p class="nocomments">Comments are closed.</p>
	<?php endif; ?>
<?php endif; ?>
<?php if ('open' == $post->comment_status) : ?>
	<div id="respond">
	<h3 id="postcomment">发表评论</h3>
	<div id="cancel-comment-reply"> 
		<?php cancel_comment_reply_link() ?>
	</div>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
	<p>您必须 <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">登录</a> 后才能发表评论。</p>
<?php else : ?>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>
	<p>您现在以 <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> 的身份登录. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">[退出登录]</a></p>
<?php else : ?>
	<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="40" tabindex="1" />
	<label for="author">昵称 <?php if ($req) echo "(*必填)"; ?></label></p>
	<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="40" tabindex="2" />
	<label for="email">邮件 <?php if ($req) echo "(*必填，但不会公开)"; ?></label></p>
	<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="40" tabindex="3" />
	<label for="url">网址 (选填)</label></p>
<?php endif; ?>
	<!--<p><strong>XHTML:</strong> <?php _e('您可以使用这些标签&#58;'); ?> <?php echo allowed_tags(); ?></p>-->
	<?php include(TEMPLATEPATH . '/includes/smiley.php'); ?>
	<p><textarea name="comment" id="comment" cols="60" rows="10" tabindex="4"></textarea></p>
	<p>
	<input name="submit" type="submit" id="submit" tabindex="5" value="发表评论" />
	<input name="reset" type="reset" class="tinput" id="reset" value="重 写" />
	<?php comment_id_fields(); ?>
	</p>
<?php do_action('comment_form', $post->ID); ?>
	</form>
<?php endif; // If registration required and not logged in ?>
	</div>
<?php endif; // if you delete this the sky will fall on your head ?>