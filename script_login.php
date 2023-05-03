<?php

session_start();

// var_dump($_POST);

$email   = (isset($_POST['email']) && $_POST['email'] != "") ? $_POST['email'] : Null;
$mdp   = (isset($_POST['mdp']) && $_POST['mdp'] !== "") ? $_POST['mdp'] : Null;
$confirmer = (isset($_POST['confirmer']));

// var_dump($confirmer);

if(isset($confirmer)){
    // En cas d'erreur, on renvoie vers le formulaire :

    if ($mdp == NULL || $email == NULL || $email != 'email' && $mdp != "123") {
        $_SESSION["log_err"]="Erreur identifiant ou mot de passe";
        // var_dump($_SESSION["log_err"]);
        header("Location:login.php");
        exit;
    }

    else{
        // Si tout est ok :

        $_SESSION["autoriser"]="oui";
        // var_dump($_SESSION["autoriser"]);
        $_SESSION["login"] = "webmaster";
        $_SESSION["role"] = "admin";

        header("Location:index.php");
        exit;
    }
}

?>