<?php
    
    require "db.php";
    $db = connexionBase();
    // $id = $_GET["id"];

    // plats par catégories :
    $requete = $db->prepare("SELECT plat.* FROM plat
    JOIN categorie ON plat.id_categorie = categorie.id 
    WHERE plat.id_categorie = ?");  

    $requete->execute(array($_GET["id"]));
    $plat_info = $requete->fetchAll(PDO::FETCH_OBJ);
    $requete->closeCursor();

    // Header (banière / logo) :
    include("header.php");

    // var_dump($plat_info);

     
?>

<body class="bg1">

    <div class="container col-7 div_cat mt-5 py-5">
        <form action ="script_plat_ajout.php" method="post">

            <div class="col-5 d-flex justify-content-center m-auto my-5 cat_count rounded p-3">  
            <h1>Nos xxxxx</h1>
            </div>

            <div class="d-flex flex-wrap liste_cat">
                <?php foreach($plat_info as $plat) : ?>
                    
                    <div class="card liste-cat m-auto my-3" id="card" style="width: 18rem;">
                        <div class="card-body p-2">
                    
                            <!-- affichage des noms du plat -->
                            <h5 class="card-title" style="text-align:center"><h5><?= $plat->libelle?></h5>
                            <!-- partie inférieure avec l'image -->
                            <img src="/assets/images_the_district/food/<?= $plat->image?>" class="img-fluid img_plat"  alt="jaquettes" height="300px" width="300px">
                            <!-- affichage des noms du prix -->
                            <p><strong><?= $plat->prix .' €'?></strong></p>
                            <!-- affichage de la description -->
                            <p><?= $plat->description?></p>
                            <!-- Bouton "commander": -->
                            <!-- <a class="btn btn-primary row my-3" style="width:130px" href ="script_commande.php?id=<?= $plat_info->id?>">Commander</a> -->

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