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
	$result = str_replace("Billing Contact","������ϵ",$result);
	$result = str_replace("Technical Contact","������ϵ",$result);
	$result = str_replace("Administrative Contact","��������ϵ",$result);
	$result = str_replace("Expiration Date","����ʱ��",$result);
	$result = str_replace("Updated Date","����ʱ��",$result);
	$result = str_replace("Creation Date","����ʱ��",$result);
	$result = str_replace("Status","״̬",$result);
	$result = str_replace("Name Server","DNS������",$result);
	$result = str_replace("Referral URL","�����վ",$result);
	$result = str_replace("Registrar:","ע����:",$result);
	$result = str_replace("Whois Server:","����������:",$result);
	$result = str_replace("no data found!"," ",$result);
	$result = str_replace("-jan","-1��",$result);
	$result = str_replace("-feb","-2��",$result);
	$result = str_replace("-mar","-3��",$result);
	$result = str_replace("-apr","-4��",$result);
	$result = str_replace("-may","-5��",$result);
	$result = str_replace("-jun","-6��",$result);
	$result = str_replace("-jul","-7��",$result);
	$result = str_replace("-aug","-8��",$result);
	$result = str_replace("-sep","-9��",$result);
	$result = str_replace("-oct","-10��",$result);
	$result = str_replace("-nov","-11��",$result);
	$result = str_replace("-dec","-12��",$result);
	$resul2 = "���ʴ���վ��<a href=http://".$domain.">http://".$domain."</a><br/>".$result;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
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
               alert("��������ܾ���\n�����������ַ������'about:config'���س�\nȻ��'signed.applets.codebase_principal_support'����Ϊ'true'");   
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
<title><?php echo $domain;?>��Whois��Ϣ - վ����ѯ��</title>
<body>
<div class="main">
  <div class="box">
    <div id="c">
	<div class="wrap"> 
<div class="top-nav">	վ����ѯ��Ϊվ���ṩ�˱�ݵ�վ������,�ɲ�ѯ��վ��¼���������ӡ�PRֵ��������������վ�ٶȵȣ��ֿɼ���������ӣ������й�վ����   
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
/* 468x60,��ѯ */
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
  <div class="menu"> <a href="http://tool.zznet.cn/" class="select">վ������</a> 
   <a onmouseover="mouseover(this, 3)" onmouseout="mouseout()" style="cursor:pointer;">��վ��Ϣ��ѯ</a> 
   <a onmouseover="mouseover(this, 4)" onmouseout="mouseout()" style="cursor:pointer;">SEO��Ϣ��ѯ</a> 
   <a onmouseover="mouseover(this, 5)" onmouseout="mouseout()" style="cursor:pointer;">����/IP���ѯ</a> 
   <a onmouseover="mouseover(this, 6)" onmouseout="mouseout()" style="cursor:pointer;">����ת������</a> 
   <a onmouseover="mouseover(this, 7)" onmouseout="mouseout()" style="cursor:pointer;">��������</a>
	
  </div>
  <!--sub menu-->
  <div id="menu3" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
    <ul>
    <li><a href="http://tool.zznet.cn/webs/webs.php" >վ�����ӷ���</a></li>
    <li><a href="http://tool.zznet.cn/density.php">�ؼ����ܶȼ��</a></li>
    <li><a href="http://tool.zznet.cn/meta.php">META��Ϣ���</a></li>
    <li><a href="http://tool.zznet.cn/pr/outpr.php">PR���ֵ��ѯ</a></li>
    <li><a href="http://tool.zznet.cn/yuan.php">�鿴��ҳԴ����</a></li>
    </ul>
  </div>
  <div id="menu4" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
    <ul>
    <li><a href="http://tool.zznet.cn/friends/friends.php">�������Ӽ��</a></li>
    <li><a href="http://tool.zznet.cn/keys/keys.php">�ؼ���������ѯ</a></li>
    <li><a href="http://tool.zznet.cn/baidu/baidu.php">�ٶȽ�����¼</a></li>
    <li><a href="http://tool.zznet.cn/google/google.php">Google��¼</a></li>
    <li><a href="http://tool.zznet.cn/ssyqsl/ssyqsl.php">��վ��¼��ѯ</a></li>
    <li><a href="http://tool.zznet.cn/ssyqfl/ssyqfl.php">�������Ӳ�ѯ</a></li>
    <li><a href="http://tool.zznet.cn/pr/pr.php">PR��ѯ</a></li>
    <li><a href="http://tool.zznet.cn/esearch.php">������ģ��</a></li>
    </ul>
  </div>
  <div id="menu5" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
    <ul>
    <li><a href="http://tool.zznet.cn/dels/dels.php">����ɾ��ʱ��</a></li>
    <li><a href="http://tool.zznet.cn/ip/">IP��ѯ</a></li>
    <li><a href="http://tool.zznet.cn/whois/">WHOIS��ѯ</a></li>
    <li><a href="http://tool.zznet.cn/friendlink/friendlink.php">��������IP��ѯ</a></li>
    </ul>
   </div>
   <div id="menu6" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
     <ul>
      <li><a href="http://tool.zznet.cn/mds.php?mds=md5">MD5����</a></li>
      <li><a href="http://tool.zznet.cn/js.php">JS����/����</a></li>
      <li><a href="http://tool.zznet.cn/htmljs.php">HTML/JS��ת</a></li>
      <li><a href="http://tool.zznet.cn/unicode.php">Unicodeת��</a></li>
      <li><a href="http://tool.zznet.cn/utf.php">Utf-8����ת��</a></li>
      <li><a href="http://tool.zznet.cn/htmlubb.php">HTML/UBB��ת</a></li>
      <li><a href="http://tool.zznet.cn/unix.php">Unixʱ���ת��</a></li>
     </ul>
   </div>
    <div id="menu7" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
     <ul>
      <li><a href="http://tool.zznet.cn/ids.php">���֤�����ѯ</a></li>
      <li><a href="http://tool.zznet.cn/shouji/index.php">�ֻ����������</a></li>
      <li><a href="http://tool.zznet.cn/yb/yb.php">�ʱ����Ų�ѯ</a></li>
      <li><a href="http://tool.zznet.cn/countryym.php">������������</a></li>
     </ul>
   </div>
      <h1><a href="http://whois.chinaccnet.com">����Whois��ѯ����</a></h1>
      <div class="box1" style="text-align:center;"> 
      <form action="" method="POST">
          <span class="info3" > ������Ҫ��ѯ��������
            <font color="green"><b>HTTP://</b></font><input name="domain" type="text" id="domain" class="input" size="40" url="true" value="<?php echo $domain?>" onkeydown="if(event.keyCode==13)startRequest();"/>
            <input name="btnS" class="but" type="submit" value="��ѯ"  id="sub"/>
          </span></form>
           <div id="more" class="div_whois">
               ��ز�ѯ:
