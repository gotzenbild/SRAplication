<?php
header("Content-type: text/plain; charset=utf-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
if (isset($_REQUEST['comID'])) { $comID= $_REQUEST['comID']; if ($comID == '') { unset($comID);} }
if (empty($comID))
{
	 echo "ERROR";	
}
else
{
		
	include('dbopen.php');
	mysql_query("INSERT INTO `comments` (`comment`) VALUES('$comID')");
	echo "ERRORNOT";
}