
<!-- saved from url=(0098)http://arzucidlo.prz.edu.pl/materialy/Technologie%20Internetowe/przyklady/formularze/formularz.php -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-2"></head><body><form action="index.php?monika=rej" method="post">



<h2> Przykładowy formularz rejestracyjny</h2>

Imię:<br>
<input type="text" name="imie" size="50"><br><p>

Nazwisko:<br>
<input type="text" name="nazwisko" size="50"><p>
<br>
e-mail:<br>
<input type="text" name="email" size="50"><br><p>
Hasło:
<fieldset><legend align="center">podaj frazę hasła</legend>
<input type="password" name="haslo1" size="30"> Powtórz: <input type="password" name="haslo2" size="30">
</fieldset><br><p>
Czy chcesz otrzymywać powiadomienia:
<input type="checkbox" name="powiadomienia" checked="checked"><br>
Płeć:
Kobieta: <input type="radio" name="plec"> Mężczyzna: <input type="radio" name="plec"><br>


Wykształcenie:<br>
<select name="wyksztalcenie">
<option> ... wybierz </option>
<option>Podstawowe</option>
<option>Średnie</option>
<optgroup label="Wyższe">
<option>Wyższe I stopień</option>
<option>Wyższe II stopień</option>
</optgroup>
</select><br><p>
Coś o sobie:<br>
<textarea name="osobie" rows="3" cols="40"> ... </textarea><br>

Po wypełnieniu formularza nacisnij przycisk:<input type="submit" value="Wyślij dane">
</form>


</html>