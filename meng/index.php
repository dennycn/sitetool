<?php
set_time_limit(0);

$hu   = 'meng';
@require_once('../header.php');

$prescription = trim($_GET['q']);
$id = intval($_GET['id']);

$r_num = 0; //�������
$lan = 3;
$pf = "";
$pf_l = "";

if($prescription!=""){
	$dreamdb=file("data/jm.dat");//��ȡ�����ļ�
	$count=count($dreamdb);//��������

	for($i=0; $i<$count; $i++) {
		$keyword=explode(" ",$prescription);//��ֹؼ���
		$dreamcount=count($keyword);//�ؼ��ָ���
		for ($ai=0; $ai<$dreamcount; $ai++) {
			@eval("\$found = eregi(\"$keyword[$ai]\",\"$dreamdb[$i]\");");
			if(($found)){
				$detail=explode("\t",$dreamdb[$i]);
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
	$pf_l = '<table width="700" cellpadding="2" cellspacing="0" class="mob_ace" style="border:1px solid #A4C4DC;"><tr><td style="background:url(/img/kuang5.gif);padding:0 5px;color:#014198;" height="26" valign="middle" colspan="5"><b><a href="./">�ܹ�����</a>���ҵ� <a href="./?q='.urlencode($prescription).'"><font color="#c60a00">'.$prescription.'</font></a> ����ؽ���'.$r_num.'��</b></td></tr><tr><td><table cellpadding="5" cellspacing="10" width="100%">'.$pf_l.'</table></td></tr></table>';
}elseif($id>0){
	$dreamdb=file("data/jm.dat");//��ȡ�����ļ�
	$count=count($dreamdb);//��������

	$detail=explode("\t",$dreamdb[$id-1]);
	$pf = '<table width="700" cellpadding=2 cellspacing=0 class="mob_ace" style="border:1px solid #A4C4DC;"><tr><td style="background:url(/img/kuang5.gif);padding:0 5px;color:#014198;" height="26" valign="middle"><b><a href="./">�ܹ�����</a> / <a href="./?q='.urlencode($detail[0]).'">'.$detail[0].'</a> / '.$detail[1].'</b></td><td style="background:url(/img/kuang5.gif);padding:0 5px;color:#014198;" align="right">';
	if($id>1 && $id<=$count) $pf .= '<a href="?id='.($id-1).'">��һ��</a> ';
	$pf .= '<a href="./">�鿴ȫ��</a>';
	if($id>=1 && $id<$count) $pf .= ' <a href="?id='.($id+1).'">��һ��</a>';
	$pf .= '</td></tr><tr><td align="center" colspan="2"><h3>'.$detail[1].'</h3></td></tr><tr><td style="padding:5px;line-height:21px;" colspan="2"><p>'.$detail[2].'</p></td></tr></table>';
}else{
	$dreamdb=file("data/jm.dat");//��ȡ�����ļ�
	$count=count($dreamdb);//��������

	$pfl = rand(0,intval($count/60));

	for($i=$pfl*60; $i<$pfl*60+60; $i++) {
		if($i>=$count-1) break;
		$detail=explode("\t",$dreamdb[$i]);
		if(fmod($r_num,$lan)==0) $pf_l .= "<tr>";
		$pf_l .= '<td width="'.(100/$lan).'%"> <img src="../images/jiantou.gif" />[<a href="./?q='.urlencode($detail[0]).'"class="lan">'.$detail[0].'</a>';
                $pf_l .= ']<a href="?id='.($i+1).'">'.$detail[1].'</a>';
		if(trim($detail[2],"\r\n")!="") $pf_l .= '</a></td>';
		if(fmod($r_num,$lan)+1==$lan) $pf_l .= "</tr>";
		$r_num++;
	}
	$pf_l = '<table width="700" cellpadding="2" cellspacing="0" class="mob_ace" style="border:1px solid #A4C4DC;"><tr><td style="background:url(/img/kuang5.gif);padding:0 5px;color:#014198;" height="26" valign="middle" colspan="5"><b>�Ƽ��ܹ�����'.$r_num.'��</b></td></tr><tr><td><table cellpadding="5" cellspacing="10" width="100%">'.$pf_l.'</table></td></tr></table>';
}
?>

<div class="main">
  <div class="box">
    <div id="c">
      <h1>�ܹ����δ�ȫ</h1>
      <div class="box1" style="text-align:center;"> 
	  <form action="" method="post">

<table width="700" cellpadding="2" cellspacing="0" style="border:1px solid #A4C4DC;" id="top"><tr><td align="center" valign="middle" height="60"><form action="./" method="get" name="f1"><b>�������Σ�<b><input name="q" id="q" type="text" size="18" delay="0" value="" style="width:200px;height:22px;font-size:16px;font-family: Geneva, Arial, Helvetica, sans-serif;" /> <input type="submit" class="mob_copy1" value=" ���� " /></td></tr><tr><td align="center" height="30" style="font-size:14px;">���η��ࣺ<a href="./?q=%C9%FA%BB%EE%C6%AA">����</a> <a href="./?q=%CC%EC%CF%F3%C6%AA">����</a> <a href="./?q=%C9%BD%B5%D8%C6%AA">ɽ��</a> <a href="./?q=%C6%F7%CE%EF%C6%AA">����</a> <a href="./?q=%BD%A8%D6%FE%C6%AA">����</a> <a href="./?q=%CE%C4%BB%AF%C6%AA">�Ļ�</a> <a href="./?q=%D6%B2%CE%EF%C6%AA">ֲ��</a> <a href="./?q=%B6%AF%CE%EF%C6%AA">����</a> <a href="./?q=%C9%F1%B9%ED%C6%AA">���</a> <a href="./?q=%C8%CB%C9%ED%C6%AA">����</a> <a href="./?q=%C7%E9%B0%AE%C6%AA">�鰮</a> <a href="./?q=%C6%E4%CB%FC%C6%AA">����</a></td></tr></table>

<?
if($prescription!=""){
	//echo $pf_l.$pf;
	echo $pf_l;
}elseif($id>0 && $id<=$count){
	echo $pf;
}else{
	echo '<table width="700" cellpadding="2" cellspacing="0" class="mob_ace" style="border:1px solid #A4C4DC;"><tr><td style="background:url(/img/kuang5.gif);padding:0 5px;color:#014198;" height="26" valign="middle" colspan="5"><b>�ܹ����δ�ȫ</b></td></tr><tr><td><p style="line-height:150%">�������ܹ����δ�ȫ��ѯ����¼���������ξ��ƽ⣬�ǹ��������ܹ�����ϵͳ����ԭ���ܹ�����Ϊ�����������䣬�������ռ��ԭ����Ϊ���⿪���ξ��е����ܡ�<br />�������ܹ����Ρ��ǹŴ�һ�������εĽ�����ռ�����飬�ഫΪ�ܹ������������ϵ�������ס�ȡ�����ݶ�����</p></td></tr></table>
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
        <h1>���߼��</h1>
        <div class="box1">
            <span class="info2">
               <p>���ܹ����δ�ȫ��ѯ����¼���������ξ��ƽ⣬�ǹ��������ܹ�����ϵͳ����ԭ���ܹ�����Ϊ�����������䣬�������ռ��ԭ����Ϊ���⿪���ξ��е����ܡ�
�������ܹ����Ρ��ǹŴ�һ�������εĽ�����ռ�����飬�ഫΪ�ܹ������������ϵ�������ס�ȡ�����ݶ�����
            </p>
            </span>
        </div>
      </div>
</div>

<?php @require_once('../foot.php');?>
