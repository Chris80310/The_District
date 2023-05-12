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
    <div class="card liste-cat m-auto my-5" id="cmde" style="width: 50rem">
        <div class="col-12 p-1">

            <form action ="script_commande.php" class="" method="post">

                <div class="row m-auto">

                    <div class="col-12 d-flex justify-content-center mx-auto my-5 cat_count rounded p-3">  
                        <h1>Commande</h1>
                    </div>

                    <div class="col-lg-6">
                        <?php foreach ($resultat as $info): ?>
                            <!-- affichage des noms du plat -->
                            <div CLASS="d-flex justify-content-center my-2"> 
                                <h5 class="card-title" style="text-align:center"><h5><?= $info->libelle?></h5>
                                <input type="hidden" name="libelle" value="<?= $info->libelle?>">
                            </div>
                            <!-- partie inférieure avec l'image -->
                            <img src="/assets/images_the_district/food/<?= $info->image?>" class="img-fluid card-img-top img_plat"  alt="" height="300px" width="300px">
                            <!-- affichage des noms du prix -->
                            <p style="text-align:center" class="mt-4"><strong><?= $info->prix .' €'?></strong></p>
                            <!-- affichage de la description -->
                            <div class="row descr">
                                <p style="text-align:center"><?= $info->description?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="col-lg-6 my-auto">
                        <div class="d-flex justify-content-between">

                            <div class="mx-2">
                                <label class="my-3" for="qte"><h5>Quantité: </h5></label>
                            
                                <label class="my-3" for="total"><h5>Total: </h5></label>
                            </div>

                            <div class="">
                                <!-- Select quantité : -->
                                <select class="mx-2 my-3" name="qte" id="qte">
                                    <option value="" name="option" id="option">Choisir </option>
                                </select>

                                <!-- Script pour le select quantité : -->
                                <script>
                                var quantiteSelect = document.getElementById("qte");
                                for (var i=1; i<=20; i++) { 
                                var option = document.createElement("option");
                                option.value = i;
                                option.text = i;
                                quantiteSelect.add(option);
                                }
                                </script>

                                <!-- Prix total: -->
                                <div class="d-flex justify-content-between my-3">
                                    <input type="text" id="total" name="total" value="<?=$info->prix?>" readonly>
                                </div>
                                <!-- Script pour le prix total : -->
                                <script>
                                        var prixElement = document.getElementById("total");
                                        var prixInitial = prixElement.value;
                                        var numbersElement = document.getElementById("qte");
                                        numbersElement.addEventListener("change", function() {
                                        var quantite = numbersElement.value;
                                        if (quantite !== "1") {
                                            var total = parseFloat(prixInitial) * parseInt(quantite);
                                            prixElement.value = total.toFixed(2);
                                            } else {
                                                prixElement.value = prixInitial;
                                            }
                                        });
                                </script>

                            </div>
                        </div>
    
                        <div class="d-flex justify-content-between my-5">
                            <div class="">
                                <label for="nom"><h5>Nom & Prénom :</h5></label>
                            </div>
                            <div class="">
                                <input type="text" class="my-2" name="nom" id="form">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between my-5">
                            <div class="">
                                <label for="url_label"><h5>Adresse :</h5></label>
                            </div>
                            <div class="">
                                <input type="text" class="" name="adr" id="form" placeholder=" Numéro de porte & rue ...">
                            </div>
                        </div>  

                        <div class="d-flex justify-content-between my-5">
                            <div class="">
                                <label for="ville"><h5>code postal & Ville :</h5></label>
                            </div>
                            <div class="">
                                <input type="text" class="mb-2" name="ville" id="form" placeholder=" Ville">
                                <!-- <input type="text" class="" name="cp" id="form" placeholder=" Code postal"> -->
                            </div>
                        </div> 
                        
                        <div class="d-flex justify-content-between my-5">
                            <div class="">
                                <label for="url_label"><h5>Mail :</h5></label>
                            </div>
                            <div class="">
                                <input type="text" class="" name="email" id="form" placeholder=" Exemple@service.com">
                            </div>
                        </div>   

                        <div class="d-flex justify-content-between my-5">
                            <div class="">
                                <label for="tel_label"><h5>Numéro de téléphone :</h5></label> <br>
                            </div>  
                            <div class="">
                                <input type="text" class="my-2" name="tel" id="form">
                            </div>
                        </div> 
                    </div>

                    <input name="id" type="hidden" value="<?=$info->id?>">

                    <div class="col-12 d-flex justify-content-center my-5">
                        <input class="btn btn-primary col-2 mx-5 btn_comm" href="plat_list.php?id=<?=$info->id?>" type="submit" value="Confirmer">
                        <a class="btn btn-primary col-2 mx-5 btn_comm" href="plats.php">Retour</a>
                    </div>

                </div> 
            </form>
        </div> 
    </div>
</body>

<?php

include("footer.php");

?>