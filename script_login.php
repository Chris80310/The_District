<?php

session_start();

var_dump($_REQUEST);

    $email   = (isset($_REQUEST['email']) && $_REQUEST['email'] != "") ? $_REQUEST['email'] : Null;
    $mdp   = (isset($_REQUEST['mdp']) && $_REQUEST['mdp'] !== "") ? $_REQUEST['mdp'] : Null;
    $confirmer = (isset($_REQUEST['confirmer']));

    var_dump($confirmer);

    // En cas d'erreur, on renvoie vers le formulaire
if ($mdp == Null || $email == Null) {
    header("login.php");
    exit;
}

if(isset($confirmer)){
    if($email == 'email' && $mdp == "123"){
        $_SESSION["autoriser"]="oui";
        header("index.php");
        exit;
    }
    else{
        $_SESSION["log_err"]="Mauvais identifiant ou mot de passe";
    }
}
$_SESSION["login"] = "webmaster";
$_SESSION["role"] = "admin";


if (isset($_SESSION["login"]) ) 
{
    header("Location:index.php");
    exit;
}

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

?>