<?php


baza();


switch(@$_GET['wypozycz'])
{


case("zapisz"):


$id=$_GET['zapisz'];
if(!@$_SESSION['email']) break;


echo "<ul>";

mysql_query("SET CHARSET utf8");
 mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
$zapytanie=mysql_query("select * from wypozyczone where id ='$id' ");

while ($wynik=mysql_fetch_array($zapytanie))	
{


echo "Cena za tydzień: ".$wynik['stawka']." zł";
echo "<br>";

zapisane($wynik['Nazwa']);

}

echo "</ul>";

break;

default:
if (@$_SESSION['email'] == "admin@wk.com")
echo "<a href='index.php?wypozyczalnia=wypozyczenia'>Przeglądaj liste wypożyczonych pozycji</a>";
echo "<ul>";

mysql_query("SET CHARSET utf8");
 mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
$zapytanie=mysql_query("select * from wypozyczone where zaakceptowane ='0' ");

while ($wynik=mysql_fetch_array($zapytanie))	
{

echo "<h2>".$wynik['Nazwa']."</h2>";

echo $wynik['opisik'];
echo "<br>Cena za tydzień: ";
echo $wynik['stawka']." zł.";

if (@$_SESSION['email'])echo "<li><a href='index.php?wypozyczalnia=wypozycz&wypozycz=zapisz&zapisz=".$wynik['id']."'>Wypożycz teraz!</a> ";


}

echo "</ul>";

echo "<br>";
}

?>