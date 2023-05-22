<?php

require_once('DAO.php');

include "header.php";

$liste_cat = all_from_cat();

// create_plat($libelle,$active,$picsName,$description,$prix,$id_cat);

?>

<body class="bg1">

    <div class="container col-7 div_cat mt-5 py-5">

        <div class="col-3 d-flex justify-content-center mx-auto my-5 cat_count rounded p-3">  
            <h1>Ajout plat</h1>
        </div>

        <form action ="script_plat_ajout.php" Method="post" enctype="multipart/form-data">

            <div class="row my-5 m-auto">
                <div class="col">
                    <label for="id_cat"><h5>Catégorie:</h5></label>
                </div>
                <div class="col-9">
                    <select name="id_cat" id="pet-select">
                            <option value="choisir">-- Choisir la catégorie --</option selected>
                        <?php foreach($liste_cat as $cat): ?>
                            <option value="<?= $cat->id ?>"><?= $cat->libelle?></option>
                        <?php endforeach; ?>
                    </select>

                    <!-- <input type="select" class="col-8 form" name="cat_list" id="cat_list"> -->
                </div>
            </div>

            <div class="">
                <div class="row my-5 m-auto">
                    <div class="col">
                        <label for="libelle"><h5>libelle :</h5></label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="col-8 form" name="libelle" id="libelle">
                    </div>
                </div>

                <div class="row my-5 m-auto">
                    <div class="col">
                        <label for="image"><h5>image :</h5></label><br>
                    </div>
                    <div class="col-9">
                        <input type="file" class="col-8 form" name="image" id="image">
                    </div>
                </div>
                
                <div class="row my-5 m-auto">
                    <div class="col">
                        <label for="description"><h5>description:</h5></label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="col-8 form" name="description" id="description">
                    </div>
                </div>
                
                <div class="row my-5 m-auto">
                    <div class="col">
                        <label for="prix"><h5>prix:</h5></label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="col-8 form" name="prix" id="prix">
                    </div>
                </div>

                <div class="row my-5 m-auto">
                    <div class="col">
                        <label for="active"><h5>active:</h5></label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="col-8 form" name="active" id="active">
                    </div>
                </div>

                <!-- <input type="hidden" class="#" name="id_categorie" value="" id="id_categorie"> -->

                <div class="col-12 d-flex justify-content-center my-5">
                    <input class="btn btn-primary col-2 mx-5 mt-3 btn_form" type="submit" name="Confirmer" value="Confirmer">
                    <a class="btn btn-primary col-2 mx-5 mt-3 btn_form2" href="admin_plat.php">Retour</a>
                </div>
            </div>

        </form>   
    </div>
</body>

<?php

include "footer.php"

?>