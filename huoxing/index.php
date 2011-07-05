<?php
$hu   = 'huoxing';
@require_once('../header.php');
?>

<div class="main">
  <div class="box">
    <div id="c">
      <h1>火星文，简体，繁体相互转换</h1>
      <div class="box1" style="text-align:center;"> 
		<script type="text/javascript" src="../js/huoxing.js"></script>
			<div id="html2js" class="bg" style="padding-left:20px">                        <h5>请输入需要转换的文字：</h5>                                             <textarea style="width:800px; height:80px;" id="txtsource"></textarea>                            <p style="margin-top:10px;">                            <button onclick="convert(2)">转换为火星文</button>&nbsp;&nbsp;                            <button onclick="convert(1)">转换为繁体字</button>&nbsp;&nbsp;                            <button onclick="convert(0)">转换为简体字</button>&nbsp;&nbsp;                            <button onclick="oCopy(document.getElementById('txtresult'))">点击复制结果</button>                            </p>                            <h5 style="margin-top:20px;">转换结果：</h5>                            <textarea style="width:800px; height:80px;" id="txtresult" onclick="oCopy(document.getElementById('txtresult'))"></textarea>

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
               <p>火星文，简体，繁体相互转换
            </p>
            </span>
        </div>
      </div>
</div>

<?php @require_once('../foot.php');?>