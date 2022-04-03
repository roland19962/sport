<?php
$folder = $modx->getOption('mn_Folder', $scriptProperties, '');
$type = $modx->getOption('mn_Type', $scriptProperties, '');
$full_month = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
$ab_month   = array('Jan.', 'Feb.', 'Mar.', 'Apr.', 'May', 'Jun.', 'Jul.', 'Aug.', 'Sept.', 'Oct.', 'Nov.', 'Dec.');
if ($type == 'short') {
	$ar = $ab_month;
} else {
	$ar = $full_month;
}
$ab_month_1   = array('x01', 'x02', 'x03', 'x04', 'x05', 'x06', 'x07', 'x08', 'x09', "x10", 'x11', 'x12');
$output = ltrim(str_replace($ab_month_1, $ar, $folder), 'x');
//$output = str_replace($ab_month_1, $ar, $folder);
echo $output;