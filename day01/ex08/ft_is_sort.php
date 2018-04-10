<?PHP
function ft_is_sort($tab)
{
	$tab_sort = $tab;
	sort($tab_sort);
	foreach($tab as $key=>$value)
	{
		if ($value !=  $tab_sort[$key])
			return false;
	}
	return true;
}
?>
