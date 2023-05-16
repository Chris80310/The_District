<?php
require_once('DAO.php');

include("header.php");

$categories = all_from_cat();
?>

<div class="container col-7 div_cat mt-5 py-5 bg_admin">
    <div>
        <div class="col-5 d-flex justify-content-center m-auto my-5 cat_count rounded p-3">
            <h2>Liste des catégories</h2>
        </div>
            <hr class="w-75 mx-auto mt-3 mb-3">
            <br>
        <div class="text-center mb-5">
            <a href="form_ajout_cat.php" class="col-2 btn btn-light btn-sm mx-3">Ajouter une catégorie</a>
            <a href="admin.php" class="col-2 btn btn-light btn-sm mx-3">Retour</a>
        </div>
        
        <table class="table_c table-bordered mx-3 table_admin">
            <thead>
                <tr>
                    <th class="col-2 text-center">Nom de la catégorie</th>
                    <th class="col-2 text-center">Image</th>
                    <th class="col-3 text-center">Active</th>
                    <th class="col-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) : ?>
                    <tr>
                        <td class="text-center"><h5><?= $category->libelle ?></h5></td>
                        <td><img class="image-fluid col-12" src="assets/images_the_district/category/<?= $category->image ?>" alt="<?= $category->image ?>"></td>
                        <td class="text-center"><h5><?= $category->active ?></h5></td>
                        <td class="text-center">
                            <a href="modif_cat.php=<?= $category->id ?>" class="col-5 btn btn-light btn-sm mx-1">Modifier</a>
                            <a href="suppr_cat.php=<?= $category->id ?>" class="col-5 btn btn-light btn-sm mx-1">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>