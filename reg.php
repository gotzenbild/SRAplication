<?php
if (isset($_REQUEST['logr'])) { $logr= $_REQUEST['logr']; if ($logr == '') { unset($logr);} }
if (isset($_REQUEST['passr'])) { $passr=$_REQUEST['passr']; if ($passr =='') { unset($passr);} }
if (isset($_REQUEST['mailr'])) { $mailr=$_REQUEST['mailr']; if ($mailr =='') { unset($mailr);} }
if (isset($_REQUEST['namer'])) { $namer=$_REQUEST['namer']; if ($namer=='') { unset($namer);} }
if (isset($_REQUEST['secr'])) { $secr=$_REQUEST['secr']; if ($secr =='') { unset($secr);} }
if (isset($_REQUEST['surr'])) { $surr=$_REQUEST['surr']; if ($surr =='') { unset($surr);} }
if (empty($logr) or empty($passr) or empty($mailr)or empty($namer)or empty($secr)or empty($surr))
{
	 echo "Ошибка: не все поля заполнены";	
}
else
{
	$logr = stripslashes($logr);
	$logr = htmlspecialchars($logr);
	$passr = stripslashes($passr);
	$passr = htmlspecialchars($passr);
	$mailr = stripslashes($mailr);
	$mailr= htmlspecialchars($mailr);
	$logr = trim($logr);
	$passr = trim($passr);
	$mailr = trim($mailr);
	$namer=stripslashes($namer);
	$namer= htmlspecialchars($namer);
	$secr = stripslashes($secr);
	$secr= htmlspecialchars($secr);
	$surr = stripslashes($surr );
	$surr= htmlspecialchars($surr);
	$namer = trim($namer);
	$secr = trim($secr);
	$surr = trim($surr);
	include('dbopen.php');
	$result = mysql_query("SELECT id FROM `users` WHERE login='$logr'",$db);
	$myrow = mysql_fetch_array($result);
	if (!empty($myrow['id'])) 
	{
		echo "Ошибка: логин занят";
		
	}
	else
	{
		$result2 = mysql_query("INSERT INTO `users` (`login`,`password`,`e-mail`,`name`,`secondname`,`surname`,`img`) VALUES('$logr','$passr','$mailr','$namer','$secr','$surr','user_images/0000.png')");
		$result = mysql_query("SELECT id FROM `users` WHERE login='$logr'",$db);
		$myrow = mysql_fetch_array($result);
		if ($result2=='TRUE')
		{
			session_start();
			$_SESSION['login']=$logr;
			$_SESSION['id']=$myrow['id'];
			$_SESSION['current']=$_SESSION['login'];
			echo $_SESSION['id']."Авторизация...",("<script>location.href='profil.html'</script>");
		}
		 else
		{
		   echo "Ошибка: сервер  не отвечает";;
		}
	}
}
?>