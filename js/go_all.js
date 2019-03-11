$(document).ready(function(){
    $(".p2").click(function(){
        $(".page-profil").load("user.php","log="+$(this).attr("id"))
    })
})