<html>
<head>
     <title>A.L. - zarzadzanie plikami</title>
</head>
<body>
<?php $login=$_GET['nick'];	 
if (is_uploaded_file($_FILES['plik']['tmp_name'])) 
{ echo 'Odebrano plik: '.$_FILES['plik']['name'].'<br/>'; 
$tmp_name = $_FILES['plik']['tmp_name'];
move_uploaded_file($tmp_name, "/domains/aemm.pl/public_html/z7/$login/.$_FILES['plik']['name']."); } 
else {echo 'Błąd przy przesyłaniu danych!';} 
print"<br><a href='glowna.php?nick=$login'>Powróć na stronę główną</a>";?>
</body>