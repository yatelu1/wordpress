<?php
	if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
// 自定义菜单
	register_nav_menus(
		array(
			'header-menu' => __( 'header-menu' )
		)
	);
/*
* 获取当前文章或页面别名的函数
*/
function the_slug() {
    $post_data = get_post($post->ID, ARRAY_A);
    $slug = $post_data['post_name'];
    return $slug;
};
/*
* 获取当前文章所属第一个分类别名的函数
*/
function the_category_slug(){
 $category = get_the_category();
 return ($category ? $category[0]->slug : "");
};
function get_category_root_id($cat) {
	$this_category = get_category($cat);   // 取得当前分类
while($this_category->category_parent) // 若当前分类有上级分类时，循环
{
	$this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类（往上爬）
}
	return $this_category->term_id; // 返回根分类的id号
};
?>