<?php
$hu   = 'escape';
@require_once('../header.php');
?>

<div class="main">
  <div class="box">
    <div id="c">
      <h1>Escape����/����</h1>
      <div class="box1" style="text-align:center;"> 
		<form onsubmit="return false">
			<textarea id="escape_string" class="inpText" style="WIDTH: 710px; HEIGHT: 250px"
			onfocus="if(this.value=='�������Ҫ���ܵ�����ճ�������'){this.value='';}" onblur="if(this.value==''){this.value='�������Ҫ���ܵ�����ճ�������';}">�������Ҫ���ܵ�����ճ�������
			</textarea>
			<p style="margin-top:10px;">
				<input type="submit" onclick="escape_string.value=escape(escape_string.value);"
				value="Escape ����">
				<input type="submit" onclick="escape_string.value=unescape(escape_string.value);"
				value="UnEscape ����">
				<input type="button" onclick="oCopy(document.getElementById('escape_string'))"
				value="����" />
				<input type="button" onclick="oCopy(document.getElementById('escape_string'));escape_string.value='';"
				value="����" />
			</p>
		</form>       

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