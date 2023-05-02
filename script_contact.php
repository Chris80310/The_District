<?php

var_dump($_REQUEST);

    $nom   = (isset($_REQUEST['nom']) && $_REQUEST['nom'] !== "") ? $_REQUEST['nom'] : Null;
    $prenom    = (isset($_REQUEST['prenom']) && $_REQUEST['prenom'] !== "") ? $_REQUEST['prenom']  : Null;
    $email   = (isset($_REQUEST['email']) && $_REQUEST['email'] != "") ? $_REQUEST['email'] : Null;
    $tel   = (isset($_REQUEST['tel']) && $_REQUEST['tel'] != "") ? $_REQUEST['tel'] : Null;
    $message   = (isset($_REQUEST['mess']) && $_REQUEST['mess'] != "") ? $_REQUEST['mess'] : Null;
    $Confirmer = (isset($_REQUEST['Confirmer']));

    // En cas d'erreur, on renvoie vers le formulaire
if ($nom == Null || $prenom == Null || $email == Null || $tel == Null) {
    header("Location: contact_form.php");
    exit;
}

// if(isset($Confirmer)){
//     if($email == 'email' && $mdp == "123"){
//         $_session["autoriser"]="oui";
//         header("login_form.php");
//     }
//     else{
//         echo"Mauvais identifiant ou mot de passe";
//     }
// }

// session_start();

// $_SESSION["login"] = "webmaster";

// if ($_SESSION["login"]) 
// {
//    echo"Vous êtes autorisé à voir cette page.";  
// } 
// else 
// {
//    echo"Cette page nécessite une identification.";  
// }

// S'il n'y a pas eu de redirection vers le formulaire (= si la vérification des données est ok) :
    
    require "db.php"; 
    $db = connexionBase();

?>