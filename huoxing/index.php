<?php
$hu   = 'huoxing';
@require_once('../header.php');
?>

<div class="main">
  <div class="box">
    <div id="c">
      <h1>�����ģ����壬�����໥ת��</h1>
      <div class="box1" style="text-align:center;"> 
		<script type="text/javascript" src="../js/huoxing.js"></script>
			<div id="html2js" class="bg" style="padding-left:20px">                        <h5>��������Ҫת�������֣�</h5>                                             <textarea style="width:800px; height:80px;" id="txtsource"></textarea>                            <p style="margin-top:10px;">                            <button onclick="convert(2)">ת��Ϊ������</button>&nbsp;&nbsp;                            <button onclick="convert(1)">ת��Ϊ������</button>&nbsp;&nbsp;                            <button onclick="convert(0)">ת��Ϊ������</button>&nbsp;&nbsp;                            <button onclick="oCopy(document.getElementById('txtresult'))">������ƽ��</button>                            </p>                            <h5 style="margin-top:20px;">ת�������</h5>                            <textarea style="width:800px; height:80px;" id="txtresult" onclick="oCopy(document.getElementById('txtresult'))"></textarea>

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
               <p>�����ģ����壬�����໥ת��
            </p>
            </span>
        </div>
      </div>
</div>

<?php @require_once('../foot.php');?>