<?php

require "login.php";

var_dump($_REQUEST);

    $email   = (isset($_REQUEST['email']) && $_REQUEST['email'] != "") ? $_REQUEST['email'] : Null;
    $mdp   = (isset($_REQUEST['mdp']) && $_REQUEST['mdp'] !== "") ? $_REQUEST['mdp'] : Null;
    $Confirmer = (isset($_REQUEST['Confirmer']));

    // En cas d'erreur, on renvoie vers le formulaire
if ($mdp == Null || $email == Null) {
    header("Location: login.php");
    exit;
}

if(isset($Confirmer)){
    if($email == 'email' && $mdp == "123"){
        $_session["autoriser"]="oui";
        header("login.php");
    }
    else{
        echo"Mauvais identifiant ou mot de passe";
    }
}

session_start();

$_SESSION["login"] = "webmaster";

if ($_SESSION["login"]) 
{
   echo"Vous êtes autorisé à voir cette page.";  
} 
else 
{
   echo"Cette page nécessite une identification.";  
}

// S'il n'y a pas eu de redirection vers le formulaire (= si la vérification des données est ok) :
    
    require "db.php"; 
    $db = connexionBase();

?>