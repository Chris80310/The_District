<?php



date_default_timezone_set('Europe/Paris');
$date = date("Y-m-d H-i-s");
$etat = "En préparation";

$quantite  = (isset($_REQUEST['qte']) && $_REQUEST['qte'] !== "") ? $_REQUEST['qte'] : Null;
$nom   = (isset($_REQUEST['nom']) && $_REQUEST['nom'] !== "") ? $_REQUEST['nom'] : Null;
$email   = (isset($_REQUEST['email']) && $_REQUEST['email'] != "") ? $_REQUEST['email'] : Null;
$tel   = (isset($_REQUEST['tel']) && $_REQUEST['tel'] != "") ? $_REQUEST['tel'] : Null;
$adresse   = (isset($_REQUEST['adr']) && $_REQUEST['adr'] != "") ? $_REQUEST['adr'] : Null;
$total  = (isset($_REQUEST['total']) && $_REQUEST['total'] != "") ? $_REQUEST['total'] : Null;
// $cp   = (isset($_REQUEST['cp']) && $_REQUEST['cp'] != "") ? $_REQUEST['cp'] : Null;
// $ville   = (isset($_REQUEST['ville']) && $_REQUEST['ville'] != "") ? $_REQUEST['ville'] : Null;

$confirmer  = (isset($_REQUEST['id']) && $_REQUEST['id'] != "") ? $_REQUEST['id'] : Null;
$to = 'info@the_district.com';
$from = 'email' .$email;

// Explications : 

// $confirmer  = Ma variable
// (isset($_REQUEST['id']) = Si elle existe
// && = et
// $_REQUEST['id'] != "") = et qu'elle n'est pas vide
// ? = alors elle prends la valeur $_REQUEST['id'] 
// : NULL = sinon elle prends la valeur Null

// Autre méthode, le ternaire :

// if(isset($_REQUEST['id'])){
// $confirmer = $_REQUEST['id'];
// }

require "db.php";
$db = connexionBase();

var_dump($confirmer);
var_dump($_POST);

try {
    // Construction de la requête INSERT sans injection SQL :
    $requete = $db->prepare("INSERT INTO commande (quantite, nom_client, telephone_client, email_client, adresse_client, id_plat, total, date_commande, etat)
     VALUES (:qte, :nom, :tel, :email, :adr, :id_plat, :total, :date_commande, :etat );");
    
    // Association des valeurs aux paramètres via bindValue() :
    $requete->bindValue(":qte", $quantite, PDO::PARAM_INT);
    $requete->bindValue(":nom", $nom, PDO::PARAM_STR);
    $requete->bindValue(":tel", $tel, PDO::PARAM_STR);
    $requete->bindValue(":email", $email, PDO::PARAM_STR);
    $requete->bindValue(":adr", $adresse, PDO::PARAM_STR);
    $requete->bindValue(":id_plat", $confirmer, PDO::PARAM_INT);
    $requete->bindValue(":total", $total, PDO::PARAM_STR);
    $requete->bindValue(":date_commande", $date, PDO::PARAM_STR);
    $requete->bindValue(":etat", $etat, PDO::PARAM_STR);
    
    // Lancement de la requête :
    $requete->execute();
    // Libération de la requête (utile pour lancer d'autres requêtes par la suite) :
    $requete->closeCursor();    
} 
// Gestion des erreurs
catch (Exception $e) {
    var_dump($requete->queryString);
    var_dump($requete->errorInfo());
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (script_commande.php)");
}
// Si OK: redirection vers la page d'acceuil
header("Location: index.php");

echo "Commande effectuée !";
// Fermeture du script
exit;

?>