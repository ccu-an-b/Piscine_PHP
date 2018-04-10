#!/usr/bin/php
<?PHP

date_default_timezone_set('Europe/Paris');

// ajout d'un 0 pour les heures de 0 a 9
function time_verif($time)
{
	$tab = explode(":", $time);
	if ($tab[0]/10 < 1)
		$time = '0'.$time;
	return $time;
}

// recupere les datas 
function create_who($data)
{
	$tab = explode(" ",$data);
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
	if (preg_match("#^s#",$tab[1]) == true) //ajout du prefixe tty
		$tab[1]= 'tty'.$tab[1];
	$tab[3] = time_verif($tab[3]);
	$res=array($tab[0], $tab[1], date("M"), date("j"),$tab[3]);
	return $res;
}

// dans le cas ou les user sont pas tries
function tab_tri($res)
{
	$i = 1;
	while ($i < sizeof($res))
	{
		if (strcmp($res[$i][1], $res[$i - 1][1]) < 1 && ($res[$i][3] <= $res[$i -1][3]))
		{
			$tmp = $res[$i];
			$res[$i] = $res[$i - 1];
			$res[$i - 1] = $tmp;
			$i = 0;
		}	
		$i++;
	}
	return $res;
}

// affichage du resultat
function print_who($tab)
{
	foreach($tab as $key=>$elem)
	{
		if ($key == 4)
			echo $elem."\n";
		else if ($key == 2)
			echo " $elem ";
		else
			echo "$elem ";
	}
}

$data = shell_exec('w -h');
$tab = explode("\n", $data);
array_splice($tab, sizeof($tab)-1, 1); //suprimme dernier elem de $tab
for ($i = 0; $i < (sizeof($tab)); $i++) //creation double tab de data
	$res[$i] = create_who($tab[$i]); 
$res = tab_tri($res);
foreach($res as $elem)
	print_who($elem);
?>
