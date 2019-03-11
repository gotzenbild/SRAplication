<?php 
    session_start();
				if (empty($_SESSION["current"]))
					$_SESSION["current"] = $_SESSION["login"];
				include('dbopen.php');
				$rows = 'SELECT * FROM users';
				$d = mysql_query($rows);
				while($row["login"] != $_SESSION["current"])
					if(!($row = mysql_fetch_array($d)))
						break;
				$_SESSION['score'] = $row['assessment'];
				if ($_SESSION["current"] != $_SESSION["login"])
				{
					echo '
					<div class = "avatar">
					<img src="'.$row["img"].'" alt="poto" style="position:absolute;left:5%;top:9% ;"  height="35%" width="20%" />
					<div id="reviewStars-input">
					<form class = "score" action = "score.php" method = "post">
					<input id="star-4" type="radio" name="score" value = 5 ';
					if (intval($_SESSION['score']) == 5) 
						echo 'checked';
					echo '/>
    				<label title="5" for="star-4"  style="margin-right: 0px"></label>

					<input id="star-3" type="radio" name="score" value = 4 ';
					if (intval($_SESSION['score']) == 4) 
						echo 'checked';
					echo '/>
    				<label title="4" for="star-3"></label>

    				<input id="star-2" type="radio" name="score" value = 3 ';
					if (intval($_SESSION['score']) == 3) 
						echo 'checked';
					echo '/>
    				<label title="3" for="star-2"></label>

    				<input id="star-1" type="radio" name="score" value = 2 ';
					if (intval($_SESSION['score']) == 2) 
						echo 'checked';
					echo '/>
    				<label title="2" for="star-1"></label>

					<input id="star-0" type="radio" name="score" value = 1 ';
					if (intval($_SESSION['score']) == 1) 
						echo 'checked';
					echo '/>
					<label title="1" for="star-0"></label>

					<input class="bot8" id = "submit" type="submit"  value="Оценить" name="submit" />
					</form>
					</div>
					</div>';
					echo'<div class = "comments">
					<font size="6" color="#008eb2" face="CALIBRI">'.$row["name"].' '.$row["secondname"].' '.$row["surname"].' </font>
					<form class = "com" action = "comm.php" method = "post">
					<textarea type="text" cols="70" id="сomID" name = "com" style = "resize:none;"></textarea>
					<input class = "bot8" type = "submit" name = "submit" value = "Добавить коментарий"></input>
		</form>';
		}
		else
		{
		echo'
		<div class = "avatar">
		<img src="'.$row["img"].'" alt="poto" style="position:absolute;left:5%;top:9%; opacity = 1;"  height="35%" width="20%" />
		<div id="reviewStars-input">
		<form class = "score" action = "score.php" method = "post">
		<input id="star-4" type="radio" name="score" value = 5 ';
		if (intval($_SESSION['score']) == 5) 
			echo 'checked';
		echo ' disabled />
    	<label title="5" for="star-4"  style="margin-right: 0px"></label>

		<input id="star-3" type="radio" name="score" value = 4 ';
		if (intval($_SESSION['score']) == 4) 
			echo 'checked';
		echo ' disabled />
    	<label title="4" for="star-3"></label>

    	<input id="star-2" type="radio" name="score" value = 3 ';
		if (intval($_SESSION['score']) == 3) 
			echo 'checked';
		echo ' disabled />
    	<label title="3" for="star-2"></label>

    	<input id="star-1" type="radio" name="score" value = 2 ';
		if (intval($_SESSION['score']) == 2) 
			echo 'checked';
		echo ' disabled/>
    	<label title="2" for="star-1"></label>

    	<input id="star-0" type="radio" name="score" value = 1 ';
		if (intval($_SESSION['score']) == 1) 
			echo 'checked';
		echo ' disabled/>
		<label title="1" for="star-0"></label>
		</form>
		</div>
		</div>
		<div id="content">
<form action="send_img.php" method="post" enctype="multipart/form-data"style="position:absolute;left:4%;top:55% ; width: 215px;"  >
<input type="hidden" name="MAX_FILE_SIZE" value="2000000"  >
<input class = "bot8" type="file" name="user_pic" size="30" style = "width: 200px; overflow: hidden;">
<input class = "bot8" type="submit" value="Установить фото профиля" style="height: 25px; "   >
</form>

		</div>';
		echo'<div class = "comments">
		<font size="6" color="#008eb2" face="CALIBRI">'.$row["name"].' '.$row["secondname"].' '.$row["surname"].' </font>';
		}
		$rows = 'SELECT * FROM users';
		$d = mysql_query($rows);
		$id_log = array();
		if ($row["login"] == $_SESSION["current"])
		{
		$id = $row["id"];
		while($row = mysql_fetch_array($d))
		{
			$id_log[$row["id"]] = $row["login"];
		}
		$rows = 'SELECT * FROM comments';
		$d = mysql_query($rows);
		echo "<div class = 'coms'>";
		while($row = mysql_fetch_array($d))
		{
			if($row["id_target"] == $id)
			{
				echo '<font size="5" color="#008eb2" face="CALIBRI">'.$id_log[$row["id_sender"]].': </font><br>';
				echo $row["comment"];
				echo "<hr>";
			}
		}	
		}
		?>