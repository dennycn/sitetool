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
 	$uu = 'JS����/���� - ';
 }elseif($hu == 'utf'){
 	$uu = 'UTF-8����ת������ - ';
 }elseif($hu == 'unicode'){
 	$uu = 'Unicode����ת������ - ';
 }elseif($hu == 'sharelink'){
 	$uu = '�������� - ';
 }elseif($hu == 'meta'){
 	$uu = 'META��Ϣ��� - ';
 }elseif($hu == 'mds'){
 	$uu = 'MD5���ܹ��� - ';
 }elseif($hu == 'ids'){
 	$uu = '���֤����ֵ��ѯ - ';
 }elseif($hu == 'htmlubb'){
 	$uu = 'HTML/UBB����ת������ - ';
 }elseif($hu == 'htmljs'){
 	$uu = 'HTML/JS��ת - ';
 }elseif($hu == 'eseach'){
 	$uu = '����֩�롢������ģ�⹤�� - ';
 }elseif($hu == 'density'){
 	$uu = '�ؼ����ܶȼ�� - ';
 }elseif($hu == 'countryym'){
 	$uu = '���������鿴 - ';
 }elseif($hu == 'yb'){
 	$uu = '�ʱ����Ų�ѯ - ';
 }elseif($hu == 'whois'){
 	$uu = '����Whois��ѯ���� - ';
 }elseif($hu == 'webs'){
 	$uu = '�����Ӽ��/ȫվPR��ѯ - ';
 }elseif($hu == 'ssyqsl'){
 	$uu = '����������¼��ѯ - ';
 }elseif($hu == 'ssyqfl'){
 	$uu = '�������淴������ - ';
 }elseif($hu == 'shouji'){
 	$uu = '��ѯ�ֻ���������� - ';
 }elseif($hu == 'seo'){
 	$uu = 'SEO�ۺϲ�ѯ - ';
 }elseif($hu == 'pr'){
 	$uu = 'PRֵ��ѯ - ';
 }elseif($hu == 'keys'){
 	$uu = '�ؼ���������ѯ - ';
 }elseif($hu == 'ip'){
 	$uu = 'IP��ѯ - ';
 }elseif($hu == 'google'){
 	$uu = 'Google��¼��ѯ - ';
 }elseif($hu == 'friends'){
 	$uu = '�������Ӳ�ѯ���� - ';
 }elseif($hu == 'friendlink'){
 	$uu = '��������IP��ѯ���� - ';
 }elseif($hu == 'dels'){
 	$uu = '����ɾ����ѯ - ';
 }elseif($hu == 'baidu'){
 	$uu = '�ٶ���¼��ѯ - ';
 }elseif($hu == 'outpr'){
 	$uu = 'PR���ֵ��ѯ - ';
 }elseif($hu == 'yuan'){
 	$uu = '�鿴��ҳԴ���� - ';
 }elseif($hu == 'unix'){
 	$uu = 'Unixʱ���(Unix timestamp)ת������ - ';
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

<title><?php echo $domain;?><?php echo $uu;?>վ����ѯ�� - վ���ı�ݹ���,�ɲ�ѯPR����վ��¼���й�վ����  վ����̳ վ������ վ����ѯ</title>
</head>
<body>
<div class="wrap"> 
<div class="top-nav">
վ����ѯ��Ϊվ���ṩ�˱�ݵ�վ������,�ɲ�ѯ��վ��¼���������ӡ�PRֵ��������������վ�ٶȵȣ��ֿɼ���������ӣ������й�վ����   
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
  <div class="menu"> <a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/"?> class="select">վ������</a> 
   <a onmouseover="mouseover(this, 3)" onmouseout="mouseout()" style="cursor:pointer;">��վ��Ϣ��ѯ</a> 
   <a onmouseover="mouseover(this, 4)" onmouseout="mouseout()" style="cursor:pointer;">SEO��Ϣ��ѯ</a> 
   <a onmouseover="mouseover(this, 5)" onmouseout="mouseout()" style="cursor:pointer;">����/IP���ѯ</a> 
   <a onmouseover="mouseover(this, 6)" onmouseout="mouseout()" style="cursor:pointer;">����ת������</a> 
   <a onmouseover="mouseover(this, 7)" onmouseout="mouseout()" style="cursor:pointer;">��������</a>
  </div>
  <!--sub menu-->
  <div id="menu3" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
    <ul>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/webs/webs.php"?>>վ�����ӷ���</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/density.php"?>>�ؼ����ܶȼ��</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/meta.php"?>>META��Ϣ���</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/pr/outpr.php"?>>PR���ֵ��ѯ</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/yuan.php"?>>�鿴��ҳԴ����</a></li>
    </ul>
  </div>
  <div id="menu4" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
    <ul>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/friends/friends.php"?>>�������Ӽ��</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/keys/keys.php"?>>�ؼ���������ѯ</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/baidu/baidu.php"?>>�ٶȽ�����¼</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/google/google.php"?>>Google��¼</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/ssyqsl/ssyqsl.php"?>>��վ��¼��ѯ</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/ssyqfl/ssyqfl.php"?>>�������Ӳ�ѯ</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/pr/pr.php"?>>PR��ѯ</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/esearch.php"?>>������ģ��</a></li>
    </ul>
  </div>
  <div id="menu5" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
    <ul>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/dels/dels.php"?>>����ɾ��ʱ��</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/ip/"?>>IP��ѯ</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/whois/"?>>WHOIS��ѯ</a></li>
    <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/friendlink/friendlink.php"?>>��������IP��ѯ</a></li>
    </ul>
  </div>
   <div id="menu6" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
     <ul>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/mds.php"?>>MD5����</a></li>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/js.php"?>>JS����/����</a></li>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/htmljs.php"?>>HTML/JS��ת</a></li>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/unicode.php"?>>Unicodeת��</a></li>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/utf.php"?>>Utf-8����ת��</a></li>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/htmlubb.php"?>>HTML/UBB��ת</a></li>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/unix.php"?>>Unixʱ���ת��</a></li>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/urlencode.php"?>>URL����/����</a></li>
    </ul>
   </div>
    <div id="menu7" class="menu-list" onmouseover="_mouseover()" onmouseout="_mouseout()">
     <ul>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/ids.php"?>>���֤�����ѯ</a></li>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/shouji/index.php"?>>�ֻ����������</a></li>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/yb/yb.php"?>>�ʱ����Ų�ѯ</a></li>
      <li><a href=<?php echo "http://".$_SERVER['SERVER_NAME']."/sitetool/countryym.php"?>>������������</a></li>
     </ul>
   </div>
