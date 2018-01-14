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
<div>
<form action="odbierz.php" method="POST" ENCTYPE="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="50000" />
<?php print"<input type='hidden' name='login' value='$login' />"; ?>
<input type="file" name="plik" />
<input type="submit" value="Wyślij plik" />
</form>
</div>
<br><br>
<div>
<form action="pobierz.php" method="POST">
<select name="pob">
<?php foreach(new DirectoryIterator($login) as $file)
  if(!$file->isDot())
$file->getFilename() . 
    print"<option value='$login/$file'>$file</option>";
	?>
			</select>
<input type="submit" value="Pobierz plik"/>
</form>
</div>

</body>
</html>