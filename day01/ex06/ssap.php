#!/usr/bin/php
<?PHP

for ($i = 1; $i < $argc; $i++)
	$str .=" ".$argv[$i];
$tab = explode(" ", $str);
$size = sizeof($tab);
for ($i = 0; $i < $size; $i++)
{
	if ($tab[$i] == '')
	{
		array_splice($tab, $i, 1);
		$size--;
		$i--;
	}
}
sort($tab);
foreach($tab as $elem)
	echo $elem."\n";
?>
