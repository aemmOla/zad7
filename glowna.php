<html>
<head>
     <title>A.L. - zarzadzanie plikami</title>
</head>
<body>
<body>
<?php $login=$_GET['nick'];											//pobieranie loginu użytkownika
$dbhost="localhost"; $dbuser="aemmpl_ola"; $dbpassword="XXXXX"; $dbname="aemmpl_bazola"; 
$polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword); 		//łączenie z bazą danych
mysqli_select_db ($polaczenie, $dbname); 
$rez=mysqli_query ($polaczenie, "SELECT id FROM users2 WHERE login='$login'");
$i=mysqli_fetch_array ($rez); 
$idk=$i[0];
?>
<div style="position: absolute; right: 20px; top: 10px"> 
<a href="wylog.php">Wyloguj </a><br><br>
<form action="odbierz.php" method="POST" ENCTYPE="multipart/form-data"> 
<input type="file" name="plik"/> 
<input type="submit" value="Wyślij plik"/> 
</form> 
</div>