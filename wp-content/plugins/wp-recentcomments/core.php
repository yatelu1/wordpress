<?php

/**
 * Ajax 方法
 */
function rc_ajax(){

	// 翻页
	if($_GET['action'] == 'rc_ajax') {
		$argsf = $_GET["args"];
		$start = $_GET["start"];

		$args = str_replace('|', '&', $argsf);
		$args = str_replace('--', '=', $args);

		echo create_recentcomments($args, $start);
		die();

	// 查看详细信息
	} else if($_GET['action'] == 'rc_detail_ajax') {
		$argsf = $_GET["args"];
		$start = $_GET["start"];
		$id = $_GET["id"];

		echo create_rc_detail($id, $argsf, $start);
		die();
	}
}
add_action('init', 'rc_ajax');

/**
 * 获取最新评论列表
 * @param args		参数字符串
 * @param start		评论的开始位置
 * @return			生成的 HTML 字符串
 */
function create_recentcomments($args = '', $start = 0) {

	// AJAX 翻页时用的参数
	$argsf = str_replace('=', '--', $args);
	$argsf = str_replace('&', '|', $argsf);

	// 加载过程显示的文本
	$loading_text = __('Loading', 'wp-recentcomments');

	// 分列参数
	$args = rc_parse_args($args);

	if ($start < 0) {
		$start = 0;
	}

	// 在数据库中获取评论相关信息
	global $wpdb, $comments, $comment;

	// 是否 pingback 的 SQL 条件
	$sql_pingback = '';
	if ($args['pingback'] == 'false') {
		$sql_pingback = " AND comment_type != 'pingback'";
	}

	// 是否 trackback 的 SQL 条件
	$sql_trackback = '';
	if ($args['trackback'] == 'false') {
		$sql_trackback = " AND comment_type != 'trackback'";
	}

	// 是否显示管理员用户的 SQL 条件
	$sql_administrator = '';
	if ($args['administrator'] == 'false') {
		$sql_administrator = " AND comment_author_email NOT IN (SELECT A1.user_email FROM $wpdb->users A1, $wpdb->usermeta A2 WHERE A1.ID = A2.user_id AND A2.meta_key = 'wp_capabilities' AND A2.meta_value LIKE '%administrator%')";
	}

	// 显示密码保护文章的评论的 SQL 条件
	$post_protected = $_COOKIE['wp-postpass_' . COOKIEHASH];
	$sql_protected = " AND (comment_post_ID = ID AND (post_password = '' OR post_password = '" . $post_protected . "'))";

	// 显示私有文章的评论的 SQL 条件
	global $user_ID;
	$sql_private = " AND (comment_post_ID = ID AND (post_status != 'private' OR post_author = '" . $user_ID . "'))";

	// 准备多取一个, 以便获知是否有更多评论存在
	$size = $args['limit'] + 1;
	// SQL 查找数据集合
	$comments_query = "SELECT comment_author, comment_author_email, comment_author_url, comment_ID, comment_post_ID, comment_content, comment_type, comment_author_IP, comment_agent FROM $wpdb->comments, $wpdb->posts WHERE comment_approved = '1'" . $sql_protected . $sql_private . $sql_pingback . $sql_trackback . $sql_administrator . " ORDER BY comment_date_gmt DESC LIMIT " . $start . "," . $size;
	$comments = $wpdb->get_results($comments_query);
	// 如果能够获取多一个元组, 证明有更多评论存在, 需要显示 Older 按钮
	$has_older = (count($comments) - $args['limit'] > 0);
	// 有更多评论存在时, 删除最后那个多余的
	if ($has_older) {
		array_pop($comments);
	}

	// 获取最新评论列表
	$result = ''; $count = 0;
	if ($comments) {
		foreach ($comments as $comment) {

			// 如果访客昵称为空, 则将显示名字设为 "Anonymous"
			if ($comment->comment_author == '') {
				$comment->comment_author = __('Anonymous', 'wp-recentcomments');
			}

			// 用户头像
			$element_avatar = rc_get_avatar($args['avatar'], $args['avatar_position'], $args['avatar_size'], $args['avatar_default'], $comment->comment_author_email);

			// 获取摘要
			$comment_excerpt = preg_replace('/(\r\n)|(\n)/', '', $comment->comment_content); // 消灭换行符
			$comment_excerpt = rc_remove_blockquotes($comment_excerpt); // 消灭所有 blockquote 内容
			$comment_excerpt = preg_replace('/\<(.+?)\>/', '', $comment_excerpt); // 消灭所有标签
			$comment_excerpt = rc_substring($comment_excerpt, 0, $args['length'], $comment->comment_ID, $argsf, $start, $loading_text);

			// 处理摘要里的表情
			if ((strlen($comment_excerpt) > 0) && $args['smilies'] == 'true') {
				$comment_excerpt = convert_smilies($comment_excerpt);
			}

			// 获取信息
			if ($comment->comment_type == 'pingback') {
				$result .= '<li id="rc_item_' . ++$count . '" class="rc_item rc_pingback">' . sprintf('<div class="rc_info"><span class="rc_label">' . __('Pingback:') . '</span> %1$s</div>', get_comment_author_link()) . '</li>';
			} else if ($comment->comment_type == 'trackback') {
				$result .= '<li id="rc_item_' . ++$count . '" class="rc_item rc_trackback">' . sprintf('<div class="rc_info"><span class="rc_label">' . __('Trackback:') . '</span> %1$s</div>', get_comment_author_link()) . '</li>';
			} else if ($args['post'] == 'true') {
				$result .= '<li id="rc_item_' . ++$count . '" class="rc_item">' . $element_avatar . sprintf('<div class="rc_info"><span class="author_name">%1$s</span> </div>', get_comment_author_link()) . '<div class="rc_excerpt">
				<a target="_blank" href="'. get_permalink($comment->comment_post_ID) . '#comment-' . $comment->comment_ID . '">' . $comment_excerpt  . '</a>
				</div></li>';
			} else {
				$result .= '<li id="rc_item_' . ++$count . '" class="rc_item">' . $element_avatar . sprintf('<div class="rc_info"><span class="author_name">%1$s</span>' . rc_get_author_info() . '</div>', '<a href="'. get_permalink($comment->comment_post_ID) . '#comment-' . $comment->comment_ID . '">' . $comment->comment_author . '</a>') . '<div class="rc_excerpt">' . $comment_excerpt . '</div></li>';
			}

		} // foreach ($comments as $comment)

		// 新评论和老评论的开始位置
		$newer_start = $start - $args['limit'];
		$older_start = $start + $args['limit'];

		// Newest 按钮
		$newest = '';
		// 判断是否还有最新评论
		// 第一页不需要显示最新评论的链接
		// 第二页功能与 Newer 链接功能相同, 也不需显示
		// 第三页开始才有必要显示出来
		$has_newest = ($start >= $args['limit'] * 2);
		if ($has_newest) {
			$newest = '<div id="rc_newest"><a href="javascript:void(0);" onclick="RCJS.page(\'' . get_bloginfo('siteurl') . '\',\'' . $argsf . '\',0,\'' . $loading_text . '\');">' . __('&laquo; Newest', 'wp-recentcomments') . '</a></div>';
		}

		// Newer 按钮
		$newer = '';
		// 判断是否还有新评论
		// 只要前面还有新的评论, 就要显示.
		$has_newer = ($start > 0);
		if ($has_newer) {
			// 如果开始位置为负数, 将它修改为 0
			if ($newer_start < 0) {
				$newer_start = 0;
			}
			$newer = '<div id="rc_newer"><a href="javascript:void(0);" onclick="RCJS.page(\'' . get_bloginfo('siteurl') . '\',\'' . $argsf . '\',' . $newer_start . ',\'' . $loading_text . '\');">' . __('&laquo; Newer', 'wp-recentcomments') . '</a></div>';
		}

		// Older 按钮
		$older = '';
		if ($has_older) {
			$older = '<div id="rc_older"><a href="javascript:void(0);" onclick="RCJS.page(\'' . get_bloginfo('siteurl') . '\',\'' . $argsf . '\',' . $older_start . ',\'' . $loading_text . '\');">' . __('Older &raquo;', 'wp-recentcomments') . '</a></div>';
		}

		// 当需要显示 Newer 或 Older 按钮时才显示这一栏
		if (($has_newer || $has_older) && $args['navigator'] == 'true') {
			$result .= '<li id="rc_nav"><div>' . $newest . $newer . $older . '<div class="rc_fixed"></div></div></li>';
		}

		// 返回 HTML 格式的字符串
		return $result;

	} // if ($comments)
}

