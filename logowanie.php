<?php
baza();

if (@$_POST['email']<>''&& @$_POST['haslo']<>'')
{

$email=$_POST['email']; $haslo=$_POST['haslo'];
$zapytanie=mysql_query("select * from user where email='$email' and haslo='$haslo'");
if(mysql_num_rows($zapytanie)==0)
{

komunikat ('blad', 'nie ma takiego uzytkownika');
header("Refresh: 2 index.php");
}

else
{
$_SESSION['email']=$email;
header("location: index.php");

}
}
else 
formlogin();


?>