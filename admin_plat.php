<?php
require_once('DAO.php');

include("header.php");

$plats = all_from_plat();

if (isset($_GET["id"])){
    $suppr = delete_plat($_GET["id"]);
    }

// $suppr = delete_plat($_GET["id"]);
?>

<div class="container col-7 div_cat mt-5 py-5 bg_admin">
    <div>
        <div class="col-5 d-flex justify-content-center m-auto my-5 cat_count rounded p-3">
            <h2>Liste des plats</h2>
        </div>
        <hr class="w-75 mx-auto mt-3 mb-3">
        <br>
        <div class="text-center mb-5">
            <a href="form_ajout_plat.php" class="col-2 btn btn-light btn-sm mx-3">Ajouter un plat</a>
            <a href="admin.php" class="col-2 btn btn-light btn-sm mx-3">Retour</a>
        </div>
        
        <table class="table_c table-bordered mx-3 table_admin">
            <thead>
                <tr>
                    <th class="col-2 text-center">Nom du plat</th>
                    <th class="col-2 text-center">Image</th>
                    <th class="col-3 text-center">Active</th>
                    <th class="col-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($plats as $plat) : ?>
                    <tr>
                        <td class="text-center"><h5><?= $plat->libelle ?></h5></td>
                        <td><img class="image-fluid col-12" src="assets/images_the_district/food/<?= $plat->image ?>"></td>
                        <td class="text-center"><h5><?= $plat->active ?></h5></td>
                        <td class="text-center">
                            <a href="form_modif_plat.php=<?= $plat->id ?>" class="col-5 my-2 btn btn-light btn-sm mx-1">Modifier</a>

                            <form method="POST">
                                <a href="suppr_cat.php=<?= $plat->id ?>" class="col-5 my-2 btn btn-light btn-sm mx-1" 
                                onclick="return confirm('Voulez-vous vraiment supprimer cet élément ?')">Supprimer</a>
                                <input type="hidden" name="del" value="<?= $plat->id ?>">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <!-- Suppr.plat : -->
                <?php
                if(isset($_POST["del"])){

                    $plat_id = $_POST["del"];
                    delete_plat($plat_id);
                }
                ?>

            </tbody>
        </table>
    </div>
</div>