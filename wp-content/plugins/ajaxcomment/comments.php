<?php // Do not delete these lines
	// $comments = array_reverse($comments);
	global $ajaxpost, $comments_b, $total_comment, $comments_per_page;
	$comments_b = $comments;
	$total_comment = count($comments);
	$comments = array_slice($comments, -$comments_per_page);//$comments_per_page);
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
        if (!empty($post->post_password)) {
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {
				?>
				<p class="nocomments">This post is password protected. Enter the password to view comments.<p>
				<?php
				return;
            }
        }
	if(!$tablecomments && $wpdb->comments)
		$tablecomments = $wpdb->comments;
	// = $wpdb->get_results("SELECT * FROM $tablecomments WHERE comment_post_ID = '$id' AND comment_approved = '1' ORDER BY comment_date");
// You can start editing here
	$GLOBALS['comments_reply'] = array();

	function write_comment(&$c, $deep_id = -1, $color = true) {
		global $max_level;
		$comments_reply = $GLOBALS['comments_reply'];
		if ($c->comment_author_email== get_the_author_email())
			$style = ' class="mine"';
		else if ($color==true){$style=' class="borderc1"';$color=!$color;}
		else{$style=' class="borderc2"';$color=!$color;}
?>
		<li id="comment-<?php echo $c->comment_ID ?>" <?php echo $style?>>
        
		<div class="commenthead">
        <span><?php echo get_comment_author_link();?></span>
        
        发布于 &nbsp;&nbsp;<?php echo mysql2date('Y.m.d H:i', $c->comment_date);?><a name='comment-<?php echo $c->comment_ID ?>'></a></div>
		<div class="body">
			<div class="avatar_img"><?php if(function_exists('get_avatar'))echo get_avatar($c->comment_author_email,48); ?></div>
			<?php comment_text();?>
		</div>
        
		<div class="meta">
			<?php
			global $user_ID, $post;
			get_currentuserinfo();
			if (user_can_edit_post_comments($user_ID, $post->ID) || ($GLOBALS['cmtDepth'] < $max_level))
				//echo '[';
				// delete link
				if (user_can_edit_post_comments($user_ID, $post->ID)) {
					$deleteurl = get_bloginfo("siteurl") . '/wp-admin/comment.php?action=deletecomment&amp;p=' . $c->comment_post_ID . '&amp;c=' . $c->comment_ID;
					$deleteurl = wp_nonce_url($deleteurl, 'delete-comment_'.$c->comment_ID);	
					echo "<a href='$deleteurl' onclick='ajaxShowPost(\"$deleteurl\", \"comment-{$c->comment_ID}\", \"\", \"alert(\\\"comment is deleted\\\")\", \"delete\");return false;'>删除</a>";
					$spamurl = get_bloginfo("siteurl") . '/wp-admin/comment.php?action=deletecomment&amp;dt=spam&amp;p=' . $c->comment_post_ID . '&amp;c=' . $c->comment_ID;
					$spamurl = wp_nonce_url($spamurl, 'delete-comment_'.$c->comment_ID);
					echo "<a href='$spamurl' onclick='ajaxShowPost(\"$spamurl\", \"comment-{$c->comment_ID}\", \"\", \"alert(\\\"comment is spamed\\\")\", \"delete\");return false;'>举报</a>";
					edit_comment_link('编辑', '',(($GLOBALS['cmtDepth'] < $max_level)?'': ''));
				}
					if ($GLOBALS['cmtDepth'] < $max_level) {
						if ( get_option("comment_registration") && !$user_ID )
							echo '<a href="'. get_option('siteurl') . '/wp-login.php?redirect_to=' . get_permalink() .'">Log in to Reply</a> ]';
						else
							echo '<a href="javascript:moveForm('.$c->comment_ID.')" title="reply">回复</a>';
					}
			if (user_can_edit_post_comments($user_ID, $post->ID) || ($GLOBALS['cmtDepth'] < $max_level))
				echo '</div>';
					if ($comments_reply[$c->comment_ID]) {
						$id = $c->comment_ID;
						if($GLOBALS['cmtDepth'] < $max_level )
							echo '<ul>';
							$first_c = true;
		foreach($comments_reply[$id] as $c) {
							if ($first_c){$first_c=false;continue;}
							$GLOBALS['cmtDepth']++;
							if($GLOBALS['cmtDepth'] == $max_level)
								write_comment($c, $c->comment_ID, $color);
							else
								write_comment($c, $deep_id, $color);
							$GLOBALS['cmtDepth']--;
		}
						if($GLOBALS['cmtDepth'] < $max_level )
							echo '</ul>';
					}
					echo '</li>';
	}
?>



