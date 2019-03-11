<?php
        session_start();
        echo'<font  size="5" color="#008eb2" style = "width:100%; margin-bottom:10px;" face="CALIBRI">  <center style="box-shadow: 0 0 3px 3px #008eb2 ;">ЛУЧШИЕ</center></font  >';
		include('dbopen.php');
		$rows = 'SELECT * FROM users';
		$d = mysql_query($rows);
		$count = 0;
		$debils = array();
		while(($row = mysql_fetch_array($d)) and ($count < 10))
		{
			$count++;
			if($row['login'] != $_SESSION['login'])
				$debils[$row["login"]] = $row["assessment"];
		}
		arsort($debils);
		$count = 0;
		foreach($debils as $key=>$val)
		{
			$count++;	
			echo '<font  class="p2" id = '.$row["login"].' size="3" face="CALIBRI" style="width:245px ; height: 3%; "><a># '.$count.' | ' .$key.'</a></font  >';			
		}
	?>