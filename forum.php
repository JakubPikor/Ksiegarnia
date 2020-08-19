<?php

echo "<h3>Forum uzytkowników serwisu</h3><hr>";
baza();

if (@$_SESSION['email'])
echo "<a href='index.php?wypozyczalnia=forum&forum=nowy_watek'> Dodaj nowy wątek do forum </a><p>";

switch(@$_GET['forum'])
{
case("rozwiniecie"):
$id=$_GET['rozwiniecie'];
$zapytanie=mysql_query("select * from forum where id='$id'");
$wynik=mysql_fetch_array($zapytanie);

echo "<h2>".$wynik['tytul']."</h2>";
echo $wynik ['tresc']."<p>".$wynik['autor']." - ".$wynik['data']."<hr>";

if (@$_SESSION['email'])
echo "<div style='text-align:right;'><a href='index.php?wypozyczalnia=forum&forum=komentarz&komentarz=".$id."'> Dodaj komentarz </a></div>";

$zapytanie=mysql_query("select * from forum where rodzic='$id'");
echo "<ul>";
while($wynik=mysql_fetch_array($zapytanie))
{
echo "<li>".$wynik['tresc']."<br><i>".$wynik['autor']." - ".$wynik['data']."</li><hr>";
}
echo "</ul>";


break;
case("komentarz");
ksiazki($_GET['komentarz']);
break;




case("zapisz");
if (!@$_SESSION['email']) break;
$rodzic=$_POST['rodzic'];

if ($rodzic=='0') $tytul=$_POST['tytul'];
else $tytul="komentarz";


$tresc=$_POST['tresc']; $autor=$_POST['autor']; $data=$_POST['data'];
mysql_query( " insert into forum values('','$rodzic','$tytul','$tresc','$autor','$data' )");
header("location: index.php?wypozyczalnia=forum");

break;

case("nowy_watek"):
ksiazki('0');
break;

default:
echo"<b> Lista wątków forum </b><hr>";




$zapytanie=mysql_query("select * from forum where rodzic='0' order by data asc");
echo"<ul>";
while ($wynik=mysql_fetch_array($zapytanie))
{
$rodzic=$wynik['id'];
$zapytanie_kom=mysql_query("select * from forum where rodzic='$rodzic' order by data desc");
$wynik_kom=mysql_fetch_array($zapytanie_kom);


echo "<li><a href ='index.php?wypozyczalnia=forum&forum=rozwiniecie&rozwiniecie=".$wynik['id']."'>".$wynik['tytul']."</a> (".mysql_num_rows($zapytanie_kom).")";
if (mysql_num_rows($zapytanie_kom)<>'0')
echo " - ostatni z dnia: ".$wynik_kom['data'];
}
echo"</ul>";
}
?>