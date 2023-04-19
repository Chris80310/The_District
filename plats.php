<?php
include "db.php";
$db = connexionBase();

include "header.php";

 // foreach plats
 $requete = $db->query

 ("SELECT libelle, plat.image FROM plat WHERE active = 'Yes' limit 9");

 $resultat = $requete->fetchAll(PDO::FETCH_OBJ);
 $requete->closeCursor(); 

?>

<body class="bg1">

    <div class="container col-7 div_cat mt-5 py-5">
        
        <div class="col-4 d-flex justify-content-around mx-auto my-5 cat_count rounded p-3">  
            <h1>Nos plats (<?=count($resultat)?>)</h1>
        </div>

        <div class="d-flex flex-wrap liste_cat">
                <?php foreach ($resultat as $infos): ?>

                    <div class="card liste-cat m-auto my-3" id="card" style="width: 18rem;">
                        <div class="card-body p-2">
                            <a href="#" class="card_title">
                            <!-- affichage des noms de catégories -->
                            <h5 class="card-title" style="text-align:center"><strong>"<?= $infos->libelle?>"</strong></h5>
                            <!-- partie inférieure avec l'image -->
                            <img src="assets/images_the_district/food/<?= $infos->image?>" class="card-img-top img-responsive" alt="image"></a>
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