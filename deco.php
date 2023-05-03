<?php
session_start();

// Reste du code (PHP/HTML)
echo"Bonjour ".$_SESSION["login"]."<br>"; 

// destruction des variables de session
unset($_SESSION["login"]);
unset($_SESSION["role"]);

// la fonction setcookie(), nous permets de forcer la date d'expiration 
if (ini_get("session.use_cookies")) 
{
    setcookie(session_name(), '', time()-42000);
}
// On détruit le reste de la session, via la fonction session_destroy()
session_destroy();

header("location:index.php");

?>