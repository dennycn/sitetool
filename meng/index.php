<?php
set_time_limit(0);

$hu   = 'meng';
header("Content-Type:text/html;charset=UTF-8");
@require_once('../header.php');

$query = trim($_GET['q']);
$id = intval($_GET['id']);

$r_num = 0; //结果个数
$lan = 3;
$pf = "";
$pf_l = "";

if($query!="") {
    $dreamdb=file("data/jm.dat");//读取解梦文件
    $count=count($dreamdb);//计算行数
    for($i=0; $i<$count; $i++) {
        $keyword=explode(" ", $query);//拆分关键字
        $dreamcount=count($keyword);//关键字个数
        for ($ai=0; $ai<$dreamcount; $ai++) {
            @eval("\$found = eregi(\"$keyword[$ai]\", \"$dreamdb[$i]\");");
            //print('19-'.$found.$query.$keyword[0]);
            if(($found)) {
                $detail=explode("\t", $dreamdb[$i]);
                if(fmod($r_num,$lan)==0) $pf_l .= "<tr>";
                $pf_l .= '<td width="'.(100/$lan).'%"> <img src="../images/jiantou.gif" />[<a href="./?q='.urlencode($detail[0]).'"class="lan">'.$detail[0].'</a>';
                $pf_l .= ']<a href="?id='.($i+1).'">'.$detail[1].'</a>';
                if(trim($detail[2],"\r\n")!="") $pf_l .= '</a></td>';
                if(fmod($r_num,$lan)+1==$lan) $pf_l .= "</tr>";
                $r_num++;
                break;
            }
        }
    }
    $pf_l = '<table width="700" cellpadding="2" cellspacing="0" class="mob_ace" style="border:1px solid #A4C4DC;"><tr><td style="background:url(/img/kuang5.gif);padding:0 5px;color:#014198;" height="26" valign="middle" colspan="5"><b><a href="./">周公解梦</a>：找到 <a href="./?q='.urlencode($query).'"><font color="#c60a00">'.$query.'</font></a> 的相关解梦'.$r_num.'个</b></td></tr><tr><td><table cellpadding="5" cellspacing="10" width="100%">'.$pf_l.'</table></td></tr></table>';
}
elseif($id>0) {
    $dreamdb=file("data/jm.dat");//读取解梦文件
    $count=count($dreamdb);//计算行数

    $detail=explode("\t", $dreamdb[$id-1]);
    $pf = '<table width="700" cellpadding=2 cellspacing=0 class="mob_ace" style="border:1px solid #A4C4DC;"><tr><td style="background:url(/img/kuang5.gif);padding:0 5px;color:#014198;" height="26" valign="middle"><b><a href="./">周公解梦</a> / <a href="./?q='.urlencode($detail[0]).'">'.$detail[0].'</a> / '.$detail[1].'</b></td><td style="background:url(/img/kuang5.gif);padding:0 5px;color:#014198;" align="right">';
    if($id>1 && $id<=$count) $pf .= '<a href="?id='.($id-1).'">上一个</a> ';
    $pf .= '<a href="./">查看全部</a>';
    if($id>=1 && $id<$count) $pf .= ' <a href="?id='.($id+1).'">下一个</a>';
    $pf .= '</td></tr><tr><td align="center" colspan="2"><h3>'.$detail[1].'</h3></td></tr><tr><td style="padding:5px;line-height:21px;" colspan="2"><p>'.$detail[2].'</p></td></tr></table>';
}
else {
    $dreamdb=file("data/jm.dat");//读取解梦文件
    $count=count($dreamdb);//计算行数

    $pfl = rand(0,intval($count/60));

    for($i=$pfl*60; $i<$pfl*60+60; $i++) {
        if($i>=$count-1) break;
        $detail=explode("\t", $dreamdb[$i]);
        if(fmod($r_num,$lan)==0) $pf_l .= "<tr>";
        $pf_l .= '<td width="'.(100/$lan).'%"> <img src="../images/jiantou.gif" />[<a href="./?q='.urlencode($detail[0]).'"class="lan">'.$detail[0].'</a>';
        $pf_l .= ']<a href="?id='.($i+1).'">'.$detail[1].'</a>';
        if(trim($detail[2],"\r\n")!="") $pf_l .= '</a></td>';
        if(fmod($r_num,$lan)+1==$lan) $pf_l .= "</tr>";
        $r_num++;
    }
    $pf_l = '<table width="700" cellpadding="2" cellspacing="0" class="mob_ace" style="border:1px solid #A4C4DC;"><tr><td style="background:url(/img/kuang5.gif);padding:0 5px;color:#014198;" height="26" valign="middle" colspan="5"><b>推荐周公解梦'.$r_num.'个</b></td></tr><tr><td><table cellpadding="5" cellspacing="10" width="100%">'.$pf_l.'</table></td></tr></table>';
}
?>

<div class="main">
               <div class="box">
                              <div id="c">
                                      <h1>周公解梦大全</h1>
                                      <div class="box1" style="text-align:center;">
                                                  <form action="" method="post">

<table width="700" cellpadding="2" cellspacing="0" style="border:1px solid #A4C4DC;" id="top"><tr><td align="center" valign="middle" height="60"><form action="./" method="get" name="f1"><b>搜索解梦：<b><input name="q" id="q" type="text" size="18" delay="0" value="" style="width:200px;height:22px;font-size:16px;font-family: Geneva, Arial, Helvetica, sans-serif;" /> <input type="submit" class="mob_copy1" value=" 搜索 " /></td></tr><tr><td align="center" height="30" style="font-size:14px;">解梦分类：<a href="./?q=生活">生活</a> <a href="./?q=天象">天象</a> <a href="./?q=山地">山地</a> <a href="./?q=器物">器物</a> <a href="./?q=建筑">建筑</a> <a href="./?q=文化">文化</a> <a href="./?q=植物">植物</a> <a href="./?q=动物">动物</a> <a href="./?q=神鬼">神鬼</a> <a href="./?q=人身">人身</a> <a href="./?q=情爱">情爱</a> <a href="./?q=其他">其他</a></td></tr></table>

<?php
if($query!="") {
//echo $pf_l.$pf;
echo $pf_l;
}
elseif($id>0 && $id<=$count) {
    echo $pf;
}
else {
    echo '<table width="700" cellpadding="2" cellspacing="0" class="mob_ace" style="border:1px solid #A4C4DC;"><tr><td style="background:url(/img/kuang5.gif);padding:0 5px;color:#014198;" height="26" valign="middle" colspan="5"><b>周公解梦大全</b></td></tr><tr><td><p style="line-height:150%">　　《周公解梦大全查询》收录国内最多的梦境破解，是国内最大的周公解梦系统，以原版周公解梦为基础演绎扩充，结合周易占卜原理，为您解开您梦境中的秘密。<br />　　《周公解梦》是古代一部关于梦的解析与占卜的书，相传为周公所作，其解梦系按《周易》取象推演而来。</p></td></tr></table>
    <br>';
    echo $pf_l;
}
?>


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
<p>《周公解梦大全查询》收录国内最多的梦境破解，是国内最大的周公解梦系统，以原版周公解梦为基础演绎扩充，结合周易占卜原理，为您解开您梦境中的秘密。
　　《周公解梦》是古代一部关于梦的解析与占卜的书，相传为周公所作，其解梦系按《周易》取象推演而来。
</p>
</span>
</div>
</div>
</div>


<?php @require_once('../foot.php');
?>

