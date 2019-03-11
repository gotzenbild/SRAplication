<?php
header("Content-type: text/plain; charset=utf-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
if (isset($_REQUEST['log'])) { $login = $_REQUEST['log']; if ($login == '') { unset($login);} } 
if (isset($_REQUEST['pass'])) { $password=$_REQUEST['pass']; if ($password =='') { unset($pass);} }
if (empty($login) or empty($password))
{
    echo "Ошибка: не все поля заполнены";
}
else 
{
	$login = stripslashes($login);
	$login = htmlspecialchars($login);
	$password = stripslashes($password);
	$password = htmlspecialchars($password);
	$login = trim($login);
	$password = trim($password);
	include ("dbopen.php");
	$result = mysql_query("SELECT * FROM users WHERE login='$login'",$db);
	$myrow = mysql_fetch_array($result);
	if (empty($myrow['password']))
	{
		echo "Ошибка: неверный логин";
	}

	else {
		if ($myrow['password']==$password) 
		{
			$_SESSION['login']=$myrow['login']; 
			$_SESSION['id']=$myrow['id'];
			$_SESSION['current']=$_SESSION['login'];
			echo "Авторизация...",("<script>location.href='profil.html';</script>");
		}
		else {
			echo "Ошибка: сервер недоступен";
			}
		}
}
?>