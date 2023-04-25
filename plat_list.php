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


    // Titre page présentation plat :
    $requete2 = $db->prepare("SELECT * FROM categorie WHERE categorie.id = ?");
    $requete2->execute(array($_GET["id"]));
    $plat_info2 = $requete2->fetchAll(PDO::FETCH_OBJ);
    $requete2->closeCursor(); 

    // Header (banière / logo) :
    include("header.php");

    // var_dump($plat_info2);    
?>

<body class="bg1">

    <div class="container col-7 div_cat mt-5 py-5">
        <form action ="script_plat_ajout.php" method="post">

            <div class="col-5 d-flex justify-content-center m-auto my-5 cat_count rounded p-3"> 
                <?php foreach($plat_info2 as $cat) : ?>
                    <h1>Nos plats "<?= $cat->libelle?>"</h1>
                <?php endforeach; ?>
            </div>
            
            <div class="d-flex flex-wrap liste_cat">
                <?php foreach($plat_info as $plat) : ?>
                    
                    <div class="card liste-cat m-auto my-3" id="card" style="width: 18rem;">
                        <div class="card-body p-2">
                            
                            <!-- affichage des noms du plat -->
                            <div CLASS="d-flex justify-content-center my-2"> 
                                <h5 class="card-title" style="text-align:center"><h5><?= $plat->libelle?></h5>
                            </div>
                            <!-- partie inférieure avec l'image -->
                            <img src="/assets/images_the_district/food/<?= $plat->image?>" class="img-fluid card-img-top img_plat"  alt="jaquettes" height="300px" width="300px">
                            <!-- affichage des noms du prix -->
                            <p style="text-align:center" class="mt-4"><strong><?= $plat->prix .' €'?></strong></p>
                            <!-- affichage de la description -->
                            <div class="row descr">
                                <p style="text-align:center"><?= $plat->description?></p>
                            </div>
                            <!-- Bouton "commander": -->
                            <div class="d-flex justify-content-center my-3">
                                <a class="btn btn-primary btn_comm p-auto" style="width:130px" href ="commande.php?id=<?=$plat->id?>">Commander</a>
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