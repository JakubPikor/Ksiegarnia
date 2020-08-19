<?php
baza();
autoryzacja();
$email=$_SESSION['email'];
$zapytanie= mysql_query("select * from user where email='$email'");
$wynik=mysql_fetch_array($zapytanie);

echo "<h2> Zmiana hasla dla: ".$wynik['imie']." ".$wynik['nazwisko']."</h2><p>";

?>
<form action="index.php?monika=profil" method="POST">
<fieldset><legend>Stare haslo</legend>
<input type="text" name="starehaslo" size="25">
</fieldset>

<fieldset><legend>Nowe haslo</legend>
<input type="text" name="haslo1" size="25"> Powtórz:
<input type="text" name="haslo2" size="25">
</fieldset>


</form>





<?php


echo "tu bedzie zmiana hasla";


?>