<?PHP

if ($_GET["action"] == "set")
{
	if ($_GET["name"] && $_GET["value"])
		setcookie($_GET["name"], $_GET["value"], time() + (3600 * 24));
}
else if ($_GET["action"] == "get")
{
	if ($_COOKIE[$_GET["name"]])
		echo $_COOKIE[$_GET["name"]]."\n";
}

else if ($_GET["action"] == "del")
{
	setcookie($_GET["name"], "", time()-1);
}
?>
