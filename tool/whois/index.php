<?php
$domain = trim($_POST['domain']);
$domain = strtolower($domain);
if(!$domain && $_GET['domain']){
	$domain = strtolower(trim($_GET['domain']));
}
$domain = $domain?$domain:'';
if($domain){
	@require_once('../cache.php');
	if(file_exists("../cache/whoischace.php")){
		@require_once("../cache/whoischace.php");
		$urls = filehave($urls,$domain);
	}else{
	$urls = fileno($domain);
	}
	writeover("../cache/whoischace.php","<?php\r\n\$urls=".vvar_export($urls).";\r\n?>");
}
if(substr($domain,0,7) == "http://") {
	$domain = str_replace("http://","",$domain);
}
if(substr($domain,0,4) == "www.") {
	$domain = str_replace("www.","",$domain);
}
if($domain){
	preg_match("/<div class=\"lyTableInfoWrap\">(.+?)<\/div>/is", @file_get_contents('http://www.xinnet.cn/Modules/agent/serv/pages/domain_whois.jsp?domainNameWhois='.$domain.'&noCode=noCode'), $whois);
	$result = $whois[0];
	$result = str_replace("Billing Contact","财务联系",$result);
	$result = str_replace("Technical Contact","技术联系",$result);
	$result = str_replace("Administrative Contact","管理人联系",$result);
	$result = str_replace("Expiration Date","过期时间",$result);
	$result = str_replace("Updated Date","更新时间",$result);
	$result = str_replace("Creation Date","创建时间",$result);
	$result = str_replace("Status","状态",$result);
	$result = str_replace("Name Server","DNS服务器",$result);
	$result = str_replace("Referral URL","相关网站",$result);
	$result = str_replace("Registrar:","注册商:",$result);
	$result = str_replace("Whois Server:","域名服务器:",$result);
	$result = str_replace("no data found!"," ",$result);
	$result = str_replace("-jan","-1月",$result);
	$result = str_replace("-feb","-2月",$result);
	$result = str_replace("-mar","-3月",$result);
	$result = str_replace("-apr","-4月",$result);
	$result = str_replace("-may","-5月",$result);
	$result = str_replace("-jun","-6月",$result);
	$result = str_replace("-jul","-7月",$result);
	$result = str_replace("-aug","-8月",$result);
	$result = str_replace("-sep","-9月",$result);
	$result = str_replace("-oct","-10月",$result);
	$result = str_replace("-nov","-11月",$result);
	$result = str_replace("-dec","-12月",$result);
	$resul2 = "访问此网站：<a href=http://".$domain.">http://".$domain."</a><br/>".$result;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://tool.zznet.cn/images/toolsite.css" rel="stylesheet" type="text/css" />
<script src="http://tool.zznet.cn/images/globals.js" type="text/javascript"></script>
<script src="http://tool.zznet.cn/images/home.js" type="text/javascript"></script>
<script type="text/javascript">
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
</head>
<title><?php echo $domain;?>的Whois信息 - 站长查询网</title>
<body>
<div class="main">
  <div class="box">
    <div id="c">
	<div class="wrap"> 
<div class="top-nav">	站长查询网为站长提供了便捷的站长工具,可查询网站收录、反向链接、PR值、世界排名、网站速度等，又可检测友情链接，服务中国站长。   
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
<script type="text/javascript"><!--
google_ad_client = "pub-1900737699768525";
/* 468x60,查询 */
google_ad_slot = "3952371415";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script> 
</div>
  </div>
  <div class="menu"> <a href="http://tool.zznet.cn/" class="select">站长工具</a> 
   <a onmouseover="mouseover(this, 3)" onmouseout="mouseout()" style="cursor:pointer;">网站信息查询</a> 
   <a onmouseover="mouseover(this, 4)" onmouseout="mouseout()" style="cursor:pointer;">SEO信息查询</a> 
   <a onmouseover="mouseover(this, 5)" onmouseout="mouseout()" style="cursor:pointer;">域名/IP类查询</a> 
   <a onmouseover="mouseover(this, 6)" onmouseout="mouseout()" style="cursor:pointer;">代码转换工具</a> 
   <a onmouseover="mouseover(this, 7)" onmouseout="mouseout()" style="cursor:pointer;">其他工具</a>
	
  </div>
  <!--sub menu-->
  <div id="menu3" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
    <ul>
    <li><a href="http://tool.zznet.cn/webs/webs.php" >站内链接分析</a></li>
    <li><a href="http://tool.zznet.cn/density.php">关键词密度检测</a></li>
    <li><a href="http://tool.zznet.cn/meta.php">META信息检测</a></li>
    <li><a href="http://tool.zznet.cn/pr/outpr.php">PR输出值查询</a></li>
    <li><a href="http://tool.zznet.cn/yuan.php">查看网页源代码</a></li>
    </ul>
  </div>
  <div id="menu4" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
    <ul>
    <li><a href="http://tool.zznet.cn/friends/friends.php">友情链接检测</a></li>
    <li><a href="http://tool.zznet.cn/keys/keys.php">关键词排名查询</a></li>
    <li><a href="http://tool.zznet.cn/baidu/baidu.php">百度近日收录</a></li>
    <li><a href="http://tool.zznet.cn/google/google.php">Google收录</a></li>
    <li><a href="http://tool.zznet.cn/ssyqsl/ssyqsl.php">网站收录查询</a></li>
    <li><a href="http://tool.zznet.cn/ssyqfl/ssyqfl.php">反向链接查询</a></li>
    <li><a href="http://tool.zznet.cn/pr/pr.php">PR查询</a></li>
    <li><a href="http://tool.zznet.cn/esearch.php">机器人模拟</a></li>
    </ul>
  </div>
  <div id="menu5" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
    <ul>
    <li><a href="http://tool.zznet.cn/dels/dels.php">域名删除时间</a></li>
    <li><a href="http://tool.zznet.cn/ip/">IP查询</a></li>
    <li><a href="http://tool.zznet.cn/whois/">WHOIS查询</a></li>
    <li><a href="http://tool.zznet.cn/friendlink/friendlink.php">友情链接IP查询</a></li>
    </ul>
   </div>
   <div id="menu6" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
     <ul>
      <li><a href="http://tool.zznet.cn/mds.php?mds=md5">MD5加密</a></li>
      <li><a href="http://tool.zznet.cn/js.php">JS加密/解密</a></li>
      <li><a href="http://tool.zznet.cn/htmljs.php">HTML/JS互转</a></li>
      <li><a href="http://tool.zznet.cn/unicode.php">Unicode转换</a></li>
      <li><a href="http://tool.zznet.cn/utf.php">Utf-8编码转换</a></li>
      <li><a href="http://tool.zznet.cn/htmlubb.php">HTML/UBB互转</a></li>
      <li><a href="http://tool.zznet.cn/unix.php">Unix时间戳转换</a></li>
     </ul>
   </div>
    <div id="menu7" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
     <ul>
      <li><a href="http://tool.zznet.cn/ids.php">身份证号码查询</a></li>
      <li><a href="http://tool.zznet.cn/shouji/index.php">手机号码归属地</a></li>
      <li><a href="http://tool.zznet.cn/yb/yb.php">邮编区号查询</a></li>
      <li><a href="http://tool.zznet.cn/countryym.php">国家域名查找</a></li>
     </ul>
   </div>
      <h1><a href="http://whois.chinaccnet.com">域名Whois查询工具</a></h1>
      <div class="box1" style="text-align:center;"> 
      <form action="" method="POST">
          <span class="info3" > 请输入要查询的域名：
            <font color="green"><b>HTTP://</b></font><input name="domain" type="text" id="domain" class="input" size="40" url="true" value="<?php echo $domain?>" onkeydown="if(event.keyCode==13)startRequest();"/>
            <input name="btnS" class="but" type="submit" value="查询"  id="sub"/>
          </span></form>
           <div id="more" class="div_whois">
               相关查询:
<a href="/tool/dels/dels.php?domain=qq.com">域名删除时间</a>
<a href="/tool/ip/?domain=qq.com">IP查询</a>
<a href="/tool/whois/?domain=qq.com">WHOIS查询</a>
            </div>
          <div style="width:100%">
              <div id="detail" class="info1">
<div id="result" class="div_whois">
<?php echo $resul2;?>
</div>
              </div>
              <div style="float:right; width:40%; text-align:right; padding-top:9px;">
              </div>
          </div>
      </div>
    </div>
  </div>
<div id="b_14">
<h1>最近查询：</h1>
<div class="box1">
<span class="info2"> 
<table>
<tr><td align="left" style= "word-wrap:break-word;word-break:break-all">
<?php
@require_once('../cache/whoischace.php');
if($urls){
foreach ($urls as $key=>$v){
	echo "<a href=http://tool.zznet.cn/whois/index.php?domain=".$urls[$key].">".$urls[$key]."</a>&nbsp;&nbsp;";
}}?></td></tr>
</table>
</span>
</div>
    <div class="box">
      <div id="b_14">
        <h1>工具简介</h1>
        <div class="box1">
            <span class="info2">
               <p>Whois 简单来说，就是一个用来查询域名是否已经被注册，以及注册域名的详细信息的数据库（如域名所有人、域名注册商、域名注册日期和过期日期等）。通过域名Whois查询，可以查询域名归属者联系方式，以及注册和到期时间,可以用 <b style="color:Red;">whois.chinaccnet.com</b> 访问！</p>
            
            <p><b>关于域名到期删除规则实施的解释：</b></p>
            <p>国际域名：</p>
            <p>(1) 到期当天暂停解析，如果在72小时未续费，则修改域名DNS指向广告页面（停放）。38天内，可以自动续费。续费后，系统自动
恢复原来的DNS，刷新时间大概是24－48小时。</p>
            <p>&nbsp;(2) 39-70天，域名处于赎回期（Redemption），此期间域名无法管理，需手工赎回！
            </p>
            <p>(3) 75天，域名被彻底删除，可以重新注册。</p>
            <p>国内域名：</p>
            <p>(1) 到期当天暂停解析，如果在72小时未续费，则修改域名DNS指向
      广告页面（停放）。35天内，可以自动续费。
            </p>
            <p>(2) 过期后36－48天，将进入13天的高价赎回期，此期间域名无法管
     理。赎回价格（中文1500元/个，英文500元/个）
            </p>
            <p>(3) 过期后48天后仍未续费的，域名将随时被删除。 
            </p>
            </span>
        </div>
      </div>
</div>
<?php @require_once('../foot.php');?>