/*幻灯片切换*/
var movepic;
function slide(){
	movepic = setInterval(function(){
		 var nowpic = jQuery("#imgBox ul li.current").index(),
			 nextpic = nowpic + 1;
		 if(nowpic == 3){
			 nextpic = 0;
		 }
		 fadePic(nowpic,nextpic);
	 },3000);
}
/*幻灯片切换逻辑*/
function fadePic(nowpic,nextpic){
	jQuery("#imgBox ul li").eq(nowpic).animate({'opacity':'0'},700).removeClass("current"); 
	var url = jQuery("#imgBox ul li img").eq($("#imgNum ul li span.current").index("#imgNum ul li span")).parent().attr("href");
	jQuery(".imgTitle").html("<a href='"+url+"'>"+jQuery("#imgBox ul li img").eq($("#imgNum ul li span.current").index("#imgNum ul li span")).attr("title")+"</a>");
	jQuery("#imgNum ul li span").eq(nowpic).removeClass("current");
	jQuery("#imgNum ul li span").eq(nextpic).addClass("current");
	jQuery("#imgBox ul li").eq(nextpic).animate({'opacity':'1'},700,function(){}).addClass("current");
}

$(function(){
	$("#nav li li").has('ul').children("a").append(" &raquo;");
	$("#nav li").has('ul').hover(
		function() {
			$(this).children("ul").slideDown(200);
		},
		function() {
			$(this).children("ul").slideUp(200);
		}
	);
    $('#menu li a').hover(
	function(){
		$(this).stop().animate({color:'#1daac4'},400)
	},
	function(){
		$(this).stop().animate({color:'#fff'},400)
	});
	 $('#menu li li a').hover(
	function(){
		$(this).stop().animate({color:'#1daac4'},400)
	},
	function(){
		$(this).stop().animate({color:'#fff'},400)
	});
	$('#sidebar li a,h2 a').hover(
	function(){
		$(this).stop().animate({color:'#00BFE1'},400)
	},
	function(){
		$(this).stop().animate({color:'#333'},400)
	});

	$('.post-img').hover(
	function(){
		$(this).find("div[class='wenzi']").css("opacity","0.7").stop().animate({marginTop:'-34px'},300);
		//$(this).find("div[class='wenzi']").stop().fadeTo('fast',0.7);
	},
	function(){
		$(this).find("div[class='wenzi']").stop().animate({marginTop:'2px'},300);
	});
	$('#link li a,#foot p a').hover(
	function(){
		$(this).stop().animate({color:'#000'},400);
	},
	function(){
		$(this).stop().animate({color:'#878787'},400);
	});
	$(".post-img").find("img").css({width:"150px",height:"105px",float:"left"});

	 $('a.modalLink').click(function(e){


        // cancel the default link behaviour
        e.preventDefault();


        // find the href of the link that was clicked to use as an id
        var id = $(this).attr('href');


        // assign the window with matching id to the activeWindow variable, move it to the center of the screen and fade in
        activeWindow = $('.window#' + id)
            .css('opacity', '0') // set to an initial 0 opacity
            .css('top', '50%') // position vertically at 50%
            .css('left', '50%') // position horizontally at 50%
            .fadeTo(500, 1); // fade to an opacity of 1 (100%) over 500 milliseconds


        // create blind and fade in
        $('#modal')
            .append('<div id="blind" />') // create a <div> with an id of 'blind'
            .find('#blind') // select the div we've just created
            .css('opacity', '0') // set the initial opacity to 0
            .fadeTo(500, 0.8) // fade in to an opacity of 0.8 (80%) over 500 milliseconds
            .click(function(e){
                closeModal(); // close modal if someone clicks anywhere on the blind (outside of the window)
            });


    });


    $('a.close').click(function(e){
            // cancel default behaviour
            e.preventDefault();


            // call the closeModal function passing this close button's window
            closeModal();
    });		


    function closeModal()
    {


        // fade out window and then move back to off screen when fade completes
        activeWindow.fadeOut(250, function(){ $(this).css('top', '-1000px').css('left', '-1000px'); });


        // fade out blind and then remove it
        $('#blind').fadeOut(250,	function(){	$(this).remove(); });


    }
	$('.post-title a').click(function(){
           $(this).html("正在加载中....");
    });	
	$('.post-readmore a').click(function(){
           $(this).html("正在加载中....");
    });	
	$("a[rel='tag']").attr("title","点击查看此标签下的所有亮点");
	jQuery("#imgBox ul li img").eq(0).addClass("current");
	var url = jQuery("#imgBox ul li img").eq($("#imgNum ul li span.current").index("#imgNum ul li span")).parent().attr("href");
	jQuery(".imgTitle").html("<a href='"+url+"'>"+jQuery("#imgBox ul li img").eq($("#imgNum ul li span.current").index("#imgNum ul li span")).attr("title")+"</a>");
	slide();
	$("#imgNum ul li span").click(function(){
				
                 clearInterval(movepic);
				 $("#imgNum ul li span").removeClass("current");
				 $(this).addClass("current");
				$("#imgBox ul li").animate({'opacity':'0'},700).removeClass("current");
				$("#imgBox ul li").eq($("#imgNum ul li span.current").index("#imgNum ul li span")).animate({'opacity':'1'},700,function(){}).addClass("current");
				var url = jQuery("#imgBox ul li img").eq($("#imgNum ul li span.current").index("#imgNum ul li span")).parent().attr("href");
	jQuery(".imgTitle").html("<a href='"+url+"'>"+jQuery("#imgBox ul li img").eq($("#imgNum ul li span.current").index("#imgNum ul li span")).attr("title")+"</a>");
				
				movepic = setInterval(function(){
					 var nowpic = $("#imgNum ul li span.current").index("#imgNum ul li span"),
						nextpic = nowpic+1;
					 if(nowpic == 3){
						 nextpic = 0;
					 }
					  fadePic(nowpic,nextpic);
				},3000);
                
             });
	
}); 