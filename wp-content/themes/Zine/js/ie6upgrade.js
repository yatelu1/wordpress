function cookie(a,b,c,e){if(b==undefined){a+="=";b=document.cookie.split(";");for(c=0;c<b.length;c++){for(e=b[c];e.charAt(0)==" ";)e=e.substring(1,e.length);if(e.indexOf(a)==0)return decodeURIComponent(e.substring(a.length,e.length))}return null}else{var f="";if(c){f=new Date;f.setTime(f.getTime()+c*864E5);f="; expires="+f.toGMTString()}document.cookie=a+"="+b+f+"; path=/"+(e?";domain="+e:"")}};var scriptList=document.getElementsByTagName("script"),scriptLen=scriptList.length,scriptSrc;for(var i=scriptLen-1;i>=0;i--){if(scriptList[i].src.indexOf("/js/ie6upgrade.js")>-1){scriptSrc=scriptList[i].src.substring(0,scriptList[i].src.lastIndexOf('/')-2);break}}if(cookie("ie6upgrade")!="true"){function closeIe6(){var ie6upgrade=document.getElementById("ie6upgrade");ie6upgrade.parentNode.removeChild(ie6upgrade);document.getElementsByTagName("body")[0].style.cssText="margin-top:0;zoom:1";cookie("ie6upgrade","true");};var cssText="body{background-attachment: fixed;margin-top:30px}#ie6upgrade{overflow:hidden;z-index:998;line-height:16px;height:16px;position:absolute;top:expression(documentElement.scrollTop);left:0;background:#FFE345 url("+scriptSrc+"images/ie6upgrade.png) repeat-x 0 100%;padding-top:7px;height:23px;width:expression(body.clientWidth<=960?\"960px\":\"100%\");border-color:#EB0;border-style:solid;border-width:0;border-bottom-width:expression(documentElement.scrollTop>0?\"1px\":\"0\")}#ie6upgrade a{text-decoration:underline;margin-right:7px;color:#039;background:url("+scriptSrc+"images/ie6upgrade.png) no-repeat left top;padding-left:20px;height:16px;line-height:16px;display:inline-block}#ie6upgrade a.wb{background-position:0 -80px;text-decoration:none;color:#000;margin-left:5px}#ie6upgrade a.cr{background-position:0 -16px}#ie6upgrade a.fx{background-position:0 -32px}#ie6upgrade a.op{background-position:0 -48px}#ie6upgrade a.ct{background-position:0 -64px;float:right;width:16px;height:16px;font-size:0;padding:0}";var ie6css=document.createElement("style");ie6css.setAttribute("type","text/css");document.getElementsByTagName("head")[0].appendChild(ie6css);ie6css.styleSheet.cssText=cssText;var ie6div=document.createElement("div");ie6div.id="ie6upgrade";ie6div.innerHTML="<a href='###' class='ct' title='关闭提示' onclick='closeIe6();return false'></a><a target='_blank' href='http://windows.microsoft.com/zh-CN/internet-explorer/downloads/ie' class='wb'>您正在使用的Internet Explorer浏览器版本过旧，推荐您使用现代高速浏览器，点击此处免费升级</a><a target='_blank' href='http://windows.microsoft.com/zh-CN/internet-explorer/downloads/ie' class='ie'>IE8 浏览器</a><a target='_blank' href='http://www.google.com/chrome/?hl=zh-CN' class='cr'>谷歌浏览器</a><a target='_blank' href='http://firefox.com.cn/' class='fx'>火狐浏览器</a><a target='_blank' href='http://www.opera.com/browser/' class='op'>Opera浏览器</a>";document.body.appendChild(ie6div);}