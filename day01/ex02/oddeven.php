#!/usr/bin/php
<?PHP

while (1)
{
	echo"Entrez un nombre: ";
	$val = trim(fgets(STDIN));
	if (feof(STDIN))
		exit;
	if (is_numeric($val))
	{
		$num = $val[strlen($val) - 1];
		if ($num % 2 === 0)
			echo "Le chiffre {$val} est Pair\n";
		else
			echo "Le chiffre {$val} est Impair\n";
	}
	else 
		echo "'{$val}' n'est pas un chiffre\n";
}
?>
