<?php
    // Header (banière / logo) :
    include "header.php";

    include "DAO.php";
    $details = details_plats();
    $plat_info2 = $details[0];
    $plat_info = $details[1];
?>

<body class="bg1">

    <div class="container col-xs-7 col-12 div_cat mt-5 py-5">
        <form action ="script_plat_ajout.php" method="post">

            <div class="col-xs-5 col-12 d-flex justify-content-center m-auto my-5 cat_count rounded p-3"> 
                <?php foreach($plat_info as $cat) : ?>
                    <h1>Nos plats "<?= $cat->libelle?>"</h1>
                <?php endforeach; ?>
            </div>
            
            <div class="d-flex flex-wrap liste_cat">
                <?php foreach($plat_info2 as $plat) : ?>
                    
                    <div class="card liste-cat m-auto my-3" id="card" style="width: 18rem;">
                        <div class="card-body p-2">
                            
                            <!-- affichage des noms du plat -->
                            <div CLASS="d-flex justify-content-center my-2"> 
                                <h5 class="card-title" style="text-align:center"><h5><?= $plat->libelle?></h5>
                            </div>
                            <!-- partie inférieure avec l'image -->
                            <img src="/assets/images_the_district/food/<?= $plat->image?>" class="img-fluid card-img-top img_plat"  alt="" height="300px" width="300px">
                            <!-- affichage des noms du prix -->
                            <p style="text-align:center" class="mt-4"><strong><?= $plat->prix .' €'?></strong></p>
                            <!-- affichage de la description -->
                            <div class="row descr">
                                <p style="text-align:center"><?= $plat->description?></p>
                            </div>
                            <!-- Bouton "commander": -->
                            <div class="d-flex justify-content-center my-3">
                                <a class="btn btn-primary btn_com2 p-auto" style="width:130px" href ="commande.php?id=<?=$plat->id?>">Commander</a>
                            </div>

                        </div>
                    </div> 
                <?php endforeach ; ?> 
            </div>
        </form>     
    </div>
</body>   


<?php

include("footer.php");

?>