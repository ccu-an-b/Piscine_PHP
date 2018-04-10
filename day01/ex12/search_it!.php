#!/usr/bin/php
<?PHP
if ($argc > 2)
{
	for($i = 2; $i < $argc; $i++)
	{
		if (strstr($argv[$i], $argv[1]) == true)
		{
			$tab = explode(":", $argv[$i]);
			$res =  $tab[1];
		}
	}
	if ($res != '')
		echo $res."\n";
}
?>
