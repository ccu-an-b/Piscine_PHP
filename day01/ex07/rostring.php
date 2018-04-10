#!/usr/bin/php
<?PHP

if ($argc == 1)
	exit();

$tab = explode(" ", $argv[1]);
$size = sizeof($tab);
for ($i = 0; $i < $size; $i++)
{
	if ($tab[$i] == '')
	{
		array_splice($tab, $i, 1);
		$size--;
		$i--;
	}
	else
	{
		if ($i == 1)
			echo $tab[$i];
		else if ($i > 1)
			echo " ".$tab[$i];
	}
}
if ($size > 1)
	echo " ".$tab[0]."\n";
else
	echo $tab[0]."\n";
?>
