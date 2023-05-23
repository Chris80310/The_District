<?php

include "DAO.php";
include "header.php";

$plat= update_plat($id_plat,$libelle, $description, $prix, $image,$id_categorie);

?>

<body class="bg1">

    <div class="container col-7 div_cat mt-5 py-5">

        <div class="col-3 d-flex justify-content-center mx-auto my-5 cat_count rounded p-3">
            <h1>Modifier le plat</h1>
        </div>

        <thead>
            <tr>
                <th class="col-2 text-center">Nom du plat</th>
                <th class="col-2 text-center">Image</th>
                <th class="col-3 text-center">Active</th>
               
            </tr>
        </thead>

        <tbody>
            <tr>
                
                <td class="text-center">
                    <h5><?= $plat->libelle ?></h5>
                </td>
                <td><img class="image-fluid col-3" src="assets/images_the_district/plat/<?= $plat->image ?>" alt="<?= $plat->image ?>"></td>
                <td class="text-center">
                    <h5><?= $plat->active ?></h5>
                </td>
        
            </tr>
        </tbody>

        <form action="script_cat_modif.php" method="post" enctype="multipart/form-data">

            <div class="">
                <div class="row my-5 m-auto">
                    <div class="col">
                        <label for="nom_label">
                            <h5>libelle :</h5>
                        </label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="col-8 form" name="libelle" id="libelle">
                    </div>
                </div>

                <div class="row my-5 m-auto">
                    <div class="col">
                        <label for="prenom_label">
                            <h5>image :</h5>
                        </label><br>
                    </div>
                    <div class="col-9">
                        <input type="file" class="col-8 form" name="picture" id="image">
                    </div>
                </div>

                <div class="row my-5 m-auto">
                    <div class="col">
                        <label for="url_label">
                            <h5>active:</h5>
                        </label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="col-8 form" name="active" id="active">
                    </div>
                </div>

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