<html>
<head>
     <title>A.L. - zarzadzanie plikami</title>
</head>
<body>
<?php $login=$_GET['nick'];											//pobieranie loginu użytkownika
?>
<div style="position: absolute; right: 20px; top: 10px"> 
<a href="wylog.php">Wyloguj </a><br><br>
</div>
Dodawanie pliku do katalogu macierzystego
<div>
<form action="odbierz.php" method="POST" ENCTYPE="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="50000" />
<?php print"<input type='hidden' name='login' value='$login' />"; ?>
<input type="file" name="plik" />
<input type="submit" value="Wyślij plik" />
</form>
</div>
<br><br>
Pobieranie pliku ze swojego katalogu macierzystego
<div>
<form action="pobierz.php" method="POST">
<select name="pob">
<?php foreach(new DirectoryIterator($login) as $file)
    if(!$file->isDot() && is_file($file))
	$file->getFilename() . 
    print"<option value='$login/$file'>$file</option>";
	?>
			</select>
<input type="submit" value="Pobierz plik"/>
</form>
</div>
<br><br>
Tworzenie nowego folderu w folderze macierzystym
<div>
<form action="utworz.php" method="POST">
<input type="text" name="nazwa" />
<?php print"<input type='hidden' name='log' value='$login' />"; ?>
<input type="submit" value="Utwórz" />
</form>
</div>
<br><br>

Twoje katalogi
<?php
$katalog = "./$login";
$kat = opendir($katalog);

while ($plik = readdir($kat))
{
   if(is_dir($katalog.'/'.$plik))
   {
      echo "$plik<br />";
   }
}
closedir($kat);?>
</body>
</html>