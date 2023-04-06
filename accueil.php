<?php

    // on importe le contenu du fichier "db.php"
    include "db.php";

    // Header (banière / logo) :
    // include("header.php");  

    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();

    // on lance une requête pour chercher toutes les fiches des catégories
    $requete = $db->query("SELECT * FROM categorie");
    
    // on récupère tous les résultats trouvés dans une variable
    $resultat = $requete->fetchAll(PDO::FETCH_OBJ);
    // on clôt la requête en BDD
    $requete->closeCursor();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>PDO - Liste</title>
</head>

<body class="bg1">

    <div class="container div_cat mt-5 py-5">
        
        <div class="col-3 d-flex justify-content-around mx-auto mb-5 cat_count rounded p-3">  
            <h1>Catégories (<?=count($resultat)?>)</h1>
        </div>
        
        <div class="row liste_cat">
                <?php foreach ($resultat as $infos): ?>

                    <!-- $infos = les infos dont j'ai besoin -->

                    <!-- generation de la colone -->
                    <div class="col-6 my-3 zoom_cat">
                        <!--colone en deux parties -->
                        <div class="row">
                            
                            <div class="col-6 m-auto">
                                <!-- partie supérieure-->                      
                                <!-- affichage des noms de catégories  -->
                                <div class="row m-auto libelle pt-2 rounded-top" style="text-align:center">
                                    <h5><?= $infos->libelle?></h5>
                                </div>
                                <!-- partie inférieure avec l'image -->
                                <div>
                                    <img src="assets/images_the_district/category/<?= $infos->image?>" class="img-fluid rounded-bottom cat_img"  alt="image" height="300px" width="300px">
                                </div>
                            </div>
                                      
                        </div>
                    </div>
                <?php endforeach; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>