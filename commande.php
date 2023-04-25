<?php

include "db.php";

$db = connexionBase();

// foreach description plat + image :
$requete = $db->prepare("SELECT * FROM plat WHERE plat.id = ?");  

$requete->execute(array($_GET["id"]));
$resultat = $requete->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();

include("header.php");

// var_dump($resultat);

?>

<body>

    
    <div class="card liste-cat m-auto my-3" id="cmde" style="width: 50rem">
        <div class="card-body p-2">
            <div class="d-lg-flex">

                <div class="col-lg-4 m-auto">
                    <?php foreach ($resultat as $info): ?>
                        <!-- affichage des noms du plat -->
                        <div CLASS="d-flex justify-content-center my-2"> 
                            <h5 class="card-title" style="text-align:center"><h5><?= $info->libelle?></h5>
                        </div>
                        <!-- partie inférieure avec l'image -->
                        <img src="/assets/images_the_district/food/<?= $info->image?>" class="img-fluid card-img-top img_plat"  alt="jaquettes" height="300px" width="300px">
                        <!-- affichage des noms du prix -->
                        <p style="text-align:center" class="mt-4"><strong><?= $info->prix .' €'?></strong></p>
                        <!-- affichage de la description -->
                        <div class="row descr">
                            <p style="text-align:center"><?= $info->description?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="col">
                    
                    <div class="col-3 d-flex justify-content-center mx-auto my-5 cat_count rounded p-3">  
                        <h1>Commande</h1>
                    </div>

                    <form action ="script_commande.php" method="post">

                        <div class="row my-5 m-auto">
                            <div class="col">
                                <label for="qte"><h5>Quantité :</h5></label>
                            </div>
                            <div class="col-9">
                                <select class="col-8 form" name="qte" id="form">
                                    <option value="">Veuillez choisir une quantité</option>
                                </select>
                            <script>

                            </script>

                            </div>
                        </div>

                    
                        <div class="row my-5 m-auto">
                            <div class="col">
                                <label for="nom"><h5>Nom & Prénom :</h5></label>
                            </div>
                            <div class="col-9 m-auto">
                                <input type="text" class="col-8 form" name="nom" id="form">
                            </div>
                        </div>

                        <div class="row my-5 m-auto">
                            <div class="col">
                                <label for="url_label"><h5>Adresse :</h5></label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="col-8 form" name="adresse" id="form" placeholder=" Numéro de porte & rue ...">
                            </div>
                        </div>  

                        <div class="row my-5 m-auto">
                            <div class="col">
                                <label for="ville"><h5>Ville & code postal :</h5></label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="col-8 form my-1" name="ville" id="form" placeholder=" Ville">
                                <input type="text" class="col-8 form my-1" name="cp" id="form" placeholder=" Code postal">
                            </div>
                        </div> 
                        
                        <div class="row my-5 m-auto">
                            <div class="col">
                                <label for="url_label"><h5>Mail :</h5></label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="col-8 form" name="email" id="form" placeholder=" Exemple@service.com">
                            </div>
                        </div>   

                        <div class="row my-5 m-auto">
                            <div class="col">
                                <label for="tel_label"><h5>Numéro de téléphone :</h5></label> <br>
                            </div>  
                            <div class="col-9 m-auto">
                                <input type="text" class="col-8 form" name="tel" id="form">
                            </div>
                        </div> 

                        <div class="col-12 d-flex justify-content-center my-5">
                            <input class="btn btn-primary col-2 mx-5 mt-3 btn_comm" type="submit" value="Confirmer">
                            <a class="btn btn-primary col-2 mx-5 mt-3 btn_comm" href="plat_list.php?id=<?=$info->id?>">Retour</a>
                        </div>


                    </form>
                </div>
            </div> 
        </div> 
    </div>

</body>

<?php

include("footer.php");

?>