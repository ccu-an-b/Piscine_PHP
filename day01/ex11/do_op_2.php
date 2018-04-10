#!/usr/bin/php
<?PHP

function ft_verify($array)
{
	foreach ($array as $elem)
	{
		if (is_numeric($elem) == false)
		{
			echo "Syntax Error\n";
			exit();
		}
	}
	return true;
}

function ft_split($str)
{
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
	if (sizeof($tab) > 3)
	{
		echo "Syntax Error\n";
		exit();
	}
	$res = implode ($res, $tab);
	return $res;
}

if ($argc != 2)
	echo "Incorrect Parameters\n";

else
{
	$argv[1] = ft_split($argv[1]);
	if (strstr($argv[1], "+") == true)
	{	
		$tab = explode("+", $argv[1]);
		ft_verify($tab);
		echo $tab[0] + $tab[1]."\n";
	}
	else if (strstr($argv[1], "*") == true)
	{
		$tab = explode("*", $argv[1]);
		ft_verify($tab);
		echo $tab[0] * $tab[1]."\n";
	}
	else if (strstr($argv[1], "%") == true)
	{
		$tab = explode("%", $argv[1]);
		if ($tab[1] == 0)
		{
			echo "Syntax Error\n";
			exit();
		}
		ft_verify($tab);
		echo $tab[0] % $tab[1]."\n";
	}
	else if (strstr($argv[1], "/") == true)
	{
		$tab = explode("/", $argv[1]);
		if ($tab[1] == 0)
		{
			echo "Syntax Error\n";
			exit();
		}
		ft_verify($tab);
		echo $tab[0] / $tab[1]."\n";
	}
	else if (strstr($argv[1], "-") == true)
	{
		$tab = explode("-", $argv[1]);
		for($i = 0; $i < sizeof($tab); $i++)
		{
			if ($tab[$i] == '')
			{
				$tab[$i + 1] = "-".$tab[$i + 1];
				array_splice($tab, $i, 1);
				$i--;
			}
		}
		ft_verify($tab);
		echo $tab[0] - $tab[1]."\n";
	}
	else
		echo "Syntax Error\n";
}
?>
