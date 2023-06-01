<?php

// Header (banière / logo) :
// include "header.php";

include "DAO.php";

$tab = accueil();
$res = $tab[0];
$res2 = $tab[1];

?>

<body class="bg1">

    <div class="container col-7 div_cat mt-5 py-5">
        
        <!-- catégories : -->

        <div class="col col-xs-12  m-auto mb-5 cat_count rounded p-3">  
            <h1>Nos spécialités (<?=count($res)?>)</h1>
        </div>
        
        <div class="d-flex flex-wrap liste_cat">
            <?php foreach ($res as $infos): ?>

                <div class="card liste-cat m-auto my-3" id="card" style="width: 18rem;">
                    <div class="card-body p-2">
                        <a href="plat_list.php?id=<?= $infos->id?>" class="card_title">
                        <!-- affichage des noms de catégories -->
                        <h5 class="card-title p-auto text-center"><strong>Nos plats "<?= $infos->libelle?>"</strong></h5>
                        <!-- partie inférieure avec l'image -->
                        <img src="assets/images_the_district/category/<?= $infos->image?>"class="card-img-top img-fluid" alt="image"></a> 
                    </div>
                </div>  

            <?php endforeach; ?>
        </div>

        <!-- Plats sugérés par popularité : -->

        <div class="col-xs-5 col-5 d-flex justify-content-center mx-auto my-5 cat_count rounded p-3">  
            <h1>Plats populaires</h1>
        </div>

        <div class="d-flex flex-wrap liste_cat">
            <?php foreach ($res2 as $infos2): ?>

                <div class="card liste-cat m-auto my-3" id="card" style="width: 18rem;">
                    <div class="card-body p-2">
                        <a href="commande.php?id=<?=$infos2->id?>" class="card_title">
                        <!-- affichage des noms de catégories -->
                        <h5 class="card-title text-center"><strong>"<?= $infos2->libelle?>"</strong></h5>
                        <!-- partie inférieure avec l'image -->
                        <img src="assets/images_the_district/food/<?= $infos2->image?>" class="card-img-top img-fluid" alt="image"></a>
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->   
                    </div>
                </div>     
            <?php endforeach; ?>
        </div>

    </div>
</body>