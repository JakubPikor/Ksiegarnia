<?php
function formlogin()
{
 echo '
 <form action="index.php?wypozyczalnia=log" method="post"><br><br>
 <h4><div align="center">
 Użytkownik: <input type="text" name="email" /><br><br>
 Hasło: <input type="password" name="haslo"
/><br><br>
 <input type="submit"  value="zaloguj" />
 </div>
 </form>
 '; 
}


function formrej()
{
?>


<form action="index.php?wypozyczalnia=rej" method="post"  >



<h2> Przykładowy formularz rejestracyjny</h2>

Imię:<br>
<input type="text" name="imie" size="50"><p>

Nazwisko:<br>
<input type="text" name="nazwisko" size="50"><p>
e-mail:<br>
<input type="text" name="email" size="50"><p>
Hasło:
<fieldset><legend align="center">podaj frazę hasła</legend>
<input type="password" name="haslo1" size="20"> Powtórz: <input type="password" name="haslo2" size="20">
</fieldset><br>
Czy chcesz otrzymywać powiadomienia:
<input type="checkbox" name="powiadomienia" checked="checked"><br>
Płeć:<br>
Kobieta: <input type="radio" name="plec" value="K" > Mężczyzna: <input type="radio" name="plec" value="M" ><p>


Wykształcenie:
<select name=wyksztalcenie>
<option> ... wybierz </option>
<option>Podstawowe</option>
<option>Średnie</option>
<optgroup label="Wyższe">
<option>Wyższe I stopień</option>
<option>Wyższe II stopień</option>
</optgroup>
</select><br>
Coś o sobie:
<textarea name="osobie" rows="3" cols="40"> ... </textarea><br>

Po wypełnieniu formularza nacisnij przycisk:<input type="submit" value="Wyslij dane">
</form>




<?php
}



function komunikat($typ,$tresc)
{
if ($typ=='blad')
{
echo"<fieldset><legend><h3 style= 'color: red'> Problem </h3></legend>";
echo"<font style='color: red'>" .$tresc. "</font></fieldset><br>";
}
else
{
echo"<fieldset><legend><h3 style= 'color: green'> Wszystko ok
</h3></legend>";
echo"<font style='color: green'>".$tresc."</font></fieldset><br>";
}
}

function baza()
{
if (!mysql_connect('localhost','root','')) komunikat ('Blad','Problem z polaczeniem z silnikiem bazy danych');
if (!mysql_select_db('database')) komunikat ('blad','Problem z polaczeniem z baza database');
}


function autoryzacja()
{
if(@! $_SESSION['email'])
{
komunikat("blad","to jest strefa tylko dla zalogowanych!!!");
header("Refresh: 3, index.php");
exit;

}
}

function ksiazki($watek)
{
?>
<form action="index.php?wypozyczalnia=forum&forum=zapisz" method="POST">

<input type="hidden" name="rodzic" value="<?php echo $watek; ?>">

<?php if($watek=='0') { ?>
Tytul:<br>
<input type="text" name="tytul" size="50"><p>
<?php } ?>

Tresc:<br>
<textarea name="tresc" rows="5" cols="50"> ... </textarea><p>

Autor:<br>
<input type="text" name="autor" size="50" readonly="readonly" value="<?php
echo $_SESSION['email'];?>"<p>

Data:<br>
<input type="text" name="data" size="12" readonly="readonly" value="<?php
echo Date('y-m-d');?>"><p>

<input type="submit" value=" ZAPISZ">
</form>
<?php
}
function forum2($watek)
{
?>
<form action="index.php?wypozyczalnia=drugi&drugi=zapisz" method="POST">

<input type="hidden" name="rodzic" value="<?php echo $watek; ?>">

<?php if($watek=='0') { ?>
Tytul:<br>
<input type="text" name="tytul" size="50"><p>
<?php } ?>

Tresc:<br>
<textarea name="tresc" rows="5" cols="50"> ... </textarea><p>

Autor:<br>
<input type="text" name="autor" size="50" readonly="readonly" value="<?php
echo $_SESSION['email'];?>"<p>

Data:<br>
<input type="text" name="data" size="12" readonly="readonly" value="<?php
echo Date('y-m-d');?>"><p>

<input type="submit" value="ZAPISZ">
</form>
<?php
}



function zapisane($nazwa){
	
	?>
<form action="index.php?wypozyczalnia=potwierdzenie" method="POST">
<input type="hidden" name="nazwa" value="<?php echo $nazwa; ?>" />
Wpożyczasz książkę:
<?php echo $nazwa; ?><p>
	Podaj na jaki okres wypożyczasz książkę:
<select name=okres>
<option>tydzień </option>
<option>dwa tygodnie</option>
<option>miesiąc</option>
<option>do odwołania</option>

</optgroup>
</select><br>

<input type="submit" value="Wypożycz">
	</form>
<?php
}
