#!/usr/bin/php
<?PHP

function replace_tolower($tab)
{
	return preg_replace("/$tab[1]/", strtolower($tab[1]), $tab[0]);
}

function replace_toupper($tab)
{
	if (preg_match_all("/<(.+)>/", $tab[1]) == true && preg_match_all("/(.+)<.+>/", $tab[1]) == false)
		return $tab[0];
	return preg_replace("/$tab[1]/", strtoupper($tab[1]), $tab[0]);
}

function replace($tab)
{
	$tab[0] = preg_replace_callback("/<a.+>(.+)<\/a>/U", "replace_toupper", $tab[0]);
	$tab[0] = preg_replace_callback("/<a.+>.+(<.+>)<\/a>/U", "replace_tolower", $tab[0]);
	$tab[0] = preg_replace_callback("/title=\"(.+)\"/", "replace_toupper", $tab[0]);
	return $tab[0];
}

if (count($argv) != 2)
	exit();
$lines = file_get_contents($argv[1]);
$tab = preg_replace_callback("/<a(.*)\/a>/","replace", $lines);
echo $tab;
?>
