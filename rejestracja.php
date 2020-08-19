<?php
baza();
if (@$_POST['email']<>'')
{
$imie=$_POST['imie'];
	$nazwisko=$_POST['nazwisko'];
	$email=$_POST['email'];
	$haslo1=$_POST['haslo1'];
	$haslo2=$_POST['haslo2'];
	$powiadomienia=$_POST['powiadomienia'];
	$plec=$_POST['plec'];
	$wyksztalcenie=$_POST['wyksztalcenie'];
	$osobie=$_POST['osobie'];
	echo "teraz to sie bedzie dzialo<br>";
	
	
	if 	($haslo1<>$haslo2) 		
	{
		komunikat('blad','cos poszlo nie tak');
	}
	else komunikat('ok','wszystko w porzadku');
	
	//echo "insert into user values('','$imie','$nazwisko','$email','$haslo1','$powiadomienia','$plec','$wyksztalcenie','$osobie')";
	$zapytanie=mysql_query("select * from user where email='$email'");
	if (mysql_num_rows($zapytanie)<>'0')
		komunikat("blad","Uzytkownik o takim adresie email juz istnieje w bazie danych");
	else
	{
	
	$zapytanie=mysql_query("insert into user values('','$imie','$nazwisko','$email','$haslo1','$powiadomienia','$plec','$wyksztalcenie','$osobie')");
	
	if (!$zapytanie) komunikat('blad','problem z zapisaniem danych');
	else komunikat('ok','dane zostaly zapisane');
	}
}
else
formrej();
?>