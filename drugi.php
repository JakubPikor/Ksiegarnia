<?php


baza();


switch(@$_GET['drugi'])
{

case("rozwiniecie"):
$id=$_GET['rozwiniecie'];
$zapytanie=mysql_query("select * from ksiazki where id='$id'");
$wynik=mysql_fetch_array($zapytanie);

echo "<h2>".$wynik['tytul']."</h2>";
echo $wynik['tresc']."<p>".$wynik['autor']." - ".$wynik['data']."<hr>";

if(@$_SESSION['email'])
echo "<div style='text-align: right;'><a href='index.php?
wypozyczalnia=drugi&drugi=komentarz&komentarz=".$id."'>Dodaj komentarz </a></div>";

$zapytanie=mysql_query("select * from ksiazki where rodzic='$id'");
echo "<ul>";
while($wynik=mysql_fetch_array($zapytanie))
{
echo "<li>".$wynik['tresc']."<br><i>".$wynik['autor']." - ".$wynik['data']."</i><hr>";
}
echo "</ul>";


break;

case("komentarz"):
forum2($_GET['komentarz']);
break;

case("zapisz"):
if(!@$_SESSION['email']) break;

$rodzic=$_POST['rodzic']; 

if($rodzic=='0') $tytul=$_POST['tytul'];
else $tytul="komentarz";

$tresc=$_POST['tresc']; 
$autor=$_POST['autor']; 
$data=$_POST['data'];
mysql_query("SET CHARSET utf8");
    mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
mysql_query("insert into ksiazki values('','$rodzic', '$tytul', '$tresc', '$autor', '$data')");
header("location: index.php?wypozyczalnia=drugi");

break;


case("nowy_watek"):
Home('0');
break;

default:

echo "<ul>";

mysql_query("SET CHARSET utf8");
 mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
$zapytanie=mysql_query("select * from ksiazki where rodzic='0' order by data asc");

while ($wynik=mysql_fetch_array($zapytanie))	
{

echo "<h2>".$wynik['tytul']."</h2>";
echo $wynik['tresc'];
$id=$wynik['id'];

if(@$_SESSION['email'])
echo "<div style='text-align: right;'><a href='index.php?
wypozyczalnia=drugi&drugi=komentarz&komentarz=".$id."'>Dodaj komentarz </a></div>";
mysql_query("SET CHARSET utf8");
    mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
$zapytanie2=mysql_query("select * from ksiazki where rodzic='$id'");



while($wynik=mysql_fetch_array($zapytanie2))
{
echo "<li>".$wynik['tresc']."<br><i>".$wynik['autor']." - ".$wynik['data']."</i><hr>";
}
echo "<br>";


}


echo "</ul>";



}

?>