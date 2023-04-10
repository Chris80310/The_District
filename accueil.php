<?php

    // on importe le contenu du fichier "db.php"
    include "db.php";

    // Header (banière / logo) :
    // include("header.php");  

    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();

    // on lance une requête pour chercher toutes les fiches des catégories
    $requete = $db->query("SELECT * FROM categorie LIMIT 6");
    $requete2 = $db->query("SELECT * FROM plat LIMIT 3");
    $requete3 = $db->query("SELECT * FROM plat LIMIT 3");
    
    // on récupère tous les résultats trouvés dans une variable
    $resultat = $requete->fetchAll(PDO::FETCH_OBJ);
    $resultat2 = $requete2->fetchAll(PDO::FETCH_OBJ);
    $resultat3 = $requete3->fetchAll(PDO::FETCH_OBJ);
    // on clôt la requête en BDD
    $requete->closeCursor();
    $requete2->closeCursor();
    $requete3->closeCursor();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>accueil</title>
</head>

<body class="bg1">

    <div class="container div_cat mt-5 py-5">
        
        <!-- catégories : -->

        <div class="col-4 d-flex justify-content-center m-auto my-5 cat_count rounded p-3">  
            <h1>Nos spécialités (<?=count($resultat)?>)</h1>
        </div>
        
        <div class="col-11 m-auto d-flex flex-wrap liste_cat">
                <?php foreach ($resultat as $infos): ?>

                    <div class="card liste-cat mx-5 my-3" id="card" style="width: 18rem;">
                        <div class="card-body p-1">
                            <a href="#" class="card_title">
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
            <h1>Nos plats populaires</h1>
        </div>

        <div class="d-flex flex-wrap liste_cat">
                <?php foreach ($resultat2 as $infos2): ?>

                    <div class="card liste-cat m-auto my-3" id="card" style="width: 18rem;">
                        <div class="card-body p-2">
                            <a href="#" class="card_title">
                            <!-- affichage des noms de catégories -->
                            <h5 class="card-title" style="text-align:center"><strong>Le "<?= $infos2->libelle?>"</strong></h5>
                            <!-- partie inférieure avec l'image -->
                            <img src="assets/images_the_district/food/<?= $infos2->image?>" class="card-img-top img-responsive" alt="image"></a>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->   
                        </div>
                    </div>
                    
                <?php endforeach; ?>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>