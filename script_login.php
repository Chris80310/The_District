<?php

session_start();

// var_dump($_POST);

$email   = (isset($_POST['email']) && $_POST['email'] != "") ? filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) : null;
$mdp   = (isset($_POST['mdp']) && $_POST['mdp'] !== "") ? filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING) : null;
$confirmer = (isset($_POST['confirmer']));

// var_dump($confirmer);

if(isset($confirmer)){
    // En cas d'erreur, on renvoie vers le formulaire :

    if ($mdp == NULL || $email == NULL || $email != 'email' && $mdp != "123") {
        $_SESSION["log_err"]="Erreur identifiant ou mot de passe";
        header("Location:login.php");
        exit;
    }

    else{
        // Si tout est ok :

        $_SESSION["autoriser"]="oui";
        $_SESSION["login"] = "webmaster";
        $_SESSION["role"] = "admin";

        header("Location:index.php");
        exit;
    }
}

?>


<!-- // Protection contre les attaques CSRF
if(isset($confirmer) && hash_equals($_SESSION['token'], $_POST['token'])) {

    // Vérification du mot de passe sécurisé
    $hash_mdp = password_hash("123", PASSWORD_DEFAULT);
    if ($mdp == null || $email == null || $email != 'email' || !password_verify($mdp, $hash_mdp)) {
        $_SESSION["log_err"]="Erreur identifiant ou mot de passe";
        header("Location:login.php");
        exit;
    } else {
        // Si tout est ok :
        $_SESSION["autoriser"]="oui";
        $_SESSION["login"] = "webmaster";
        $_SESSION["role"] = "admin";
        header("Location:index.php");
        exit;
    }
} else {
    // Protection contre les attaques CSRF
    $token = bin2hex(random_bytes(32));
    $_SESSION['token'] = $token;
} -->

