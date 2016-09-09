<?php
header("Content-Type:text/html;charset=utf-8");
$text   = $_GET['keys'];
$output = '';
$tab_text = str_split($text); 
foreach ($tab_text as $id=>$char){
  $hex = dechex(ord($char));
  $output .= '%' . $hex;
}
echo "<a href=http://www.baidu.com/s?wd=".$output." target=_blank>查看</a>";
?>