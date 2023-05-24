<?php
include "header.php";

include "DAO.php";

$cat=get_categories();

?>

<body class="bg1">
    <div class="container col-10 div_cat mt-5 py-5">
        
        <!-- catégories : -->

        <div class="col-md-5 col-12 d-flex justify-content-around mx-auto my-5 cat_count rounded p-3">  
            <h2>Toutes nos spécialités (<?=count($cat)?>)</h2>
        </div>
        
        <div class="m-auto d-flex flex-wrap liste_cat">
            <?php foreach ($cat as $infos): ?>

                <div class="card liste-cat m-auto my-3" id="card" style="width: 18rem;">
                    <div class="card-body p-2">
                        <a href="plat_list.php?id=<?= $infos->id?>" class="card_title">
                        <!-- affichage des noms de catégories -->
                        <h5 class="card-title text-center"><strong>Nos plats "<?= $infos->libelle?>"</strong></h5>
                        <!-- partie inférieure avec l'image -->
                        <img src="assets/images_the_district/category/<?= $infos->image?>" class="card-img-top img-fluid" alt="image"></a>
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