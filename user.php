<?php
    session_start();
    {
        $log = $_GET["log"];
        $log = stripslashes($log);
	    $log = htmlspecialchars($log);
	    $log = trim($log);
	    include('dbopen.php');
	    $result = mysql_query("SELECT id FROM `users` WHERE login='$log'",$db);
	    $myrow = mysql_fetch_array($result);
		$_SESSION['current'] = $log;
		echo "Поиск...",("<script>location.href='profil.html';</script>");
    }
?>