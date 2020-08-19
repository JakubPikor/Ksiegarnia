
<?php
if (@$_SESSION['email'] == "admin@wk.com")

echo "<br>";

baza();

switch(@$_GET['trzeci'])
{


case("dezaktywacja");


$id = $_GET['dezaktywacja'];

mysql_query("SET CHARSET utf8");
mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
$zapytanie=mysql_query("UPDATE lista SET aktywna = '0' WHERE id = '$id'");

echo "Nie kontynuujesz wypożyczenia";
echo"<br><a href='index.php?wypozyczalnia=trzeci'>Powróć</a> ";
break;

case("aktywacja");


$id = $_GET['aktywacja'];

mysql_query("SET CHARSET utf8");
mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
$zapytanie=mysql_query("UPDATE lista SET aktywna = '1' WHERE id = '$id'");

echo "Wypożyczono ponownie na taki sam okres";
echo"<br><a href='index.php?wypozyczalnia=trzeci'>Powróć</a> ";
break;


default:
if (@$_SESSION['email'] == null ){echo "Zaloguj się";  break;}
$nick = $_SESSION['email'];
echo "<ul>";

mysql_query("SET CHARSET utf8");
    mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
	
$zapytanie=mysql_query("select * from lista where nick ='$nick'");

while ($wynik=mysql_fetch_array($zapytanie))	
{
echo "<h2>".$wynik['nazwa']."</h2>";
echo "<li>";


echo $wynik['okres'];	

if($wynik['aktywna'] == 1) echo "<li><a href='index.php?wypozyczalnia=trzeci&trzeci=dezaktywacja&dezaktywacja=".$wynik['Id']."'>Zrezygnuj z wypożyczenia</a><br><li><a href=''>Czytaj ebook</a>  ";
else
	 echo "<li><a href='index.php?wypozyczalnia=trzeci&trzeci=aktywacja&aktywacja=".$wynik['Id']."'>Wypożycz ponownie</a> ";
}


echo "</ul>";



}

if(@$_SESSION['email']) 



?>
