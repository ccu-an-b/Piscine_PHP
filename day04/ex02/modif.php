<?PHP
session_start();
function error()
{
	echo "ERROR\n";
	exit();
}

function array_size($tab)
{
	$i = 0;
	while ($tab[$i] != "")
		$i++;
	return $i;
}

function new_passwd($i, $newpw, $account)
{
	$account[$i]['passwd'] = hash('whirlpool', $newpw);
	if (!file_put_contents("../htdocs/private/passwd", serialize($account)."\n"))
		error();
	echo "OK\n";
	exit();
}
if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] == 'OK')
{
	if (!file_exists("../htdocs/private/passwd"))
		error();
	if (!($account = file_get_contents("../htdocs/private/passwd")))
		error();
	if (!($account = unserialize($account)))
		error();
	for ($i = 0; $i < (array_size($account)) ; $i++)
	{
		if ($account[$i]['login'] == $_POST['login'])
		{
			if($account[$i]['passwd'] != hash('whirlpool',$_POST['oldpw']))
				error();
			new_passwd($i, $_POST['newpw'], $account);
		}
	}
}
error();
?>
