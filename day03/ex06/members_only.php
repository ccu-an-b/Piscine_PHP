<?PHP

date_default_timezone_set('Europe/Paris');

$user = $_SERVER["PHP_AUTH_USER"];
$pw = $_SERVER["PHP_AUTH_PW"];
if ($user === "zaz" && $pw === "jaimelespetitsponeys")
{
	header('Content-Type: text/html');
	echo "<html><body>\n";
	echo "Bonjour Zaz<br />\n";
	echo "<img src='data:image/png;base64,";
	echo base64_encode(file_get_contents("../img/42.png"));
	echo "'";
	echo ">\n</body></html>\n";
}
else
{
	header("HTTP/1.0 401 Unauthorized");
	header("Date: ".date('D, d M Y H:i:s')." GMT");
	header("WWW-Authenticate: Basic realm=''Espace membres''");
	header_remove("Authentication problem. Ignoring this.");
	echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n";	
}
?>
