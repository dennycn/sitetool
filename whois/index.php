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