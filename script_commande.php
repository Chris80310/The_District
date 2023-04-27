<?php

var_dump($_POST);


$quantite  = (isset($_REQUEST['qte']) && $_REQUEST['qte'] !== "") ? $_REQUEST['qte'] : Null;
$nom   = (isset($_REQUEST['nom']) && $_REQUEST['nom'] !== "") ? $_REQUEST['nom'] : Null;
$email   = (isset($_REQUEST['email']) && $_REQUEST['email'] != "") ? $_REQUEST['email'] : Null;
$tel   = (isset($_REQUEST['tel']) && $_REQUEST['tel'] != "") ? $_REQUEST['tel'] : Null;
$adresse   = (isset($_REQUEST['adr']) && $_REQUEST['adr'] != "") ? $_REQUEST['adr'] : Null;
$ville  = (isset($_REQUEST['ville']) && $_REQUEST['ville'] != "") ? $_REQUEST['ville'] : Null;
$cp   = (isset($_REQUEST['cp']) && $_REQUEST['cp'] != "") ? $_REQUEST['cp'] : Null;
$Confirmer = (isset($_REQUEST['Confirmer']));

require "db.php";
$db = connexionBase();

try {
    // Construction de la requête INSERT sans injection SQL :
    $requete = $db->prepare("INSERT INTO commande (quantite, nom_client, telephone_client, email_client, adresse_client) VALUES (:qte , :nom , :tel , :email , :adr );");
    
    // Association des valeurs aux paramètres via bindValue() :
    $requete->bindValue(":qte", $quantite,   PDO::PARAM_STR);
    $requete->bindValue(":nom", $nom,     PDO::PARAM_INT);
    $requete->bindValue(":tel", $tel,   PDO::PARAM_STR);
    $requete->bindValue(":email", $email,   PDO::PARAM_STR);
    $requete->bindValue(":adr", $adresse,   PDO::PARAM_STR);
    $requete->bindValue(":ville", $ville,   PDO::PARAM_STR);
    $requete->bindValue(":cp", $cp,   PDO::PARAM_STR);
    
    // Lancement de la requête :
    $requete->execute();
    // Libération de la requête (utile pour lancer d'autres requêtes par la suite) :
    $requete->closeCursor();

    // Gestion des erreurs
} catch (Exception $e) {
    var_dump($requete->queryString);
    var_dump($requete->errorInfo());
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (script_commande.php)");
}
// Si OK: redirection vers la page acceuil.php
header("Location: accueil.php");
echo "Commande effectuée !";
// Fermeture du script
exit;

?>