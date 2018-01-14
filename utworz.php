<?php
$nazwa=$_POST['nazwa'];
$log=$_POST['log'];
mkdir ("$log/$nazwa", 0777);

echo "Utworzono nowy folder :)<br>";
print"<meta http-equiv='refresh' content='1; url=http://aemm.pl/z7/glowna.php?nick=$log'> Za chwilę nastąpi przekierowanie na stronę zarządzania plikami";
?>