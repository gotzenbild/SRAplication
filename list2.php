<?php
        session_start();
		include('dbopen.php');
		$rows = 'SELECT * FROM users';
		$d = mysql_query($rows);
		$count = 0;
		$debils = array();
		while(($row = mysql_fetch_array($d)) and ($count < 7))
		{
			$count++;
			$debils[$row["login"]] = $row["assessment"];
		}
		arsort($debils);
		$count = 0;
		foreach($debils as $key=>$val)
		{
			$count++;	
			echo '<center><div id = "but"><font  class="p2" id = "'.$key.'" size="3" face="CALIBRI" style=" z-index: 3"><a># '.$count.' | ' .$key.'</a></font  ></div></center>';			
		}
		echo'<script src="js/go_all.js"></script>';
	?>