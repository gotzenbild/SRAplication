<?php
	session_start();
	if(empty($_SESSION["login"]))
    	echo("<script>location.href='index.html';</script>");
	?>
	<!DOCTYPE html>
<html>
<head>
  <title>PROFIL</title>
   <link  rel="stylesheet" href="main\profilcss.css">
</head>
<body>
<div id ="particles-js"></div>
<div class="page-menu"   >
	<div id = "menu">
	<font  size="5" color="#008eb2" face="CALIBRI"  style="width:100%; margin-bottom:10px"><center style = "box-shadow: 0 0 3px 3px #008eb2">МЕНЮ</center></font  >
	<font class="p" size="4"  class="p"  face="CALIBRI" style="width:245px"><a href="my.php">Профиль	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;</a></font  >
	<font class="p" size="4"  class="p"   face="CALIBRI" style="width:245px"><a href="all.php">Все пользователи	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;</a></font  >
	<font class="p" size="4"  class="p"   face="CALIBRI" style="width:245px"><a href="find.html">Найти &#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;</a></font  >
	<font class="p" size="4"  class="p"   face="CALIBRI" style="width:245px"><a href="exit.php">Выход	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;	&#160;</a></font  >
	</div>
	<div id = "best">
	<font  size="5" color="#008eb2" style = "width:100%; margin-bottom:10px;" face="CALIBRI">  <center style="box-shadow: 0 0 3px 3px #008eb2 ;">ЛУЧШИЕ</center></font  >
	<?php
		include('dbopen.php');
		$rows = 'SELECT * FROM users';
		$d = mysql_query($rows);
		$count = 0;
		$debils = array();
		while(($row = mysql_fetch_array($d)) and ($count < 7))
		{
			if($row['login'] != $_SESSION['login'])
				$debils[$row["login"]] = $row["assessment"];
		}
		arsort($debils);
		foreach($debils as $key=>$val)
		{
			$count++;	
			echo '<font  class="p2" id = '.$row["login"].' size="3" face="CALIBRI" style="width:245px ; height: 3%; "><a># '.$count.' | ' .$key.'</a></font  >';			
		}
	?>
	</div>

</div>
<div class="page-profil">



<!--<div class ="comment">
<form id="comF">
<textarea type="text" rows="2" cols="70" id="сomID" >
</textarea>
<input class="bot8" type="button" value="Отправить" id="comButID" style="position:absolute;top:78%;left:800px;width:100px">
</form>
<p   id="e"></p>
</div>-->
			<?php 
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
		<img src="'.$row["img"].'" alt="poto" style="position:absolute;left:5%;top:9% ;box-shadow: 0 0 3px 3px #008eb2"  height="35%" width="20%" />
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
		</div>
		</div>
</div>
	
<div class="page-logo">
	<a href='index.html'><image src="img/hat.png" alt="LOGO" width="100%" height="100%" style ="border-radius: 5px;"/></a
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" defer> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js" defer> </script>
<script src="main.js" defer></script>
<script src="particles.json" defer></script>
<script src = "js/jquery-3.3.1.min.js"></script>
<script	 src="commentsend.js"></script> 
</body>
</html>