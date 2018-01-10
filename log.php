<html>
<head>
     <title>A.L. - log.php</title>
</head>
<body>
<?php
$dbhost="localhost"; $dbuser="aemmpl_ola"; $dbpassword="XXXXX"; $dbname="aemmpl_bazola"; 
$polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword);                       
mysqli_select_db ($polaczenie, $dbname);
$data = date('d.m.Y H:i:s', time());  
$ip = $_SERVER["REMOTE_ADDR"];											
$log = $_POST['login'];
$haslo = $_POST['haslo'];
$rez = mysqli_query ($polaczenie, "SELECT `haslo` FROM `users2` WHERE login='$log'"); 

if (empty($_POST['login'])||empty($_POST['haslo'])||mysqli_fetch_array ($rez)==false) {
	echo "Podano błędny login lub hasło.";											
	print "<br><a href='logowanie.php'>Spróbuj jeszcze raz</a>";
}
else {
$rez = mysqli_query ($polaczenie, "SELECT `haslo` FROM `users2` WHERE login='$log'"); 
$h= mysqli_fetch_array ($rez);   
$hasb=$h[0];
$login=$log;
		$rez1 = mysqli_query ($polaczenie, "SELECT `id` FROM `users2` WHERE login='$login'"); 
        $i=mysqli_fetch_array ($rez1); 
		$idu=$i[0];
		$rez2 = mysqli_query ($polaczenie, "SELECT `lp` FROM `users2` WHERE id='$idu'"); 
        $l=mysqli_fetch_array ($rez2); 
		$lp=$l[0];
		if ($lp==3)
			echo"<font color='red'>Konto zablokowane.</font><br>Podano trzykrotnie błędne hasło.<br> Aby odblokować konto skontaktuj się z administratorem.";
		else{
			if ($haslo === $hasb){		
				if ($lp!=0){
					$zap1="UPDATE `users2` SET lp='0' WHERE id='$idu'";
					$rezult1= mysqli_query ($polaczenie,$zap1);
					$zap2="INSERT INTO `logi`(`idu`,`data`, `IP`,`log`) VALUES ('$idu','$data','$ip','1')";
					$rezult2= mysqli_query ($polaczenie,$zap2);
					$rez3= mysqli_query ($polaczenie, "SELECT data FROM logi WHERE idu='$idu' AND log='0' ORDER BY id DESC LIMIT 1 "); 
					$c=mysqli_fetch_array ($rez3); 
					$czas=$c[0];
					echo "Witaj!<br>";
					echo "Ostatnie nieudane logowanie: $czas .<br>";
					print "<br><a href='glowna.php?nick=$login'>Zarządzaj plikami</a>";//przekierowanie na stronę zarządzania plikami wraz z przesłaniem loginu użytkownika
				}
				else{
					$zap2="INSERT INTO `logi`(`idu`,`data`, `IP`,`log`) VALUES ('$idu','$data','$ip','1')";
					$rezult2= mysqli_query ($polaczenie,$zap2);
					echo "Witaj!";
					print "<br><a href='glowna.php?nick=$login'>Zarządzaj plikami</a>";//przekierowanie na stronę zarządzania plikami wraz z przesłaniem loginu użytkownika
				}
			}				
			else {
				$lp+=1;																			//Błędne hasło
				$zap4="UPDATE `users2` SET lp='$lp' WHERE id='$idu'";
				$rezult4= mysqli_query ($polaczenie,$zap4);
				$zap5="INSERT INTO `logi`(`idu`,`data`, `IP`,`log`) VALUES ('$idu','$data','$ip','0')";
				$rezult5= mysqli_query ($polaczenie,$zap5);
				echo "Błędne hasło.";
				print "<br><a href='logowanie.php'>Spróbuj jeszcze raz</a>";
			}
}
}
?>
</body>
</html>