/**
 * 获取某个评论的详细信息
 * @param id			评论 ID
 * @param argsf			格式化的参数字符串
 * @param start			评论的开始位置
 * @param loading_text	加载文本
 */
function create_rc_detail($id, $argsf, $start) {

	// AJAX 翻页时用的参数
	$args = str_replace('|', '&', $argsf);
	$args = str_replace('--', '=', $args);

	// 加载过程显示的文本
	$loading_text = __('Loading', 'wp-recentcomments');

	// 分列参数
	$args = rc_parse_args($args);

	// 在数据库中获取评论相关信息
	global $wpdb, $comment;
	$comments = $wpdb->get_results("SELECT comment_author, comment_author_email, comment_author_url, comment_ID, comment_post_ID, comment_content, comment_date, comment_author_IP, comment_agent FROM $wpdb->comments WHERE comment_ID = " . $id);
	$comment = $comments[0];

	// 用户头像
	$element_avatar = rc_get_avatar($args['avatar'], $args['avatar_position'], $args['avatar_size'], $args['avatar_default'], $comment->comment_author_email);

	// 处理 blockquote
	$content = rc_remove_blockquotes_but_outermost($comment->comment_content);

	// 处理摘要里的表情
	if ((strlen($content) > 0) && $args['smilies'] == 'true') {
		$content = convert_smilies($content);
	}

	// 处理抛锚链接
	$content = preg_replace(array('/href="#/', '/href=\'#/'), array('href="'. get_permalink($comment->comment_post_ID) . '#', 'href=\''. get_permalink($comment->comment_post_ID) . '#'), $content);

	// 日期时间
	$date_format = __('Y/m/d', 'wp-recentcomments');
	$time_format = __('H:i', 'wp-recentcomments');
	$datetime = sprintf(__('%1$s - %2$s', 'wp-recentcomments'), mysql2date($date_format, $comment->comment_date), mysql2date($time_format, $comment->comment_date));

	// 组合 HTML 格式的字符串
	$result = '<li id="rc_item_1" class="rc_item">' . $element_avatar . '<div class="rc_info">';
	$result .= '<div class="author_name">' . get_comment_author_link() . '</div>';
	$result .= '<div class="post_title"><a href="'. get_permalink($comment->comment_post_ID) . '#comment-' . $comment->comment_ID . '">' . get_the_title($comment->comment_post_ID) . '</a></div>';
	$result .= '</div></li>';
	$result .= '<li id="rc_item_2" class="rc_item">' . $content . '</li>';
	$result .= '<li id="rc_nav">';
	$result .= '<a class="rc_back" href="javascript:void(0);" onclick="RCJS.page(\'' . get_bloginfo('siteurl') . '\',\'' . $argsf . '\',' . $start . ',\'' . $loading_text . '\');">' . __('&laquo; Back', 'wp-recentcomments') . '</a>';
	$result .= '<span class="rc_datetime">' . $datetime . '</span>';
	$result .= '<div class="rc_fixed"></div></li>';

	// 返回 HTML 格式的字符串
	return wpautop($result);
}

