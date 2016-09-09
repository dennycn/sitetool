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
	$results  = "加密后的结果：<input type=text class=input size=40 value=".$mds4.">";
}elseif($typ == '1'){
	$results =  "加密后的结果：<input type=text class=input size=40 value=".$mds2.">";
}elseif($typ == '2'){
	$results = "加密后的结果：<input type=text class=input size=40 value=".$mds3.">";
}else{
	$results = "加密后的结果：<input type=text class=input size=40 value=".$mds1.">";
}
?>

<div class="main">
  <div class="box">
    <div id="c">
      <h1>BASE64加密、解密</h1>
      <div class="box1" style="text-align:center;"> 
	<script language="javascript" type="text/javascript" src="../js/base64.js" ></script>   
		<form onsubmit="return false;">                        
		<textarea id="the_code" class="inpText" style="WIDTH: 710px; HEIGHT: 250px" onblur="if(this.value==''){this.value='请把你需要加密的内容粘贴在这里！';}" onfocus="if(this.value=='请把你需要加密的内容粘贴在这里！'){this.value='';}">请把你需要加密的内容粘贴在这里！</textarea>                        
		<p style="margin-top:10px;">                        
		<input type="submit" onclick="the_code.value=encode64(the_code.value);" value="BASE64加密">&nbsp;&nbsp;                        
		<input type="submit" onclick="the_code.value=decode64(the_code.value);" value="BASE64解密">&nbsp;&nbsp;   
		<input type="button" onclick="oCopy(document.getElementById('the_code'))" value="复制"/>                        
		<input type="button" onclick="oCopy(document.getElementById('the_code'));the_code.value='';" value="剪贴"/>                                            
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
        <h1>工具简介</h1>
        <div class="box1">
            <span class="info2">
               <p>将代码以BASE64方式加密/解密
            </p>
            </span>
        </div>
      </div>
</div>

<?php @require_once('../foot.php');?>