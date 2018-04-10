#!/usr/bin/php
<?PHP
if ($argc > 1)
{
	$str = str_replace("\t", " ", $argv[1]);
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
		else
		{
			if ($i == 0)
				echo $tab[$i];
			else
				echo " ".$tab[$i];
		}
	}
	echo "\n";
}
?>
