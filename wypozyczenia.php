<?php


baza();


switch(@$_GET['wypozyczenia'])
{

case("lista");

$nazwa = $_GET['lista'];
echo "<ul>";
mysql_query("SET CHARSET utf8");
 mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
$zapytanie=mysql_query("select * from lista where nazwa ='$nazwa'");

while ($wynik=mysql_fetch_array($zapytanie))	
{

echo "<h2>".$wynik['nazwa']."</h2>";
echo $wynik['nick'];


}

echo "<br><a href='index.php?wypozyczalnia=wypozyczenia'>Powrót</a>";
echo "</ul>";


break;

default:

echo "<ul>";

mysql_query("SET CHARSET utf8");
 mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
$zapytanie=mysql_query("select nazwa, count(nick) as total from lista where aktywna ='1' group by nazwa");

while ($wynik=mysql_fetch_array($zapytanie))	
{

echo "<h2>".$wynik['nazwa']."</h2>";
echo "Ilość wypożyczeń: ".$wynik['total'];

echo "<li><a href='index.php?wypozyczalnia=wypozyczenia&wypozyczenia=lista&lista=".$wynik['nazwa']."'>Zobacz zapisanych</a> ";



}


echo "</ul>";



}

?>