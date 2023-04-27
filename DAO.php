<?php

// on importe le contenu du fichier "db.php"
include "db.php";

/************************  Page d'accueil  ***********************/

function accueil(){  

    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();

    // on lance une requête pour chercher toutes les fiches des catégories et on récupère tous les résultats trouvés dans une variable :

    // foreach spécialités
    $requete = $db->query("SELECT * FROM categorie WHERE active = 'Yes' LIMIT 6");
    $resultat = $requete->fetchAll(PDO::FETCH_OBJ);
    $requete->closeCursor();

     // foreach plats populaires
    $requete2 = $db->query("SELECT plat.* FROM plat 
    JOIN commande ON commande.id_plat = plat.id 
    ORDER BY quantite DESC LIMIT 3");

    $resultat2 = $requete2->fetchAll(PDO::FETCH_OBJ);
    $requete2->closeCursor();

    $res_final = [$resultat, $resultat2];

    return $res_final;
}


/*************************  Page plats  **********************/

function plat(){ 

    $db = connexionBase();

    // foreach plats
    $requete = $db->query

    ("SELECT libelle, plat.image, id_categorie FROM plat WHERE active = 'Yes' limit 9");

    $plat = $requete->fetchAll(PDO::FETCH_OBJ);
    $requete->closeCursor();

    return $plat;
}

/************************ Détails plats ************************/

function details_plats(){ 
    
    // require "db.php";
    $db = connexionBase();
    // $id = $_GET["id"];

    // plats par catégories :
    $requete = $db->prepare("SELECT plat.* FROM plat
    JOIN categorie ON plat.id_categorie = categorie.id 
    WHERE plat.id_categorie = ?");  

    $requete->execute(array($_GET["id"]));
    $plat_info = $requete->fetchAll(PDO::FETCH_OBJ);
    $requete->closeCursor();

    // Titre page présentation plat :
    $requete2 = $db->prepare("SELECT * FROM categorie WHERE categorie.id = ?");
    $requete2->execute(array($_GET["id"]));
    $plat_info2 = $requete2->fetchAll(PDO::FETCH_OBJ);
    $requete2->closeCursor(); 

    $res_final = [$plat_info, $plat_info2];

    return $res_final;
}

/************************** Catégories *********************/

function get_categories(){ 
    $db = connexionBase();
    // foreach catégories
    $requete = $db->query("SELECT * FROM categorie");
    $resultat = $requete->fetchAll(PDO::FETCH_OBJ);
    $requete->closeCursor();

    return $resultat;
    }
?>
