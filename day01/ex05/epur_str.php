#!/usr/bin/php
<?PHP
if ($argc == 2)
{
	$ok = 0;
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
			$ok = 1;
			if ($i != 0)
				echo " ".$tab[$i];
			else
				echo $tab[$i];
		}
	}
	if ($ok == 1)
		echo "\n";
}
?>
