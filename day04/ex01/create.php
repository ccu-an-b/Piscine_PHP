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
function new_account($login, $passwd, $account)
{
	$size = array_size($account);
	$account[$size] = array('login' => $login, 'passwd' => hash('whirlpool', $passwd));
	if (!file_put_contents("../htdocs/private/passwd", serialize($account)."\n"))
		error();
}

if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] == 'OK')
{
	if (!file_exists("../htdocs/"))
		mkdir("../htdocs/", 0755);
	if (!file_exists("../htdocs/private/"))
		mkdir("../htdocs/private/", 0755);
	if (!file_exists("../htdocs/private/passwd"))
		new_account($_POST['login'], $_POST['passwd'], $account);
	else 
	{
		if (!($account = file_get_contents("../htdocs/private/passwd")))
			error();

		if (!($account = unserialize($account)))
			error();
		for ($i = 0; $i < (array_size($account)) ; $i++)
		{
			if ($account[$i]['login'] == $_POST['login'])
				error();
		}
		new_account($_POST['login'], $_POST['passwd'], $account);

	}
	echo "OK\n";
}
else
	echo "ERROR\n";
?>
