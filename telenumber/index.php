<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Calling List</title>
</head>

<body>
<?php
$file="spa3102.log";
$germantimeoffset=9*60*60;
$chinatimeoffset=15*60*60;
$file_handle = fopen($file, "r");
$i=0;
while (!feof($file_handle)) {
   $line = fgets($file_handle);
   $linetmp=explode(" ",$line);
   if (!empty($linetmp[0])){
   		$lineresulttmp[$i]=array($linetmp[0],$linetmp[1],$linetmp[2],$linetmp[3],$linetmp[4],$linetmp[5],$linetmp[8]);
   	}
   $i++;
}
fclose($file_handle);
$lineresult=array_reverse($lineresulttmp);
//print_r($lineresult);
foreach($lineresult as $tmp){
	//echo (int)$tmp[3];
	$date1=date("Y-m-d H:i:s",$germantimeoffset+mktime((int)$tmp[3],(int)$tmp[4],(int)$tmp[5],(int)$tmp[1],(int)$tmp[2],(int)$tmp[0]));
	$date2=date("Y-m-d H:i:s",$chinatimeoffset+mktime((int)$tmp[3],(int)$tmp[4],(int)$tmp[5],(int)$tmp[1],(int)$tmp[2],(int)$tmp[0]));
	echo "(German)".$date1." "."(China)".$date2." ".$tmp[6];
	echo "<br>";
	}

?>
</body>
</html>