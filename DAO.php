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

//**********************/ BARRE DE RECHERCHE ********************//

function search_cat($search){
    $db = connexionBase();
    $query = $db->prepare('SELECT * FROM categorie WHERE libelle LIKE "%"?"%" AND LOWER(categorie.active) = "yes";');
    $query->execute(array($search));
    $tab = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;

}
function search_plat($search){
    $db = connexionBase();
    $query = $db->prepare('SELECT * FROM plat WHERE (libelle LIKE "%":search1"%" OR plat.description LIKE "%":search2"%") AND LOWER(plat.active) = "yes";');
    $query->bindValue(":search1", $search, PDO::PARAM_STR);
    $query->bindValue(":search2", $search, PDO::PARAM_STR);
    $query->execute();
    $tab = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}


/*************************  Plat  **********************/

function plat(){ 

    $db = connexionBase();

    // foreach plats
    $requete = $db->query
    ("SELECT libelle, plat.image, id_categorie FROM plat WHERE active = 'Yes' limit 9");
    $plat = $requete->fetchAll(PDO::FETCH_OBJ);
    $requete->closeCursor();
    return $plat;
    }

// CREATE
function create_plat($libelle,$description,$prix,$image,$id_categorie){
    $active = "Yes";
    $db = connexionBase();
    $query = $db->prepare('INSERT INTO plat (libelle,description,prix,image,id_categorie,active) VALUES (?,?,?,?,?,?);');
    $query->execute([$libelle,$description,$prix,$image,$id_categorie,$active]);
    $query->closeCursor();
    return true;  
}

