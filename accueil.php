<?php

    // on importe le contenu du fichier "db.php"
    include "db.php";

    // Header (banière / logo) :
    // include("header.php");  

    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();

    // on lance une requête pour chercher toutes les fiches des catégories et on récupère tous les résultats trouvés dans une variable :

    // foreach spécialités
    $requete = $db->query("SELECT * FROM categorie WHERE active = 'Yes' LIMIT 6");
    $resultat = $requete->fetchAll(PDO::FETCH_OBJ);
    $requete->closeCursor();

     // foreach plats populaires
    $requete2 = $db->query("SELECT plat.libelle, plat.image FROM plat 
    JOIN commande ON commande.id_plat = plat.id 
    ORDER BY quantite DESC LIMIT 3");

    $resultat2 = $requete2->fetchAll(PDO::FETCH_OBJ);
    $requete2->closeCursor();

?>

<body class="bg1">

    <div class="container col-7 div_cat mt-5 py-5">
        
        <!-- catégories : -->

        <div class="col-5 d-flex justify-content-center m-auto my-5 cat_count rounded p-3">  
            <h1>Nos spécialités (<?=count($resultat)?>)</h1>
        </div>
        
        <div class="d-flex flex-wrap liste_cat">
                <?php foreach ($resultat as $infos): ?>

                    <div class="card liste-cat m-auto my-3" id="card" style="width: 18rem;">
                        <div class="card-body p-2">
                            <a href="plat_list.php?id=<?= $infos->id?>" class="card_title">
                            <!-- affichage des noms de catégories -->
                            <h5 class="card-title" style="text-align:center"><strong>Nos plats "<?= $infos->libelle?>"</strong></h5>
                            <!-- partie inférieure avec l'image -->
                            <img src="assets/images_the_district/category/<?= $infos->image?>" class="card-img-top img-responsive" alt="image"></a>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->   
                        </div>
                    </div>  

                <?php endforeach; ?>
        </div>

        <!-- Plats sugérés par popularité : -->

        <div class="col-4 d-flex justify-content-center mx-auto my-5 cat_count rounded p-3">  
            <h1>Plats populaires</h1>
        </div>

        <div class="d-flex flex-wrap liste_cat">
                <?php foreach ($resultat2 as $infos2): ?>

                    <div class="card liste-cat m-auto my-3" id="card" style="width: 18rem;">
                        <div class="card-body p-2">
                            <a href="#" class="card_title">
                            <!-- affichage des noms de catégories -->
                            <h5 class="card-title" style="text-align:center"><strong>"<?= $infos2->libelle?>"</strong></h5>
                            <!-- partie inférieure avec l'image -->
                            <img src="assets/images_the_district/food/<?= $infos2->image?>" class="card-img-top img-responsive" alt="image"></a>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->   
                        </div>
                    </div>
                    
                <?php endforeach; ?>
        </div>

    </div>
</body>