/**
 * 初始化参数
 * @param args			参数字符串
 */
function rc_parse_args($args) {

	// 默认参数
	$defaults = array(
		'limit' => 5,					// 最新评论的条目数量
		'length' => 45,					// 每条评论的字符长度
		'pingback' => 'true',			// 是否显示 pingback, true: 显示; false: 不显示
		'trackback' => 'true',			// 是否显示 trackback, true: 显示; false: 不显示
		'post' => 'true',				// 是否显示评论所在帖, true: 显示; false: 不显示
		'avatar' => 'true',				// 是否显示评论者头像, true: 显示; false: 不显示
		'avatar_size' => 48,			// 评论者头像纵横尺寸
		'avatar_position' => 'left',	// 评论者头像放置位置
		'avatar_default' => '',			// 评论者默认头像文件
		'navigator' => 'true',			// 是否显示翻页的导航, true: 显示; false: 不显示
		'administrator' => 'true',		// 是否显示管理员评论, true: 显示; false: 不显示
		'smilies' => 'fales'			// 是否要使用表情图标, true: 使用; false: 不使用
	);

	// 替换参数
	$args = wp_parse_args($args, $defaults);

	// 限定参数
	if ($args['limit'] < 1) {
		$args['limit'] = 1;
	} else if ($args['limit'] > 20) {
		$args['limit'] = 20;
	}
	if ($args['length'] > 15) {
		$args['length'] = 15;
	}
	if ($args['avatar_size'] < 8) {
		$args['avatar_size'] = 8;
	}
	if ($args['avatar_size'] > 96) {
		$args['avatar_size'] = 96;
	}
	if ($args['avatar_position'] != 'right') {
		$args['avatar_position'] = 'left';
	}
	if ($args['pingback'] != 'false') {
		$args['pingback'] = 'true';
	}
	if ($args['trackback'] != 'false') {
		$args['trackback'] = 'true';
	}
	if ($args['post'] != 'false') {
		$args['post'] = 'true';
	}
	if ($args['avatar'] != 'false') {
		$args['avatar'] = 'true';
	}
	if ($args['navigator'] != 'false') {
		$args['navigator'] = 'true';
	}
	if ($args['administrator'] != 'false') {
		$args['administrator'] = 'true';
	}
	if ($args['smilies'] != 'true') {
		$args['smilies'] = 'false';
	}

	return $args;
}

