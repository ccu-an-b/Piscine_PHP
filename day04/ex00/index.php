<?PHP
session_start();

if ($_GET['submit'] == 'OK')
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}


?>
<html><body>
<form>
	Identifiant: <input type="text" name="login" value="<?PHP echo $_SESSION['login']; ?>" />
	<br />
	Mot de Passe: <input type="password"  name="passwd" value="<?PHP echo $_SESSION['passwd']; ?>" />
	<input type="submit" name="submit"  value="OK">
</form>
</body></html>
