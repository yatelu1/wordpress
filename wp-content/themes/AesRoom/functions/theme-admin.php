<?php
//主题设置初始化
function dwlxjz_settings_init(){
	//注册功能
	register_setting( 'dwlxjz_settings', 'AesRoom_theme_settings' );
}

//menu
//添加控制页
function dwlxjz_add_settings_page() {
add_menu_page( __( 'AesRoom主题设置' ), __( 'AesRoom主题设置' ), 'manage_options', 'dwlxjz-settings', 'dwlxjz_theme_settings_page');
}

add_action( 'admin_init', 'dwlxjz_settings_init' );
add_action( 'admin_menu', 'dwlxjz_add_settings_page' );

//选项
$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
$wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
array_unshift($wp_cats, "Choose a category"); 
function dwlxjz_theme_settings_page() {

global $wp_cats, $color_schemes;
if ( ! isset( $_REQUEST['updated'] ) )
//request-请求
$_REQUEST['updated'] = false;
?>

<div class="wrap">
<div id="icon-options-general" class="icon32"></div><h2>AesRoom主题设置面板</h2>

<div id="panel-content">
<?php if ( false !== $_REQUEST['updated'] ) : ?>
<div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
<?php endif; ?>
<form method="post" action="options.php">

<?php settings_fields( 'dwlxjz_settings' ); ?>
<?php $options = get_option( 'AesRoom_theme_settings' ); ?>
<div class="admin_bar">            
	<div class="admin_left">主题作者:</div>
	<div class="admin_right">此wordpress主题由<a href="http://www.dwlxjz.com/">远翔博客</a>设计制作</div>
</div>

<div class="admin_bar">
	<div class="admin_left"><?php _e( 'Favicon图标:' ); ?></div>
	<div class="admin_right"><input id="AesRoom_theme_settings[upload_favicon]" class="regular-text upload_field" type="text" size="36" name="AesRoom_theme_settings[upload_favicon]" value="<?php esc_attr_e( $options['upload_favicon'] ); ?>" />
	<label class="description abouttxtdescription" for="AesRoom_theme_settings[upload_favicon]" style="color:#21759B;font-weight:bold"><?php _e( '【网页图标地址(格式为.ico).】' ); ?></label>
	</div>
</div>

<div class="admin_bar">
	<div class="admin_left"><?php _e( 'logo图标:' ); ?></div>
	<div class="admin_right"><input id="AesRoom_theme_settings[logo]" class="regular-text upload_field" type="text" size="36" name="AesRoom_theme_settings[logo]" value="<?php esc_attr_e( $options['logo'] ); ?>" />
	<label class="description abouttxtdescription" for="AesRoom_theme_settings[logo]" style="color:#21759B;font-weight:bold"><?php _e( '【230*35像素.】' ); ?></label>
	</div>
</div>

<div class="admin_bar">
	<div class="admin_left"><?php _e( '幻灯设置:' ); ?></div>
	<div class="admin_right"><input id="AesRoom_theme_settings[slide_id]"  type="text" size="10" name="AesRoom_theme_settings[slide_id]" value="<?php esc_attr_e( $options['slide_id'] ); ?>" />
	<label class="description abouttxtdescription" for="AesRoom_theme_settings[slide_id]" style="color:#21759B;font-weight:bold"><?php _e( '【调用栏目ID.】' ); ?></label>
	<input id="AesRoom_theme_settings[slide_num]"  type="text" size="10" name="AesRoom_theme_settings[slide_num]" value="<?php esc_attr_e( $options['slide_num'] ); ?>" />
	<label class="description abouttxtdescription" for="AesRoom_theme_settings[slide_id]" style="color:#21759B;font-weight:bold"><?php _e( '【显示几张特色图片.】' ); ?></label>
	</div>
</div>

<div class="admin_bar">
	<div class="admin_left"><?php _e( '文章页广告设置:' ); ?></div>
	<div class="admin_right"><input id="AesRoom_theme_settings[sing_ad]" class="regular-text upload_field" type="text" size="36" name="AesRoom_theme_settings[sing_ad]" value="<?php esc_attr_e( $options['sing_ad'] ); ?>" />
	<label class="description abouttxtdescription" for="AesRoom_theme_settings[sing_ad]" style="color:#21759B;font-weight:bold"><?php _e( '【300*150像素.】' ); ?></label>
	</div>
</div>

<div class="admin_bar">
	<div class="admin_left"><?php _e( '首页关键字:' ); ?></div>
	<div class="admin_right"><input id="AesRoom_theme_settings[index_key]" class="regular-text upload_field" type="text" size="36" name="AesRoom_theme_settings[index_key]" value="<?php esc_attr_e( $options['index_key'] ); ?>" />
	<label class="description abouttxtdescription" for="AesRoom_theme_settings[index_key]" style="color:#21759B;font-weight:bold"><?php _e( '【设置您网站的关键字(英文逗号隔开).】' ); ?></label>
	</div>
</div>


<div class="admin_bar">
	<div class="admin_left"><?php _e( '描述:' ); ?></div>
	<div class="admin_right">
		<textarea id="AesRoom_theme_settings[index_desc]" class="regular-text upload_field"  name="AesRoom_theme_settings[index_desc]"><?php esc_attr_e( $options['index_desc'] ); ?></textarea>
	</div>
</div>

<div class="admin_bar">
	<div class="admin_left"><?php _e( '网站栏目一览:' ); ?></div>
	<div class="admin_right">
		<ul>
		<?php
			$category_ids = get_all_category_ids();
			foreach($category_ids as $cat_id) {
				$cat_name = get_cat_name($cat_id);
			  echo  "<li>".$cat_name.'['.$cat_id .']';
			  ?>
			  <input id='AesRoom_theme_settings[<?php echo $cat_id ?>]' name='AesRoom_theme_settings[<?php echo $cat_id ?>]' value="<?php esc_attr_e($options[$cat_id]); ?>"/>
			 <input id='AesRoom_theme_settings[<?php echo $cat_name ?>]' name='AesRoom_theme_settings[<?php echo $cat_name ?>]' value="<?php esc_attr_e($options[$cat_name]); ?>"/>
			  <span style='color:#21759B;font-weight:bold'>[关键字][描述]</span></li>
			<?php }
		?>
		</ul>
	</div>
</div>

<div class="admin_bar">
	<div class="admin_left"><?php _e( '统计代码:' ); ?></div>
	<div class="admin_right">
		<textarea id="AesRoom_theme_settings[analytics]" class="regular-textarea upload_field"  name="AesRoom_theme_settings[analytics]"><?php esc_attr_e( $options['analytics'] ); ?></textarea>
	</div>
</div>

<div class="admin_bar">
	<div class="admin_left"><input type="submit" class="button-primary" value="<?php _e( '保存设置' ); ?>" /></div>
</div>
</form>
</div><!-- END wrap -->

<?php
	echo "<link type='text/css' rel='stylesheet' href='http://localhost/wp-content/themes/AesRoom/functions/functions.css'/>";
}?>
