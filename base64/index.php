<?php
$hu   = 'base64';
@require_once('../header.php');

$mds  = $_POST['mds']?$_POST['mds']:$_GET['mds'];
$mds  = $mds?$mds:"md5";
$typ  = $_POST['Md5Type'];
$mds1 = strtoupper(md5($mds));
$mds2 = strtolower($mds1);
$mds3 = substr($mds1,8,16);
$mds4 = strtolower($mds3);
if($typ == '3'){
	$results  = "���ܺ�Ľ����<input type=text class=input size=40 value=".$mds4.">";
}elseif($typ == '1'){
	$results =  "���ܺ�Ľ����<input type=text class=input size=40 value=".$mds2.">";
}elseif($typ == '2'){
	$results = "���ܺ�Ľ����<input type=text class=input size=40 value=".$mds3.">";
}else{
	$results = "���ܺ�Ľ����<input type=text class=input size=40 value=".$mds1.">";
}
?>

<div class="main">
  <div class="box">
    <div id="c">
      <h1>BASE64���ܡ�����</h1>
      <div class="box1" style="text-align:center;"> 
	<script language="javascript" type="text/javascript" src="../js/base64.js" ></script>   
		<form onsubmit="return false;">                        
		<textarea id="the_code" class="inpText" style="WIDTH: 710px; HEIGHT: 250px" onblur="if(this.value==''){this.value='�������Ҫ���ܵ�����ճ�������';}" onfocus="if(this.value=='�������Ҫ���ܵ�����ճ�������'){this.value='';}">�������Ҫ���ܵ�����ճ�������</textarea>                        
		<p style="margin-top:10px;">                        
		<input type="submit" onclick="the_code.value=encode64(the_code.value);" value="BASE64����">&nbsp;&nbsp;                        
		<input type="submit" onclick="the_code.value=decode64(the_code.value);" value="BASE64����">&nbsp;&nbsp;   
		<input type="button" onclick="oCopy(document.getElementById('the_code'))" value="����"/>                        
		<input type="button" onclick="oCopy(document.getElementById('the_code'));the_code.value='';" value="����"/>                                            
		</p></form>

          <div style="width:100%">
              <div id="detail" class="info1">                     
<div id="result" class="div_whois">

<div class="t" style="display:none" id="seo_result">
</div>
       </div>
              </div>
              <div style="float:right; width:40%; text-align:right; padding-top:9px;">
              </div>
          </div>
      </div>
    </div>
  </div>
    <div class="box">
      <div id="b_14">
        <h1>���߼��</h1>
        <div class="box1">
            <span class="info2">
               <p>��������BASE64��ʽ����/����
            </p>
            </span>
        </div>
      </div>
</div>

<?php @require_once('../foot.php');?>