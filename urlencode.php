<?php
$hu = 'url';
@require_once('header.php');
?>

<div class="main">
          <div class="box">
            <div id="c">
              <h1>URL编码/解码</h1>
              <div class="box1" style="text-align:center;"> 
<script src="images/globals.js?ver=20100621" type="text/javascript"></script>
<script type="text/javascript">
function urlencode(obj) {
    var url = getid('content').value;
	url = escape(url);
	getid('content').value = url;
	return url;
//	alert(url);
} 
function urldecode(obj) {
    var url = getid('content').value;
	url = unescape(url);
	getid('content').value = url;
	return url;
} 
</script>

<div class="main">
<div class="box">
  <div id="b_1">
    <div class="box1" style="text-align:center;">
    <span class="info3" >
        <textarea name="content" id="content" onmouseover="this.focus();this.select();" style="width:80%; height:100px;">http://my.unix-center.net/~great_denny/sitetool/国</textarea>
    </span>
	<select name="charsetSelect" id="charsetSelect"><option value="utf-8">utf-8</option><option value="gb2312">gb2312</option></select>&nbsp;&nbsp;&nbsp;&nbsp;
		 <input type="submit" name="en" value="UrlEncode编码" onclick="urlencode(this)" />
		 <input type="submit" name="de" value="UrlDecode解码" onclick="urldecode(this)" />
		</div>
    </div>
  </div>
</div>		  
	<divs style="text-align:left"><?php echo $results;?></div>

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
               <p>为了让包含中文的URL可以使用，您可以使用本工具对中文进行UrlEncode编码。
            </p>
            </span>
        </div>
      </div>
</div>

<?php @require_once('foot.php');?>
