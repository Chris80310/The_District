<?php

include "DAO.php";
include "header.php";

$category = id_cat($_GET["id"]);

// $modif_cat = update_cat($libelle,$active,$picsName,$id);

?>

<body class="bg1">

    <div class="container col-7 div_cat mt-5 py-5">

        <div class="col-3 d-flex justify-content-center mx-auto my-5 cat_count rounded p-3">
            <h1>Modifier la catégorie</h1>
        </div>
       
        <div class="col-12 d-flex justify-content-center rounded">    
            <img class="image-fluid col-3" src="assets/images_the_district/category/<?= $category->image ?>" alt="<?= $category->image ?>">
        </div> 

        <form action="script_cat_modif.php" method="post" enctype="multipart/form-data">

            <div class="">
                <div class="row my-5 m-auto">
                    <div class="col">
                        <label for="nom_label">
                            <h5>libelle :</h5>
                        </label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="col-8 form" name="libelle" id="libelle" value="<?= $category->libelle ?>">
                    </div>
                </div>

                <div class="row my-5 m-auto">
                    <div class="col">
                        <label for="prenom_label">
                            <h5>image :</h5>
                        </label><br>
                    </div>
                    <div class="col-9">
                        <input type="file" class="col-8 form" name="picture" id="image" value="<?= $category->image ?>">
                    </div>
                </div>

                <div class="row my-5 m-auto">
                    <div class="col">
                        <label for="url_label">
                            <h5>active:</h5>
                        </label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="col-8 form" name="active" id="active" value="<?= $category->active?>">
                    </div>
                </div>

                <input type="hidden" id="id" name="id" value="<?= $category->id?>">

                <div class="col-12 d-flex justify-content-center my-5">
                    <input class="btn btn-primary col-2 mx-5 mt-3 btn_form" type="submit" name="Confirmer" value="Confirmer">
                    <a class="btn btn-primary col-2 mx-5 mt-3 btn_form2" href="admin_cat.php">Retour</a>
                </div>
            </div>

        </form>
    </div>
</body>

<?php

include "footer.php"

?>