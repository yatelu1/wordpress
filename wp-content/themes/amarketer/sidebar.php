<!--  sidebar -->
	<div class="sidebar">
	<div class="sidebar-top"></div>
		<h3>搜索内容</h3>
			<div id="search"><?php include (TEMPLATEPATH . '/searchform.php'); ?></div>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
		<?php //wp_list_pages('title_li=<h3>Pages</h3>' ); ?>
		<h3>文章分类</h3>    
			<ul class="side-cat" >
			<?php wp_list_cats('sort_column=name&optioncount=0&hierarchical=0'); ?>
			</ul>       
		<h3>广告宣传</h3>
			<div class="side-ads" >
				广告宣传代码
			</div>
		<DIV id=tabs-form>
			<UL id=tabs>
			  <LI class=selectTab><A onMouseOver="selectTab('tabContent0',this)" href="javascript:void(0)">最新文章</A>  </LI>
			  <LI><A onMouseOver="selectTab('tabContent1',this)" href="javascript:void(0)">最新评论</A>  </LI>
			  <LI><A onMouseOver="selectTab('tabContent2',this)" href="javascript:void(0)">热门文章</A>   </LI>
			</UL>
			<DIV id=tabContent>
				<DIV class="tabContent selectTab" id=tabContent0>
					<?php get_archives('postbypost', 10); ?>
				</DIV>
				<DIV class=tabContent id=tabContent1>
					<?php get_recent_comments($no_comments=10,$before='<li>',$after='</li>', $show_pass_post=true); ?>					
				</DIV>
				<DIV class=tabContent id=tabContent2>					    
   					<?php if (function_exists('get_most_viewed')): ?>    
   					<?php get_most_viewed('post', 10);  ?>    
					<?php endif; ?>    
				</DIV>
			</DIV>
		</div>

		<?php  if ( is_home() || is_page() ) { ?>
		<h3>友情链接</h3>
			<ul class="side-links" >
			<?php get_links('2', '<li>', '</li>', '', 0, 'rand', 0, 0, 30); ?>	
			<li><a href="/link" title="交换链接"><strong>交换链接</strong></a></li>
			</ul>
		<?php } ?>
			
		<h3>订阅&功能</h3>
			<ul class="side-meta" >
			<li><a href="<?php bloginfo('rss2_url'); ?>">内容RSS</a></li>
			<li><a href="<?php bloginfo('comments_rss2_url'); ?>">评论RSS</a></li>
			<li><?php wp_loginout(); ?></li>
			</ul>
		<h3>标签</h3>
			<ul><?php wp_tag_cloud('smallest=10&largest=14'); ?></ul>

		<?php endif; ?>

	</div>
<!--  footer -->