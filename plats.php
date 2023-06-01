<?php
// Header (banière / logo) :
include("header.php"); 

include "DAO.php";

$plat = plat();

?>

<body class="bg1">

    <div class="container col-xs-7 col-12 div_cat mt-5 py-5">
        
        <div class="col-xs-4 col-4 text-center mx-auto my-5 cat_count rounded p-3">  
            <h1>Nos plats (<?=count($plat)?>)</h1>
        </div>

        <div class="d-flex flex-wrap liste_cat">
            <?php foreach ($plat as $infos): ?>

                <div class="card liste-cat m-auto my-3" id="card" style="width: 18rem;">
                    <div class="card-body p-2">
                        <a href="plat_list.php?id=<?=$infos->id_categorie?>" class="card_title">
                        <!-- affichage des noms de catégories -->
                        <h5 class="card-title text-center"><strong>"<?= $infos->libelle?>"</strong></h5>
                        <!-- partie inférieure avec l'image -->
                        <img src="assets/images_the_district/food/<?= $infos->image?>" class="card-img-top img-fluid" alt="image"></a>
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->   
                    </div>
                </div>
                
            <?php endforeach; ?>
        </div>
    </div>  
</body>

<?php

include "footer.php";

?>