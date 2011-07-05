<?php
$hu = 'whois';
@require_once('../header.php');

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

function killErrors() {
	return true;
}
window.onerror = killErrors;
</script>

<div class="main">
  <div class="box">
    <div id="c">
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