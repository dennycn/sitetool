<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<link href="/sitetool/images/toolsite.css" rel="stylesheet" type="text/css" />
<script src="/sitetool/images/globals.js" type="text/javascript"></script>
<script src="/sitetool/images/home.js" type="text/javascript"></script>
<script type="text/javascript">

<?php
 // forbid error/warning notice
 error_reporting (E_ALL & ~E_NOTICE);

 // set title
 if($hu == 'js'){
 	$uu = 'JS加密/解密 - ';
 }elseif($hu == 'utf'){
 	$uu = 'UTF-8编码转换工具 - ';
 }elseif($hu == 'unicode'){
 	$uu = 'Unicode编码转换工具 - ';
 }elseif($hu == 'sharelink'){
 	$uu = '友情链接 - ';
 }elseif($hu == 'meta'){
 	$uu = 'META信息检测 - ';
 }elseif($hu == 'mds'){
 	$uu = 'MD5加密工具 - ';
 }elseif($hu == 'ids'){
 	$uu = '身份证号码值查询 - ';
 }elseif($hu == 'htmlubb'){
 	$uu = 'HTML/UBB代码转换工具 - ';
 }elseif($hu == 'htmljs'){
 	$uu = 'HTML/JS互转 - ';
 }elseif($hu == 'eseach'){
 	$uu = '搜索蜘蛛、机器人模拟工具 - ';
 }elseif($hu == 'density'){
 	$uu = '关键词密度检测 - ';
 }elseif($hu == 'countryym'){
 	$uu = '国家域名查看 - ';
 }elseif($hu == 'yb'){
 	$uu = '邮编区号查询 - ';
 }elseif($hu == 'whois'){
 	$uu = '域名Whois查询工具 - ';
 }elseif($hu == 'webs'){
 	$uu = '死链接检测/全站PR查询 - ';
 }elseif($hu == 'ssyqsl'){
 	$uu = '搜索引擎收录查询 - ';
 }elseif($hu == 'ssyqfl'){
 	$uu = '搜索引擎反向链接 - ';
 }elseif($hu == 'shouji'){
 	$uu = '查询手机号码归属地 - ';
 }elseif($hu == 'seo'){
 	$uu = 'SEO综合查询 - ';
 }elseif($hu == 'pr'){
 	$uu = 'PR值查询 - ';
 }elseif($hu == 'keys'){
 	$uu = '关键词排名查询 - ';
 }elseif($hu == 'ip'){
 	$uu = 'IP查询 - ';
 }elseif($hu == 'google'){
 	$uu = 'Google收录查询 - ';
 }elseif($hu == 'friends'){
 	$uu = '友情链接查询工具 - ';
 }elseif($hu == 'friendlink'){
 	$uu = '友情链接IP查询工具 - ';
 }elseif($hu == 'dels'){
 	$uu = '域名删除查询 - ';
 }elseif($hu == 'baidu'){
 	$uu = '百度收录查询 - ';
 }elseif($hu == 'outpr'){
 	$uu = 'PR输出值查询 - ';
 }elseif($hu == 'yuan'){
 	$uu = '查看网页源代码 - ';
 }elseif($hu == 'unix'){
 	$uu = 'Unix时间戳(Unix timestamp)转换工具 - ';
 }
?>

function $(ID) {
	return document.getElementById(ID);
}
	var xmlHttp;
	function creatXMLHttpRequest() {
		if(window.ActiveXObject) {
			xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
		} else if(window.XMLHttpRequest) {
			xmlHttp = new XMLHttpRequest();
		}
	}

	function startRequest() {
		var queryString;
		var domain = document.getElementById('domain').value;
		queryString = "domain=" + domain;
		creatXMLHttpRequest();
		xmlHttp.open("POST","?action=do","true");
		xmlHttp.onreadystatechange = handleStateChange;
		xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;");
		xmlHttp.send(queryString);
	}

	function handleStateChange() {
		if(xmlHttp.readyState == 1) {
			document.getElementById('result').style.cssText = "";
			document.getElementById('result').innerText = "Loading...";
		}
		if(xmlHttp.readyState == 4) {
			if(xmlHttp.status == 200) {
				document.getElementById('result').style.cssText = "";
				var allcon =  xmlHttp.responseText;
				document.getElementById('result').innerHTML = allcon;
			}
		}
	}

