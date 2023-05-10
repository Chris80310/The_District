
<?php
    require_once('session.php');
    require_once('DAO.php');
    include("header.php");
    $categorie = id_cat($_GET['id'])
?>


<body>
    <div class="container col-7 div_cat mt-5 py-5 bg_admin">

        <h2 class="text-center mb-5">Modifier la catégorie</h2>
        <hr>
        <div class="container my-5 mnb-nm rounded">
        
            <form method="post" action=".php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nom_categorie" class="mt-3 mb-1">Nom de la catégorie</label>
                    <input type="text" class="form-control mb-4" id="nom_categorie" name="nom_categorie" value="<?= $categorie->libelle ?>" required>
                </div>
                <div class="form-group">
                    <label for="image" class="mb-1">Image de la catégorie</label><br>
                    <img src="assets/img/category/<?= $categorie->image ?>" class="rounded" alt="<?= $categorie->image ?>">
                    <input type="file" class="form-control-file" id="image_cat" name="image_cat">
                </div>
                <input type="hidden" name="old_cat_img" value="<?= $categorie->image ?>">
                <input type="hidden" name="id_categorie" value="<?= $categorie->id_categorie ?>">
                <div class="form-group d-flex justify-content-center">
                    <input type="submit" name="modif" class="btn btn-light btn-sm text-black mt-4 mb-3 mx-2" value="Modifier"></input>
                    <a href="" class="btn btn-light btn-sm text-black mt-4 mb-3">Retour</a>
                </div>
            </form>
        </div>
    </div>
</body>