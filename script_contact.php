<?php

// var_dump($_REQUEST);

$nom   = (isset($_REQUEST['nom']) && $_REQUEST['nom'] !== "") ? $_REQUEST['nom'] : Null;
$prenom    = (isset($_REQUEST['prenom']) && $_REQUEST['prenom'] !== "") ? $_REQUEST['prenom']  : Null;
$email   = (isset($_REQUEST['email']) && $_REQUEST['email'] != "") ? $_REQUEST['email'] : Null;
$tel   = (isset($_REQUEST['tel']) && $_REQUEST['tel'] != "") ? $_REQUEST['tel'] : Null;
$sujet  = (isset($_REQUEST['sujet']) && $_REQUEST['sujet'] != "") ? $_REQUEST['sujet'] : Null;
$message   = (isset($_REQUEST['mess']) && $_REQUEST['mess'] != "") ? $_REQUEST['mess'] : Null;
$Confirmer = (isset($_REQUEST['Confirmer']));
$to = 'info@the_district.com';
$from = 'email' .$email;

// En cas d'erreur, on renvoie vers le formulaire :
if ($nom == Null|| $email == Null || $tel == Null || $message == Null){
    header("Location: contact_form.php");
    exit;
}
var_dump($to);

mail($to, $sujet, $message);

exit;

?>