<div class="clear"></div>
<script type="text/javascript"> 
var blogurl="<?php echo get_settings('siteurl');?>"; 
var needemail="<?php echo get_option('require_name_email');?>";
var nowurl="<?php echo $post->ID;?>";
var md5 = "<?php echo md5(get_settings("siteurl"));?>";


$('.mine').corner();
$('.borderc1').corner();
$('#readmore').corner();

</script>
<link rel="stylesheet" href="<?php echo get_settings('siteurl')?>/wp-content/plugins/ajaxcomment/comment.css" type="text/css" media="screen" />

<h3 class="comment_h3">
<span style="float:right">
<script charset="utf8" type="text/javascript">cT="0";nc="#444444";nBgc="";nBorder="#196FCB";tc="#FFFFFF";tBgc="#19A1FE";tBorder="#196FCB";tDigg="%E6%8E%A8%E8%8D%90";tDugg="%E5%B7%B2%E8%8D%90";defaultItemUrl="WEB_URL";defaultFeedUrl ="http://www.cksky.cn/index.php/feed";</script><script type="text/javascript" charset="utf8" src="http://re.xianguo.com/api/diggthis.js"></script>
</span>

<?php comments_number(__('No Comments'), __('1 Comment'), __('% Comments'));?>

</h3>
<ul class="commentslist" id="comments">
	<?php
		if ($comments) :
			foreach ($comments as $c) {
				$GLOBALS['comments_reply'][$c->comment_ID][] = $c;
				if (isset($GLOBALS['comments_reply'][$c->comment_reply_ID]))
					$GLOBALS['comments_reply'][$c->comment_reply_ID][] = $c;
				else 
					$GLOBALS['comments_reply'][0][] = $c;
			}
			$GLOBALS['cmtDepth'] = 0;$color=true;
			foreach($GLOBALS['comments_reply'][0] as $cmt) {
				$GLOBALS['comment'] = &$cmt;
				write_comment($GLOBALS['comment'], '-1', $color);
				$color=!$color;
			}
		else:
		endif;
	?>
<?php $remain_comment = $total_comment - $comments_per_page;
if ($total_comment > $comments_per_page)
	echo "<a href='#' onclick='ajaxShowPost(blogurl+\"/wp-content/plugins/ajaxcomment/getcomments.php?id={$post->ID}&s=0&n=10000\", \"comments\", \"comments\");return false;'>$remain_comment old comments are not displayed. Click to display all comments</a>";
?>
</ul>
<?php if ('open' == $post->comment_status) : ?>
<div id="cmtForm">
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="../../themes/default/<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" onsubmit="AjaxSendComment();return false;">
<?php if ( $user_ID ) : ?>
<div id="user_action_c">
<p><a id="user_name_c" href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">退出 &raquo;</a></p>
<input type="checkbox" name="comment_email_back" id='comment_email_back' />发送邮件</div>
<?php else : ?>
<div id="caie">
<ul>
<li>
<input type="text" name="author" id="author" value="<?php if($comment_author){echo $comment_author;}else{echo $_COOKIE['cksky_author'];} ?>" tabindex="11" onclick="this.select();"/><label for="author"><?php _e('Name'); ?></label><span id="authorrequire"><?php _e(" (Required)");?></span></li>
<li>
<input type="text" name="email" id="email" value="<?php if($comment_author_email){echo $comment_author_email;}else{echo $_COOKIE['cksky_email'];} ?>" tabindex="12"  onclick="this.select();"/><label for="email"><?php _e('Mail');?></label><span id="emailrequire"><?php _e(" (Required, will not be published)");?></span></li>

<li><input type="text" name="url" id="url" value="<?php if($comment_author_url){echo $comment_author_url;}else{echo $_COOKIE['cksky_url'];} ?>" tabindex="13"  onclick="this.select();"/><label for="url"><?php _e('Website'); ?></label></li>
</ul>
</div>
<?php endif; ?>

<div id='commentarea'>
<div id='commentdiv'><textarea name="comment" id="comment" tabindex="14" rows="6" cols="70"></textarea></div>
<div id='copreview' ondblclick="comment_preview();"></div>
<div id='comoper'><input value="提交" name="submit" type="submit" tabindex="15"/>
<input value='预览' name="preview" type='button' onclick="javascript:comment_preview();" tabindex="16" id='prectr'/>
<input id="reRoot" type="button" onclick="javascript:moveForm(0)" style="display:none" value="取消" tabindex="17"/>
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
<input type="hidden" name="comment_reply_ID" id="comment_reply_ID" value="0" /></div>
</div>
<?php do_action('comment_form', $post->ID); ?>
</form>

<?php endif; // If registration required and not logged in ?>
</div>
<?php endif; // if you delete this the sky will fall on your head ?>
<?php echo '<script type="text/javascript" src="'.get_settings('siteurl').'/wp-content/plugins/ajaxcomment/comment.js"></script>';?>