/**
 * 以字符为单位获得字符串子串
 * @param str			原字符串
 * @param start			起始位置
 * @param len			截取长度
 * @param comment_id	评论 ID
 * @param argsf			格式化的参数字符串
 * @param comment_start	评论的开始位置
 * @param loading_text	加载文本
 * @param code			接受编码
 */
function rc_substring($str, $start=0, $len=50, $comment_id, $argsf, $comment_start, $loading_text, $code='UTF-8') {

	if($code == 'UTF-8') {
		$pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
		preg_match_all($pa, $str, $t_str);

		if(count($t_str[0]) - $start > $len) {
			$ellipsis = '...';
			$str = join('', array_slice($t_str[0], $start, $len)) . $ellipsis;
		}

		$expand = ' <span class="rc_expand"><a href="javascript:void(0);" onclick="RCJS.detail(' . $comment_id . ',\'' . get_bloginfo('siteurl') . '\',\'' . $argsf . '\',' . $comment_start . ',\'' . $loading_text . '\');">' . __('&raquo;', 'wp-recentcomments') . '</a></span>';
		return $str . $expand;
	}
}

/**
 * 获取头像. 如果用户要求显示头像, 并且 WordPress 中包含获取头像的函数, 则生成头像的 HTML
 * @param show			是否显示头像
 * @param position		头像位置
 * @param size			头像尺寸
 * @param default		默认头像路径
 * @param email			评论者邮箱
 */
function rc_get_avatar($show, $position, $size, $default, $email) {

	$avatar = '';
	if ($show == 'true' && function_exists('get_avatar') && get_option('show_avatars')) {

		// 当默认头像来自 Internet 时
		if (substr(strtolower($default), 0, 7) == 'http://') {
			$file = attribute_escape($default);
			$avatar = '<div class="rc_avatar rc_' . $position . '">' . get_avatar($email, $size, $file) . '</div>';

		// 当默认头像来自 "/wp-recentcomments/avatars/" 目录时
		} else if ($default != '') {
			$file = 'wp-content/plugins/wp-recentcomments/avatars/' . $default;
			if (file_exists($file)) {
				$file = get_bloginfo('siteurl') . '/' . $file;
				$avatar = '<div class="rc_avatar rc_' . $position . '">' . get_avatar($email, $size, $file) . '</div>';
			}

		// 当不包含默认头像时
		} else {
			$avatar = '<div class="rc_avatar rc_' . $position . '">' . get_avatar($email, $size) . '</div>';
		}
	}

	return $avatar;
}

