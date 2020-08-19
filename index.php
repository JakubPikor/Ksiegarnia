<?php
ob_start();
session_start();

include("funkcje.php");
include("naglowek.php");
?>
<div id="trescPojemnik">
   <div id="tresc">
      <div id="trescMenu">
         <?php 
//----------------------------------
	include("menu.php"); 
	
//--------------------------------
?>
      </div>
      <div id="trescGlowne">
         <?php
//-------------------
if (@$_SESSION['email']) echo "<h3>Zalogowany: ".$_SESSION['email']."</h3><hr>";


switch(@$_GET['wypozyczalnia'])
{
	case("drugi");
	include("drugi.php");
	break;
	
	case("wypozycz");
	include("wypozycz.php");
	break;

	case("forum");
	include("forum.php");
	break;
	
	case("log");
	include("logowanie.php");
	break;
	
	case("rej");
	include("rejestracja.php");
	break;

	case("wylog");
	session_destroy();
	header("location: index.php");
	break;
	
	case("profil");
	include("profil.php");
	break;
	case("potwierdzenie"):
include("Potwierdzenie.php");
break;
case("wypozyczenia"):
include("wypozyczenia.php");
break;
case("trzeci"):
include("trzeci.php");
break;
	default:
	include("drugi.php");
	
	
	
}

//-------------------
	?>
      </div>
	  
      <div class="uzupelnienie"></div>
   </div>
</div>

<?php
include("stopka.php");
ob_flush();

?>