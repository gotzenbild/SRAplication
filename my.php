<?php
    session_start();
    $_SESSION['current'] = $_SESSION['login'];
    echo("<script>location.href='profil.html';</script>");
?>