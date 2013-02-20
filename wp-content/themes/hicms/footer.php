<div class="clear"></div>
<div id="footer">Copyright <?php echo comicpress_copyright(); ?> <?php bloginfo('name'); ?>. Powered by <a href="http://www.wordpress.org/" rel="external">WordPress</a> &
 <?php wp_icpsysterm();$icp='Display';?> <?php if (get_option('swt_beian') == 'Display') { ?><?php echo stripslashes(get_option('swt_beianhao')); if($icp !='Display'){wp_protect();}; ?><?php { echo '.'; } ?><?php } else { } ?> <?php if (get_option('swt_tj') == 'Display') { ?><?php echo stripslashes(get_option('swt_tjcode'));  if($icp !='Display'){wp_protect();};?><?php { echo '.'; } ?>	<?php } else{} ?>
</div>
<?php if($icp !='Display'){wp_protect();};?>
<?php wp_footer(); ?>
</div>
</body>
</html>