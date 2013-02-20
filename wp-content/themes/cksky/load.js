jQuery('#entry-post-<?php the_ID() ?>').click(function() {
<!-- 点击之后再替换URL成"#",因为我觉得链接是要全部输出来才好，毕竟要让搜索引擎收录的。 -->
jQuery('#entry-post-<?php the_ID() ?>').attr("href","#");
<!-- #ajaxPost 在加载成功前就显示等待加载之类的文字 -->
jQuery('#ajaxPost').html('Loading......');
jQuery.ajax({ 
<!-- 访问的链接 -->
url : "<?php bloginfo('home') ?>/?p=<?php the_ID() ?>", 
<!-- 传入的用来判断的参数 -->
data : "cck=1",
dataType : "html",
<!-- 这里为了不让在请求后将data附加在URL上，所以请不要用默认的GET  -->
type : "post",
success : function(message){
<!-- message 就是已经读取完毕的内容了 用innerHTML或者jQuery的方法输出到#ajaxPost都可以-->
document.getElementById("ajaxPost").innerHTML = message;
<!-- 下面是为了执行massage中的JS innerHTML后不能执行JS的问题也可以用这个方法轻松解决-->
var script = new Array();
script = jQuery("#ajaxPost script");
for (var i=0; i<script.length; i++) {
eval (jQuery(script[i]).html());
}
},
<!-- 抛出错误的话  -->
error : function(result) {
alert(result.responseText);
document.getElementById("ajaxPost").innerHTML = '<div  style="margin-bottom:800px;  padding-left:60px; padding-top:20px;"><h2>AJAX Error...<h2></div>';
}
});
});