<a href="/tool/dels/dels.php?domain=qq.com">����ɾ��ʱ��</a>
<a href="/tool/ip/?domain=qq.com">IP��ѯ</a>
<a href="/tool/whois/?domain=qq.com">WHOIS��ѯ</a>
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
<h1>�����ѯ��</h1>
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
        <h1>���߼��</h1>
        <div class="box1">
            <span class="info2">
               <p>Whois ����˵������һ��������ѯ�����Ƿ��Ѿ���ע�ᣬ�Լ�ע����������ϸ��Ϣ�����ݿ⣨�����������ˡ�����ע���̡�����ע�����ں͹������ڵȣ���ͨ������Whois��ѯ�����Բ�ѯ������������ϵ��ʽ���Լ�ע��͵���ʱ��,������ <b style="color:Red;">whois.chinaccnet.com</b> ���ʣ�</p>
            
            <p><b>������������ɾ������ʵʩ�Ľ��ͣ�</b></p>
            <p>����������</p>
            <p>(1) ���ڵ�����ͣ�����������72Сʱδ���ѣ����޸�����DNSָ����ҳ�棨ͣ�ţ���38���ڣ������Զ����ѡ����Ѻ�ϵͳ�Զ�
�ָ�ԭ����DNS��ˢ��ʱ������24��48Сʱ��</p>
            <p>&nbsp;(2) 39-70�죬������������ڣ�Redemption�������ڼ������޷��������ֹ���أ�
            </p>
            <p>(3) 75�죬����������ɾ������������ע�ᡣ</p>
            <p>����������</p>
            <p>(1) ���ڵ�����ͣ�����������72Сʱδ���ѣ����޸�����DNSָ��
      ���ҳ�棨ͣ�ţ���35���ڣ������Զ����ѡ�
            </p>
            <p>(2) ���ں�36��48�죬������13��ĸ߼�����ڣ����ڼ������޷���
     ����ؼ۸�����1500Ԫ/����Ӣ��500Ԫ/����
            </p>
            <p>(3) ���ں�48�����δ���ѵģ���������ʱ��ɾ���� 
            </p>
            </span>
        </div>
      </div>
</div>
<?php @require_once('../foot.php');?>