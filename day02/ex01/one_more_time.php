#!/usr/bin/php
<?PHP
date_default_timezone_set('Europe/Paris');

$day = array(
		0 => "lundi",
		1 => "mardi",
		2 => "mercredi",
		3 => "jeudi",
		4 => "vendredi",
		5 => "samedi",
		6 => "dimanche");

$month = array(
		1 => "janvier",
		2 => "fevrier",
		3 => "mars",
		4 => "avril",
		5 => "mai",
		6 => "juin",
		7 => "juillet",
		8 => "aout",
		9 => "septembre",
		10 => "octobre",
		11 => "novembre",
		12 => "decembre");

function	ft_is_lower($str)
{	
	$str = substr($str, 1);
	$tmp = strtolower($str);
	if (strcmp($str, $tmp) != 0)
		return false;
	return true;

}

function	ft_day($str, $day)
{
	foreach($day as $elem)
	{
		if (preg_match("/\b$elem\b/i", $str) == true)
		{
			if (ft_is_lower($str) == true)
				return true;
		}
	}
	return false;
}

function	ft_month($str, $month)
{
	foreach ($month as $key=>$elem)
	{
		if (preg_match("/\b$elem\b/i", $str) == true)
		{	
			if (ft_is_lower($str) == true)
				return $key;
		}
	}
	return -1;
}

function	ft_date($data)
{
	foreach($data as $elem)
		if($elem < 0)
			return false;
	if	($data[3] < 1970)
		return  false;
	else if ($data[1] > 31)
		return false;
	else if ($data[4] > 23 || strlen($data[4]) != 2)
		return false;
	else if ($data[5] > 59 || $data[6] > 59 || strlen($data[5]) !=2 || strlen($data[6]) !=2)
		return false;
	else
		return true;
}

function	ft_error()
{
	echo "Wrong Format\n";
	exit();
}

if ($argc == 2)
{
	if ($argv[1][0] == ' ')
		ft_error();
	$argv[1] = str_replace(":", " ", $argv[1]);
	$data = explode(" ", $argv[1]);
	if (ft_day($data[0], $day) == false)
		ft_error();
	if (($data[2] = ft_month($data[2], $month)) == -1)
		ft_error();
	if (ft_date($data) == false)
		ft_error();
	echo mktime($data[4], $data[5], $data[6], $data[2], $data[1], $data[3])."\n";
}
?>
