<?php
/*
Theme Name: AesRoom
Theme URI: http://dwlxjz.com/
Author: dwlxjz
Author URI: http://dwlxjz.com/
Description:None
Version: 1.0
*/
include('functions/theme-admin.php');
/*无插件分页函数*/
function pagination($query_string){   
	global $posts_per_page, $paged;   
	$my_query = new WP_Query($query_string ."&posts_per_page=-1");   
	$total_posts = $my_query->post_count;   
	if(empty($paged))
		$paged = 1;   
	$prev = $paged - 1;   
	$next = $paged + 1;   
	$range = 2; // only edit this if you want to show more page-links   
	$showitems = ($range * 2)+1;   
	  
	$pages = ceil($total_posts/$posts_per_page);   
	if(1 != $pages){   
		echo "<div class='pagination'><i class='lt'></i><i class='rt'></i><i class='lb'></i><i class='rb'></i>";   
		echo ($paged > 2 && $paged+$range+1 > $pages && $showitems < $pages)? "<a href='".get_pagenum_link(1)."'>最前</a>":"";   
		echo ($paged > 1 && $showitems < $pages)? "<a href='".get_pagenum_link($prev)."'>上一页</a>":"";   
		  
		for ($i=1; $i <= $pages; $i++){   
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){   
			echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";   
			}   
		}   
		echo ($paged < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($next)."'>下一页</a>" :"";   
		echo ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($pages)."'>最后</a>":"";   
		echo "</div>\n";   
	}   
}  


/*注册侧边栏小工具*/
if( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => '侧边栏',
        'before_widget' => '<div class="widget-wrap"><i class="lt"></i><i class="rt"></i><i class="lb"></i><i class="rb"></i><div class="widget %2$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
}


/*注册导航*/
register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'dwlxjz' ),
	) );


/*获取浏览次数*/
function getPostViews($postID){   
	$count_key = 'post_views_count';   
	$count = get_post_meta($postID, $count_key, true);   
	if($count==''){   
		delete_post_meta($postID, $count_key);   
		add_post_meta($postID, $count_key, '0');   
		return "0次";   
	}   
	return $count.'次';   
}


/*设置浏览次数*/
function setPostViews($postID) {   
	$count_key = 'post_views_count';   
	$count = get_post_meta($postID, $count_key, true);   
	if($count==''){   
		$count = 0;   
		delete_post_meta($postID, $count_key);   
		add_post_meta($postID, $count_key, '0');   
	}else{   
		$count++;   
		update_post_meta($postID, $count_key, $count);   
	}   
}  


//开启文章缩略图支持
 add_theme_support('post-thumbnails');
 //获取文章内首个附件图片的缩略图url
 function get_thumb($post_id){
    $args = array( 'post_type'=> 'attachment', 'numberposts'=> -1, 'post_status'=> null, 'post_parent'=> $post_id );
   $attachments = get_posts($args);
    if ($attachments) {
         echo wp_get_attachment_thumb_url($attachments[0]->ID);
     }
 }