/**
 * 移除 HTML 字符串中所有 blockquote
 * @param str			HTML 字符串
 */
function rc_remove_blockquotes($str) {
	// 开头和结尾的标记
	$start_pattern = '<blockquote';
	$end_pattern = '</blockquote>';

	// 出现的次数
	$quote_count = substr_count(strtolower($str), $start_pattern);

	// 如果出现次数为 0, 不进行任何处理, 直接返回
	if ($quote_count <= 0) {
		return $str;

	// 如果出现次数为 1, 将这个 blockquote 内的全部内容移除
	} else if ($quote_count == 1) {
		$all_pattern = '/(\<blockquote(.*?)\>)(.*)(\<\/blockquote\>)/i';
		return preg_replace($all_pattern, '', $str);
	}

	// 如果出现次数大于 1
	// 找到第一个结尾出现的位置
	$end = strpos(strtolower($str), $end_pattern);

	// 处理所有 blockquote
	while ($end) {
		// 获得尾部之前的子串, 并在子串中找到相应的开头位置
		$str_before_end = substr($str, 0, $end);
		$start = strrpos(strtolower($str_before_end), $start_pattern);
		// 将 blockquote 部分除去, 并用分隔符隔开
		$sep = ' ';
		$str = substr_replace($str, $sep, $start, $end + strlen($end_pattern) - $start);
		// 找到下一个结尾的位置
		$end = strpos(strtolower($str), $end_pattern);
	}

	return $str;
}

/**
 * 移除 HTML 字符串中, 除最外层的所有 blockquote
 * @param str			HTML 字符串
 */
function rc_remove_blockquotes_but_outermost($str) {
	// 开头和结尾的标记
	$start_pattern = '<blockquote';
	$end_pattern = '</blockquote>';

	// 出现的次数
	$quote_count = substr_count(strtolower($str), $start_pattern);

	// 如果出现次数为 0 或 1, 不进行任何处理, 直接返回
	if ($quote_count <= 1) {
		return $str;
	}

	// 如果出现次数大于 1, 创建数组以存放字符串段落
	$paragraphs = array();

	// 找到第一个结尾出现的位置
	$end = strpos(strtolower($str), $end_pattern);

	// 处理所有 blockquote
	while ($end) {
		// 获得尾部之前的子串
		$str_before_end = substr($str, 0, $end);

		// 结尾之前, 开始部分的出现次数
		$quote_count = substr_count(strtolower($str_before_end), $start_pattern);

		// 如果只有一个开头, 证明这是最外层引用, 放到段落数组里面
		if ($quote_count == 1) {
			$paragraph = substr($str, 0, $end + strlen($end_pattern));
			array_push($paragraphs, $paragraph);
			$sep = '';
			$str = substr_replace($str, $sep, 0, $end + strlen($end_pattern));

		// 如果出现多次开头部分
		} else {
			// 在子串中找到相应的开头位置
			$start = strrpos(strtolower($str_before_end), $start_pattern);
			// 将 blockquote 部分除去, 并用分隔符隔开
			$sep = ' ';
			$str = substr_replace($str, $sep, $start, $end + strlen($end_pattern) - $start);
		}

		// 找到下一个结尾的位置
		$end = strpos(strtolower($str), $end_pattern);
	}

	// 循环所有段落, 并组合成新的 HTML 字符串
	if ($paragraphs) {
		$str_before = '';
		foreach ($paragraphs as $paragraph) {
			$str_before .= $paragraph;
		}
		return $str_before . $str;
	}

	return $str;
}

/**
 * 获取评论者信息
 */
function rc_get_author_info() {
	if (function_exists(display_commenter_info)) {
		return display_commenter_info('');
	}
}

?>
