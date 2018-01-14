<html>
<head>
     <title>A.L. - zarzadzanie plikami</title>
</head>
<body>
<?php 
$login=$_POST['login'];	 
$max_rozmiar = 1000;
if (is_uploaded_file($_FILES['plik']['tmp_name']))
{
if ($_FILES['plik']['size'] > $max_rozmiar) {echo "Przekroczenie rozmiaru $max_rozmiar"; }
else
{
move_uploaded_file($_FILES['plik']['tmp_name'],$login/$_FILES['plik']['name']);
echo 'Odebrano plik: '.$_FILES['plik']['name'].'<br/>';
if (isset($_FILES['plik']['type'])) {echo 'Typ: '.$_FILES['plik']['type'].'<br/>'; }

}
}
else {echo 'Błąd przy przesyłaniu danych!';}
print"<br><a href='glowna.php?nick=$login'>Powróć na stronę główną</a>";?>
</body>
</html>