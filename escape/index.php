<?php
$hu   = 'escape';
@require_once('../header.php');
?>

<div class="main">
  <div class="box">
    <div id="c">
      <h1>Escape����/����</h1>
      <div class="box1" style="text-align:center;"> 
	<script language="javascript" type="text/javascript" src="../js/base64.js" ></script>   
		<form onsubmit="return false;">                        
		<textarea id="the_code" class="inpText" style="WIDTH: 710px; HEIGHT: 250px" onblur="if(this.value==''){this.value='�������Ҫ���ܵ�����ճ�������';}" onfocus="if(this.value=='�������Ҫ���ܵ�����ճ�������'){this.value='';}">�������Ҫ���ܵ�����ճ�������</textarea>                        
		<p style="margin-top:10px;">                        
		<input type="submit" onclick="the_code.value=encode64(the_code.value);" value="Escape����">&nbsp;&nbsp;                        
		<input type="submit" onclick="the_code.value=decode64(the_code.value);" value="Escape����">&nbsp;&nbsp;   
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
               <p>��������Escape����/����
            </p>
            </span>
        </div>
      </div>
</div>

<?php @require_once('../foot.php');?>