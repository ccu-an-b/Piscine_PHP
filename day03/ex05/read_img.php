<?PHP

date_default_timezone_set('Europe/Paris');

header('Date: '.date('D, d M Y H:i:s').' GMT');
header("Content-type: image/png");
readfile("../img/42.png");
?>

