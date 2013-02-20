<?php $options = get_option( 'AesRoom_theme_settings' ); ?>
<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->
<?php if ( comments_open() ) : ?>
<div id="commentsbox">
	<i class="lt"></i>
	<i class="rt"></i>
	<i class="lb"></i>
	<i class="rb"></i>
<h3 id="comments"><?php comments_number('暂无评论,快发表您的言论吧.', '1 条评论', '% 条评论' );?></h3>

<?php if ( have_comments() ) : ?>
<ol class="commentlist">
<?php wp_list_comments(
	array(
		'avatar_size' => 55,
	));
?>
</ol>

<div class="comment-nav">
<div class="alignleft"><?php previous_comments_link() ?></div>
<div class="alignright"><?php next_comments_link() ?></div>
</div>

<?php endif; ?>
<?php else :
// comments are closed ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div id="comment-form">

<div id="respond" >
<div class="sing_ad">
	<i class="lt"></i>
	<i class="rt"></i>
	<i class="lb"></i>
	<i class="rb"></i>
	<?php 
		if($options['sing_ad']==""){
	?>
	<img src="<?php bloginfo('template_url');?>/images/ad.png" width="300" height="150"/>
	<?php
		}else{
	?>
	<img src="<?php echo $options['sing_ad'];?>" width="300" height="150"/>
	<?php
		}
	?>
</div>
<h3 id="comments-respond">留言给远翔</h3>

<div class="cancel-comment-reply">
<?php cancel_comment_reply_link(); ?>
</div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( is_user_logged_in() ) : ?>

<p>当前登录:<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">退出登录 &raquo;</a></p>

<?php else : ?>
<label for="author">您的昵称 <small><?php if ($req) echo "(必填)"; ?></small></label>
<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" />

<label for="email">邮箱 <small><?php if ($req) echo "(必填,不会被公开)"; ?></small></label>
<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" />

<label for="url">网站</label>
<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />


<?php endif; ?>

<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea><br />

<input name="submit" type="submit" id="commentSubmit" tabindex="5" value="确认留言" />
<?php comment_id_fields(); ?>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif;
// registration required and not logged in ?>

</div>
</div>
</div>
<?php else :
// comments are closed ?>
<?php endif;
// delete me and the sky will fall on your head ?>