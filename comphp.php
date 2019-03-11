<?php
session_start();
header("Content-type: text/plain; charset=utf-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
if (isset($_REQUEST['comID'])) 
{	 $comID= $_REQUEST['comID'];
	echo $comID;
	if ($comID == '') { unset($comID);} }
if (empty($comID))
{
	 echo "" ;	
}
else
{	include('dbopen.php');
	$rows = 'SELECT * FROM users';
	$d = mysql_query($rows);
	while($row["login"] != $_SESSION["current"])
        if(!($row = mysql_fetch_array($d)))
			break;
    $id_target = $row["id"];
    $id_sender = $_SESSION["id"];
	$comID = stripslashes($comID);
	$comID= htmlspecialchars($comID);
	mysql_query("INSERT INTO `comments` (`id_sender`,`id_target`,`comment`) VALUES('$id_sender','$id_target','$comID')");
}