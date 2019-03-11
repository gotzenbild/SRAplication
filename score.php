<?php
    session_start();
    if(isset($_POST['score']))
    {
        include("dbopen.php");
        $rows = 'SELECT * FROM users';
        $d = mysql_query($rows);
		while($row["login"] != $_SESSION["current"])
            if(!($row = mysql_fetch_array($d)))
                break;
        $id = $row["id"];
        $score = $_POST['score'];
        $by = $_SESSION["id"];
        mysql_query("REPLACE INTO score SET id_by = $by, id_for = $id, score = $score");
        $sum = 0;
        $count = 0;
        $rows = 'SELECT * FROM score';
        $d = mysql_query($rows);
		while($row = mysql_fetch_array($d))
            if($row['id'] = $id)
            {
                $sum = $sum + $row['score'];
                $count = $count + 1;
            }
        $score = $sum/$count;
        mysql_query("INSERT INTO users SET id = $id ON DUPLICATE KEY UPDATE assessment = $score");
        echo("<script>location.href='profil.html';</script>");
    }
?> 