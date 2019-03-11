<?php 
session_start();
mysql_connect("localhost", "root", "")
or die("<p>Ошибка подключения к базе данных! " . mysql_error() . "</p>");
mysql_select_db("myex")
 or die("<p>Ошибка выбора базы данных! ". mysql_error() . "</p>");

function handle_error($user_error_message, $system_error_message)
 {die ($user_error_message ." " . $system_error_message); };
 
$upload_dir = "user_images/";
$image_fildname = "user_pic";

 
$php_errors = array(1 => 'Превышен мах. размер файла, указанный в php.ini',
 2 => 'Превышенм мах. размер файла, указанный в форме html',
 3 => 'Была отправлена только часть файла',
 4 => 'Файл для отправки не был выбран');
 
 $_FILES[$image_fildname]['error'] == 0
or handle_error ("Серверу не удается получить Ваше изображение<br>" , $php_errors[$_FILES[$image_fildname]['error']]);

@getimagesize($_FILES[$image_fildname]['tmp_name'])
or handle_error("<p> Вы выбрали файл, который не является изображением<br>", $_FILES[$image_fildname]['tmp_name'] ." не является изображением");

$now = time();
while(file_exists($upload_filename = $upload_dir . $now . '-' . $_FILES[$image_fildname]['name'])){
	$now++;
}
//echo $upload_filename;

move_uploaded_file($_FILES[$image_fildname]['tmp_name'], $upload_filename)
or handle_error("возникла проблема при сохранении Вашего изображения в его постоянном месте <br>",
"ошибка, связанная с правами доступа при перемещении файла в {$upload_filename}");

$idS=$_SESSION['id'];

$insert_sql = "UPDATE `users`  SET img='$upload_filename' WHERE id ='".$idS."'";
mysql_query($insert_sql);
echo "<script>location.href='profil.php';</script>";
?>
