<?php
    session_start();
    if(isset($_POST['com']))
    {
        include("dbopen.php");
        $rows = 'SELECT * FROM users';
        $d = mysql_query($rows);
		while($row["login"] != $_SESSION["current"])
            if(!($row = mysql_fetch_array($d)))
                break;
        $id = $row["id"];
        $comm = $_POST['com'];
        $by = $_SESSION["id"];
        mysql_query("REPLACE INTO `comments` (`id_sender`,`id_target`,`comment`) VALUES('$by','$id','$comm')");
        echo("<script>location.href='profil.html';</script>");
    }
?> 