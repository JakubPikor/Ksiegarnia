<ul>
<li> <a href="index.php?wypozyczalnia=drugi">Nowości w serwisie</a>
<li> <a href="index.php?wypozyczalnia=wypozycz">Dostępne do wypożyczenia</a>
<li> <a href="index.php?wypozyczalnia=trzeci">Moje książki</a>
<li> <a href="index.php?wypozyczalnia=forum">Recenzje książek</a>



<?php if (@! $_SESSION['email']) { ?>

<li> <a href="index.php?wypozyczalnia=rej">Rejestracja</a>
</ul>
<?php formLogin(); ?><br>
<?php }
else
{
echo "<li><a href='index.php?wypozyczalnia=wylog'>Wyloguj</a>";
echo "<li><a href='index.php?wypozyczalnia=profil'>Zmiana hasła</a>";
}
?>

