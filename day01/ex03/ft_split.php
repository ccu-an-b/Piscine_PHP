<?PHP
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
	sort($tab);
	return $tab;
}
?>
