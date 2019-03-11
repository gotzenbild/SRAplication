<?php
session_start();
if (isset($_REQUEST['log'])) { $log= $_REQUEST['log']; if ($log == '') { unset($log);} }
if (empty($log))
{
	 echo "Ошибка: поле не заполнено";	
}
else
{
	$log = stripslashes($log);
	$log = htmlspecialchars($log);
	$log = trim($log);
	include('dbopen.php');
	$result = mysql_query("SELECT id FROM `users` WHERE login='$log'",$db);
	$myrow = mysql_fetch_array($result);
	if (empty($myrow['id'])) 
	{
		echo "Ошибка: логин не верный";
		
	}
	else
	{
		$_SESSION['current'] = $log;
		echo "Поиск...",("<script>location.href='profil.html';</script>");
	}
}
?>