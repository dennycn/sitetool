<?php
set_time_limit(0);
$naojin = trim($_GET['q']);
$id = $_GET['id'];

$r_num = 0; //�������
$lan = 1;
$pf = "";
$pf_l = "";

if($naojin!=""){
	$dreamdb=file("data/naojin.dat");//��ȡ�Խת���ļ�
	$count=count($dreamdb);//��������

	for($i=0; $i<$count; $i++) {
		$keyword=explode(" ",$naojin);//��ֹؼ���
		$dreamcount=count($keyword);//�ؼ��ָ���
		$detail=explode("\t",$dreamdb[$i]);
		for ($ai=0; $ai<$dreamcount; $ai++) {
			@eval("\$found = eregi(\"$keyword[$ai]\",\"$detail[0]\");");
			if(($found)){
				if(fmod($r_num,2)==0) $fcolor=' bgcolor="#f6f6f6"'; else $fcolor='';
				$pf_l .= '<tr'.$fcolor.'><td><a href="?id='.($i+1).'">'.$detail[0].'</a></td><td width="100"><input type="button" value=" �鿴�� " onclick="document.location=\'?id='.($i+1).'\'" /></td></tr>';
				$r_num++;
				break;
			}
		}
	}
	$pf_l = '<table width="700" cellpadding="2" cellspacing="0" class="mob_ace" style="border:1px solid #A4C4DC;"><tr><td style="background:url(/img/kuang5.gif);padding:0 5px;color:#014198;" height="25" valign="middle" colspan="5"><b><a href="./">�Խת��</a>���ҵ� <a href="./?q='.urlencode($naojin).'"><font color="#c60a00">'.$naojin.'</font></a> ������Խת��'.$r_num.'��</b></td></tr><tr><td><table id="cont" cellpadding="0" cellspacing="0" width="98%" align="center"><tr><td><strong>����</strong></td><td><strong>��</strong></td></tr>'.$pf_l.'</table></td></tr></table>';
}elseif($id>0){
	$dreamdb=file("data/naojin.dat");//��ȡ�Խת���ļ�
	$count=count($dreamdb);//��������

	$detail=explode("\t",$dreamdb[$id-1]);
	$pf = '<table width="700" cellpadding=2 cellspacing=0 class="mob_ace" style="border:1px solid #A4C4DC;"><tr><td style="background:url(/img/kuang5.gif);padding:0 5px;color:#014198;" height="25" valign="middle"><b><a href="./">�Խת��</a> > ����</b></td><td style="background:url(/img/kuang5.gif);padding:0 5px;color:#014198;" align="right">';
	if($id>1 && $id<=$count) $pf .= '<a href="?id='.($id-1).'">��һ��</a> ';
	$pf .= '<a href="./">�鿴ȫ��</a>';
	if($id>=1 && $id<$count) $pf .= ' <a href="?id='.($id+1).'">��һ��</a>';
	$pf .= '</td></tr><tr><td colspan="2" align="center"><br><table border="0" width="90%" style="font-size:14px;line-height:150%"><tr><td width="80">�����⡿</td><td>'.$detail[0].'</td></tr><tr><td>���𰸡�</td><td><input type="button" value=" �鿴�� " onclick="javascript:window.alert(\''.$detail[0].'\n\n���� '.trim($detail[1],"\n\r").'\');" /></td></tr></table><br></td></tr></table><br />';
}
if($naojin=="" || $id){
	$dreamdb=file("data/naojin.dat");//��ȡ�Խת���ļ�
	$count=count($dreamdb);//��������
	$pfl = rand(0,intval($count/60));

	for($i=$pfl*60; $i<$pfl*60+60; $i++) {
		if($i>=$count-1) break;
		$detail2=explode("\t",$dreamdb[$i]);
		if(fmod($r_num,2)==0) $fcolor=' bgcolor="#f6f6f6"'; else $fcolor='';
		$pf_l .= '<tr'.$fcolor.'><td><a href="?id='.($i+1).'">'.$detail2[0].'</a></td><td width="100"><input type="button" value=" �鿴�� " onclick="document.location=\'?id='.($i+1).'\'" /></td></tr>';
		$r_num++;
	}
	$pf_l = '<table width="700" cellpadding="2" cellspacing="0" class="mob_ace" style="border:1px solid #A4C4DC;"><tr><td style="background:url(/img/kuang5.gif);padding:0 5px;color:#014198;" height="25" valign="middle" colspan="5"><b>�Ƽ��Խת��'.$r_num.'��</b></td></tr><tr><td><br><table id="cont" cellpadding="0" cellspacing="0" width="96%" align="center">'.$pf_l.'</table><br></td></tr></table>';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<?
if($naojin){
	echo "<title>".$naojin." - �Խת�� - ���ֹ��� - - IP��ַ��ѯ|�ֻ���������ز�ѯ|���֤|�绰�����ѯ|����|������|����|���ֲ�ѯ|- ��ѯ��</title>";
	echo '<meta name="keywords" content="��ѯ��,�ܹ�����,�г�ʱ�̱�,�ֻ����������,�ʱ�,�Ƶ�����,���뼪��,IP��ַ,���ߴ�ȫ,ʵ�ò�ѯ��վ,������ѯ��,'.$naojin.',�Խת��,�Խת��," />';
}elseif($id>0 && $id<=$count){
	echo "<title>".$detail[0]." - �Խת�� - ���ֹ��� - - IP��ַ��ѯ|�ֻ���������ز�ѯ|���֤|�绰�����ѯ|����|������|����|���ֲ�ѯ|- ��ѯ��</title>";
	echo '<meta name="keywords" content="��ѯ��,�ܹ�����,�г�ʱ�̱�,�ֻ����������,�ʱ�,�Ƶ�����,���뼪��,IP��ַ,���ߴ�ȫ,ʵ�ò�ѯ��վ,������ѯ��,'.$detail[0].',�Խת��,�Խת���ȫ" />';
	echo '<meta name="description" content="�Խת�������'.$detail[0].' -- ���ͣ�'.trim($detail[1],"\n\r").'" />';
}else{
	echo "<title>�Խת�� - ���ֹ��� - - IP��ַ��ѯ|�ֻ���������ز�ѯ|���֤|�绰�����ѯ|����|������|����|���ֲ�ѯ|- ��ѯ��</title>";
	echo '<meta name="keywords" content="��ѯ��,�ܹ�����,�г�ʱ�̱�,�ֻ����������,�ʱ�,�Ƶ�����,���뼪��,IP��ַ,���ߴ�ȫ,ʵ�ò�ѯ��վ,������ѯ��,�Խת��,�Խת��" />';
	echo '<meta name="description" content="�Խת����һ�ִ��ڻ���������Ϸ������������Ϸ�и����Ե��ص㣬�������ͨ������ʮ�����ˣ�һ���ƣ������緹�����缸����еġ����ꡮ������ѧ��Ҫ�೤ʱ�䣿�������ǲ���һ�룩��������԰��ֻ�ȴ�����Ӷ̵Ķ�����ʲô���������ǡ�С�󡱣��������˽о��� ����һ���ص㣬�������治һ�����߼��ϵ���ϵ���еĴ�������һ�ֹ�硣���ԣ��𰸶��Ǳ���Ĳã�ͻ�Ƴ���ģ��ܸ�����гȤ����������ǵĸо������硰ʲô�������������㡱���ѡ������͡��㡱�ֿ���⣬�������ӡ���Ȼ��Ҳ��һ��Ψһ���Ϳ�˭�ĸ��ܴ̼����˵�Ц���ˡ���ˣ���ͬһ�����棬��Ҳ���Գ�����Ѱ�Ҹ���Ȥ��������������Ĵ𰸡� �Խת�����ָ��˼ά����������谭ʱ��Ҫ�ܿ���뿪ϰ�ߵ�˼·���ӱ�ķ�����˼�����⡣���ڷ�ָһЩ������ͨ����˼·���ش�ĵ������ʴ��⡣�Խת�����ȽϹ㷺���������࣬��Ц�࣬��ѧ�࣬������ȡ�" />';
}
?>
</head>
<body onMouseOut="window.status='(go5180.cn)��ѯ��!';return true">
<style type="text/css">
h3{font-size:18px;padding:10px 0 0 10px;color:#014198;}
p{padding: 10px;font-size:18px}
a.lan,a.lan:visited{color:#999;}
#cont td{height:30px;font-size:14px;padding:0 10px}
#cont a,#cont a:visited{text-decoration:none;}
#cont a:hover{text-decoration:underline;}
</style>

<div>
<table><tr>
<td height="25" class="f9pt">��Ŀǰ��λ�� &gt;&gt; <a href="../" target="_self" class=m>��ҳ</a> &gt; �Խת��</td>
</tr></table>
</div>

<div class="w950">
<div class="knr"><div class="xdh">
<ul id="ful">
<script language="javascript" type="text/javascript" src="/js1/yule.js"></script>
</ul></div></div>
<div class="head3"></div></div>

<script language="javascript" type="text/javascript" src="/js1/ad.js"></script>
<div style='height:5px;'></div>
<div class="w950">
  <div class="head4">
    <div class="Ico_aBox">
      <div class="Ico_aBox_icon INico62"></div>
      <div class="Ico_aBox_tit">�Խת��</div>
      <div class="Ico_aBox_intro">��������Դ�����</div>
    </div>
  </div>
  <div class="knr">
    <div class="mobile_main">
<table width="700" cellpadding="2" cellspacing="0" class="mob_ace" style="border:1px solid #A4C4DC;" id="top"><tr><td align="center" valign="middle" height="60"><form action="./" method="get" name="f1"><b>�����Խת��:<b><input name="q" id="q" type="text" size="18" delay="0" value="" style="width:200px;height:22px;font-size:16px;font-family: Geneva, Arial, Helvetica, sans-serif;" /> <input type="submit" class="mob_copy1" value=" ���� " /></td></tr><tr><td align="center" height="30" style="font-size:14px;">������̵Ĺؼ��֣����<a href="./?q=��">����</a>��ص��Խת��,����<a href="./?q=��">��</a>��Enter����</td></tr></table><div style='height:10px;'></div>
<?
if($naojin!=""){
	echo $pf_l;
}elseif($id>0 && $id<=$count){
	echo $pf.$pf_l;
}else{
?>
<table width="700" cellpadding="2" class="mob_ace" cellspacing="0" style="border:1px solid #A4C4DC;"><tr><td style="background:url(/img/kuang5.gif);padding:0 5px;color:#014198;" height="25" valign="middle" colspan="5"><b>�Խת��</b></td></tr><tr><td><p style="line-height:150%;font-size:12px;">�����Խת����һ�ִ��ڻ���������Ϸ������������Ϸ�и����Ե��ص㣬�������ͨ������ʮ�����ˣ�һ���ƣ������緹�����缸����еġ����ꡮ������ѧ��Ҫ�೤ʱ�䣿�������ǲ���һ�룩��������԰��ֻ�ȴ�����Ӷ̵Ķ�����ʲô���������ǡ�С�󡱣��������˽о��� <br>��������һ���ص㣬�������治һ�����߼��ϵ���ϵ���еĴ�������һ�ֹ�硣���ԣ��𰸶��Ǳ���Ĳã�ͻ�Ƴ���ģ��ܸ�����гȤ����������ǵĸо������硰ʲô�������������㡱���ѡ������͡��㡱�ֿ���⣬�������ӡ���Ȼ��Ҳ��һ��Ψһ���Ϳ�˭�ĸ��ܴ̼����˵�Ц���ˡ���ˣ���ͬһ�����棬��Ҳ���Գ�����Ѱ�Ҹ���Ȥ��������������Ĵ𰸡�<br>���� �Խת�����ָ��˼ά����������谭ʱ��Ҫ�ܿ���뿪ϰ�ߵ�˼·���ӱ�ķ�����˼�����⡣���ڷ�ָһЩ������ͨ����˼·���ش�ĵ������ʴ��⡣�Խת�����ȽϹ㷺���������࣬��Ц�࣬��ѧ�࣬�������
</p></td></tr></table><div style='height:10px;'></div>
<?
	echo $pf_l;
}
?>
</div>
</div>
  <div class="head3"></div>
<script language="javascript" type="text/javascript" src="/js1/footer_nei.js"></script>
<div style="display:none"><script type="text/javascript" src="/js1/tongji.js"></script></div>
</body>
</html>


