#!/usr/bin/php
<?PHP
function     cmp($a, $b)
{
	$j = 0;
	$v = 0;
	$a = strtolower($a);
	$b = strtolower($b);
	$ascii = "abcdefghijklmnopqrstuvwxyz0123456789 !\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
	for ($k = 0; $k < strlen($a) && $a[$k] == $b[$k]; $k += 1);
	while ($ascii[$v] != $a[$k])
		$v++;
	while ($ascii[$j] != $b[$k])
		$j++;
	return ($v - $j);
}
if ($argc == 1)
	exit();
$str = array();
for ($i = 1; $i < $argc; $i++)
{
	$arg = explode(" ", $argv[$i]);
	$str = array_merge($str, $arg);
}
usort($str, cmp);
$size = sizeof($str);

foreach ($str as $key=>$elem)
{

	if ($key == ($size - 1))
	{
		echo $elem."\n";
		exit ;
	}
	else
		echo $elem."\n";
}
?>	
