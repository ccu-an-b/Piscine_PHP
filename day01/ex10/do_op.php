#!/usr/bin/php
<?PHP
if ($argc != 4)
	echo "Incorrect Parameters\n";
else
{
	if (strstr($argv[2], "+") == true)
		echo $argv[1] + $argv[3]."\n";
	else if (strstr($argv[2], "*") == true)
		echo $argv[1] * $argv[3]."\n";
	else if (strstr($argv[2], "%") == true)
	{
		if ($argv[3] == 0)
			echo "Incorrect Parameters\n";
		else
			echo $argv[1] % $argv[3]."\n";
	}
	else if (strstr($argv[2], "/") == true)
	{
		if ($argv[3] == 0)
			echo "Incorrect Parameters\n";
		else
			echo $argv[1] / $argv[3]."\n";
	}
	else if (strstr($argv[2], "-") == true)
		echo $argv[1] - $argv[3]."\n";

}
?>
