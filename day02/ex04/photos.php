#!/usr/bin/php
<?PHP

function ext_src($str)
{
	preg_match('/src="([^"]+)"/', $str, $res); //recupere le lien source
	return $res[1];
}

function ext_img($tab)
{
	foreach($tab[0] as $key=>$elem) //pour chaque resultat du preg_match_all precedent
		$res[$key] = ext_src($elem);
	return $res;
}

function save_img($src, $url)
{
	foreach($src as $elem)
	{
		if ($elem[0] != '/')
		{
			$img_name = basename($elem);
			$img = $url."/".$img_name;
			if (file_exists($img)) //si le fichier existe deja > delete
				unlink($img);

			$fd = fopen($img, 'wb');
			$ch = curl_init($elem);
			curl_setopt($ch, CURLOPT_FILE, $fd); //copie le transfert cUrl dans $fd
			curl_setopt($ch, CURLOPT_HEADER, 0); //exclue le header
			curl_exec($ch);
			curl_close($ch);
			fclose($fd);
		}
	}
}

if ($argc == 2)
{
	$ch = curl_init($argv[1]);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //retourne transfer cUrl sous forme de chaine
	$html = curl_exec($ch);
	curl_close($ch);
	preg_match_all('/<img[^>]+>/', $html, $img); //recupere les balise img

	$src = ext_img($img);

	$argv[1] = str_replace("http://", "", $argv[1]); //creation du dossier img si il existe pas
	$argv[1] = str_replace("https://", "", $argv[1]);
	if (file_exists($argv[1]) == FALSE)
		mkdir($argv[1], 0777, true);
	if (sizeof($src) != 0)
		save_img($src, $argv[1]);
}
?>