function copyToClipboard(txt) {   
     if(window.clipboardData) {   
         window.clipboardData.clearData();   
         window.clipboardData.setData("Text", txt);   
     } else if(navigator.userAgent.indexOf("Opera") != -1) {   
          window.location = txt;   
     } else if (window.netscape) {   
          try {   
               netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");   
          } catch (e) {   
               alert("被浏览器拒绝！\n请在浏览器地址栏输入'about:config'并回车\n然后将'signed.applets.codebase_principal_support'设置为'true'");   
          }
          var clip = Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);   
          if (!clip)
               return;
          var trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);   
          if (!trans)   
               return;   
          trans.addDataFlavor('text/unicode');   
          var str = new Object();   
          var len = new Object();   
          var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);   
          var copytext = txt;   
          str.data = copytext;   
          trans.setTransferData("text/unicode",str,copytext.length*2);   
          var clipid = Components.interfaces.nsIClipboard;   
          if (!clip)   
               return false;   
          clip.setData(trans,null,clipid.kGlobalClipboard);
     }   
}
	function killErrors() {
		return true;
	}
window.onerror = killErrors;

</script>

<title><?php echo $domain;?><?php echo $uu;?>站长查询网 - 站长的便捷工具,可查询PR、网站收录！中国站长网  站长论坛 站长工具 站长查询</title>
</head>
<body>
<div class="wrap"> 
<div class="top-nav">
站长查询网为站长提供了便捷的站长工具,可查询网站收录、反向链接、PR值、世界排名、网站速度等，又可检测友情链接，服务中国站长。   
</div>
  <div class="top">
    <div class="topbanner"><script type="text/javascript">
    u_a_client="38";
    u_a_width="468"; 
    u_a_height="90"; 
    u_a_zones="572"; 
    u_a_type="0"; 
    </script>
    </div>
<div style="RIGHT: 3px; POSITION: absolute; TOP: 5px">
</div>
  </div>
  <div class="menu"> <a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/"?> class="select">站长工具</a> 
   <a onmouseover="mouseover(this, 3)" onmouseout="mouseout()" style="cursor:pointer;">网站信息查询</a> 
   <a onmouseover="mouseover(this, 4)" onmouseout="mouseout()" style="cursor:pointer;">SEO信息查询</a> 
   <a onmouseover="mouseover(this, 5)" onmouseout="mouseout()" style="cursor:pointer;">域名/IP类查询</a> 
   <a onmouseover="mouseover(this, 6)" onmouseout="mouseout()" style="cursor:pointer;">代码转换工具</a> 
   <a onmouseover="mouseover(this, 7)" onmouseout="mouseout()" style="cursor:pointer;">其他工具</a>
  </div>
  <!--sub menu-->
  <div id="menu3" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
    <ul>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/webs/webs.php"?>>站内链接分析</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/density.php"?>>关键词密度检测</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/meta.php"?>>META信息检测</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/pr/outpr.php"?>>PR输出值查询</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/yuan.php"?>>查看网页源代码</a></li>
    </ul>
  </div>
  <div id="menu4" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
    <ul>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/friends/friends.php"?>>友情链接检测</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/keys/keys.php"?>>关键词排名查询</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/baidu/baidu.php"?>>百度近日收录</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/google/google.php"?>>Google收录</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/ssyqsl/ssyqsl.php"?>>网站收录查询</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/ssyqfl/ssyqfl.php"?>>反向链接查询</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/pr/pr.php"?>>PR查询</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/esearch.php"?>>机器人模拟</a></li>
    </ul>
  </div>
  <div id="menu5" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
    <ul>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/dels/dels.php"?>>域名删除时间</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/ip/"?>>IP查询</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/whois/"?>>WHOIS查询</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/friendlink/friendlink.php"?>>友情链接IP查询</a></li>
    </ul>
  </div>
   <div id="menu6" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
     <ul>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/mds.php"?>>MD5加密</a></li>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/js.php"?>>JS加密/解密</a></li>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/htmljs.php"?>>HTML/JS互转</a></li>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/unicode.php"?>>Unicode转换</a></li>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/utf.php"?>>Utf-8编码转换</a></li>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/htmlubb.php"?>>HTML/UBB互转</a></li>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/unix.php"?>>Unix时间戳转换</a></li>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/urlencode.php"?>>URL编码/解码</a></li>
    </ul>
   </div>
    <div id="menu7" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
     <ul>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/ids.php"?>>身份证号码查询</a></li>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/shouji/index.php"?>>手机号码归属地</a></li>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/yb/yb.php"?>>邮编区号查询</a></li>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/countryym.php"?>>国家域名查找</a></li>
     </ul>
   </div>
