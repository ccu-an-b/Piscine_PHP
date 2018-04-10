<?PHP
function dir_verif()
{
	if (!($account = file_get_contents("../htdocs/private/passwd")))
		return FALSE;
	if (!($account = unserialize($account)))
		return FALSE;
	return $account;
}

function array_size($tab)
{
	$i = 0;
	while ($tab[$i] != "")
		$i++;
	return $i;
}


function auth($login, $passwd)
{
	if (($account = dir_verif()) == FALSE)
		return FALSE;

	for ($i = 0; $i < (array_size($account)) ; $i++)
	{
		if ($account[$i]['login'] == $login)
		{
			if($account[$i]['passwd'] == hash('whirlpool', $passwd))
				return TRUE;
			else
				return FALSE;
		}
	}
	return FALSE;
}
?>
