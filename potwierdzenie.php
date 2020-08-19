<?php

baza();
$okres=$_POST['okres']; 
$nazwa=$_POST['nazwa']; 
$nick= $_SESSION['email'];


mysql_query("SET CHARSET utf8");
 mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
mysql_query("insert into lista values('','$nazwa', '$nick','$okres','1')");



echo "Pomyślnie wypożyczyłeś książkę - ".$nazwa;
echo "<BR>Od teraz jest ona dostępna w zakładce MOJE KSIĄŻKI";




?>