// All from plat
function all_from_plat(){
    $db = connexionBase();
    $query = $db->query('SELECT * FROM plat');
    $query->execute();
    $tab = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

// Lire avec id
function id_plat($id){
    $db = connexionBase();
    $query = $db->prepare('SELECT * FROM plat WHERE id_plat = ?;');
    $query->execute(array($id));
    $tab = $query->fetch(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

// UPDATE
function update_plat($id_plat,$libelle, $description, $prix, $image,$id_categorie){
    $active = "Yes";
    $db = connexionBase();
    $query = $db->prepare("UPDATE plat SET 
                libelle=:libelle, 
                description=:description, 
                prix=:prix, 
                image=:image, 
                id_categorie=:id_categorie, 
                active=:active
            WHERE id_plat=:id_plat");
    $query->bindValue(":id_plat", $id_plat, PDO::PARAM_STR);
    $query->bindValue(":libelle", $libelle, PDO::PARAM_STR);
    $query->bindValue(":description", $description, PDO::PARAM_STR);
    $query->bindValue(":prix", $prix, PDO::PARAM_STR);
    $query->bindValue(":image", $image, PDO::PARAM_STR);
    $query->bindValue(":id_categorie", $id_categorie, PDO::PARAM_STR);
    $query->bindValue(":active", $active, PDO::PARAM_STR);
    
    $query->execute();
    $query->closeCursor();

}

// DELETE
function delete_plat($id){
    $db = connexionBase();
    $query = $db->prepare('DELETE FROM plat WHERE id_plat = ?');
    $query->execute(array($id));
    $query->closeCursor();
    return true;
}

/************************ Détails plats ************************/

function details_plats(){ 
    
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

// foreach catégories
function get_categories(){ 
    $db = connexionBase();
    $requete = $db->query("SELECT * FROM categorie");
    $resultat = $requete->fetchAll(PDO::FETCH_OBJ);
    $requete->closeCursor();
    return $resultat;
}

// CREATE
function create_cat($lib,$img){
    $active = "Yes";
    $db = connexionBase();
    $query = $db->prepare('INSERT INTO categorie (libelle,image,active) VALUES (?,?,?);');
    $query->execute([$lib,$img,$active]);
    $query->closeCursor();
    return true;  
}

// All from categorie
function all_from_cat(){
    $db = connexionBase();
    $query = $db->query('SELECT * FROM categorie');
    $query->execute();
    $tab = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

// Lire avec id
function id_cat($id){
    $db = connexionBase();
    $query = $db->prepare('SELECT * FROM categorie WHERE id_categorie = ?;');
    $query->execute(array($id));
    $tab = $query->fetch(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

// UPDATE
function update_cat($id_categorie,$libelle,$img){
    $active = "Yes";
    $db = connexionBase();
    $query = $db->prepare("UPDATE categorie SET 
                libelle=:libelle, 
                image=:image, 
                active=:active
            WHERE id_categorie=:id_categorie");
    $query->bindValue(":libelle", $libelle, PDO::PARAM_STR);
    $query->bindValue(":image", $img, PDO::PARAM_STR);
    $query->bindValue(":active", $active, PDO::PARAM_STR);
    $query->bindValue(":id_categorie", $id_categorie, PDO::PARAM_STR); 
    $query->execute();
    $query->closeCursor();
}

// DELETE
function delete_cat($id){
    $db = connexionBase();
    $query = $db->prepare('DELETE FROM categorie WHERE id_categorie = ?');
    $query->execute(array($id));
    $query->closeCursor();
    return true;
}

//------------------------------ COMMANDE ------------------------------//

// CREATE
function create_command($id_plat, $quantite, $date_commande, $total,$nom_client, $telephone_client, $email_client, $adresse_client){
    $etat="En préparation";
    $db = connexionBase();
    $query = $db->prepare('INSERT INTO commande (id_plat, quantite, date_commande, total, nom_client, telephone_client, email_client, adresse_client, etat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);');
    $query->execute([$id_plat, $quantite, $date_commande, $total, $nom_client, $telephone_client, $email_client, $adresse_client, $etat]);
    $query->closeCursor();
    return true;  
}

// All from commande
function all_from_com(){
    $db = connexionBase();
    $query = $db->query('SELECT * FROM commande');
    $query->execute();
    $tab = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

// All from commande by id
function id_com($id){
    $db = connexionBase();
    $query = $db->prepare('SELECT * FROM commande WHERE id_commande = ?;');
    $query->execute(array($id));
    $tab = $query->fetch(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

// UPDATE
function update_command($id_commande,$id_plat, $quantite, $total, $date_commande, $etat, $nom_client, $telephone_client,$email_client,$adresse_client){
    $db = connexionBase();
    $query = $db->prepare("UPDATE commande SET 
                id_plat=:id_plat, 
                quantite=:quantite, 
                total=:total, 
                date_commande=:date_commande, 
                etat=:etat, 
                nom_client=:nom_client, 
                telephone_client=:telephone_client, 
                email_client=:email_client,
                adresse_client=:adresse_client
            WHERE id_commande=:id_commande");
    $query->bindValue(":id_plat", $id_plat, PDO::PARAM_STR);
    $query->bindValue(":quantite", $quantite, PDO::PARAM_STR);
    $query->bindValue(":total", $total, PDO::PARAM_STR);
    $query->bindValue(":date_commande", $date_commande, PDO::PARAM_STR);
    $query->bindValue(":etat", $etat, PDO::PARAM_STR);
    $query->bindValue(":nom_client", $nom_client, PDO::PARAM_STR);
    $query->bindValue(":telephone_client", $telephone_client, PDO::PARAM_STR);
    $query->bindValue(":email_client", $email_client, PDO::PARAM_STR);
    $query->bindValue(":adresse_client", $adresse_client, PDO::PARAM_STR);
    $query->bindValue(":id_commande", $id_commande, PDO::PARAM_STR);
    
    $query->execute();
    $query->closeCursor();

}

function delete_command($id){
    $db = connexionBase();
    $query = $db->prepare('DELETE FROM commande WHERE id_commande = ?');
    $query->execute(array($id));
    $query->closeCursor();
    return true;
}

//*************************** Utilisateur ***************************//

// CREATE
function create_user($nom, $prenom, $email, $hashed_password){
    $db = connexionBase();
    $query = $db->prepare(' INSERT INTO utilisateur (nom, prenom, email, password) VALUES (:nom, :prenom, :email, :hashed_password);');
    $query->bindValue(":nom", $nom, PDO::PARAM_STR);
    $query->bindValue(":prenom", $prenom, PDO::PARAM_STR);
    $query->bindValue(":email", $email, PDO::PARAM_STR);
    $query->bindValue(":hashed_password", $hashed_password, PDO::PARAM_STR);
    $query->execute();
    $query->closeCursor();
    return true;
}
// READ ALL
function all_from_usr(){
    $db = connexionBase();
    $query = $db->query('SELECT * FROM utilisateur');
    $query->execute();
    $tab = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}
// READ WITH ID
function id_usr($id){
    $db = connexionBase();
    $query = $db->prepare('SELECT * FROM utilisateur WHERE id_utilisateur = ?;');
    $query->execute(array($id));
    $tab = $query->fetch(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}
// UPDATE
function update_user($id, $nom, $prenom, $email){
    $db = connexionBase();
    $query = $db->prepare('UPDATE utilisateur SET nom = :nom, prenom = :prenom, email = :email WHERE id_utilisateur = :id;');
    $query->bindValue(":nom", $nom, PDO::PARAM_STR);
    $query->bindValue(":prenom", $prenom, PDO::PARAM_STR);
    $query->bindValue(":email", $email, PDO::PARAM_STR);
    $query->bindValue(":id", $id, PDO::PARAM_STR);
    $query->execute();
    $query->closeCursor();
}
// DELETE
function delete_user($id){
    $db = connexionBase();
    $query = $db->prepare('DELETE FROM utilisateur WHERE id_utilisateur = ?');
    $query->execute(array($id));
    $query->closeCursor();
    return true;
}

//*********************** Commande utilisateur ***************************//

function new_order($plat,$qte,$tot,$nom,$tel,$email,$adr){
    $db = connexionBase();
    $etat = "En préparation";
    $date = date('Y-m-d H:i:s');
    $query = $db->prepare('INSERT INTO commande (id_plat,quantite,total,date_commande,etat,nom_client,telephone_client,email_client,adresse_client)
    VALUES (:plat,:qte,:tot,:date,:etat,:nom,:tel,:email,:adr);');
    $query->bindValue(":plat", $plat, PDO::PARAM_STR);
    $query->bindValue(":qte", $qte, PDO::PARAM_STR);
    $query->bindValue(":tot", $tot, PDO::PARAM_STR);
    $query->bindValue(":date", $date, PDO::PARAM_STR);
    $query->bindValue(":etat", $etat, PDO::PARAM_STR);
    $query->bindValue(":nom", $nom, PDO::PARAM_STR);
    $query->bindValue(":tel", $tel, PDO::PARAM_STR);
    $query->bindValue(":email", $email, PDO::PARAM_STR);
    $query->bindValue(":adr", $adr, PDO::PARAM_STR);
    $query->execute();
    $query->closeCursor();
    return true;
}

?>
