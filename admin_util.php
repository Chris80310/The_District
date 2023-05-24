
<?php
   
    require_once('DAO.php');
    include("header.php");
    $categorie = id_cat($_GET['id'])
?>


<body>
    <div class="container col-7 div_cat mt-5 py-5 bg_admin">

        <h2 class="col-md-5 col-8 d-flex justify-content-center m-auto my-5 cat_count rounded p-3">Gestion utilisateurs</h2>

        <div class="table-responsive">
            <div class="container my-5 mnb-nm rounded">
                <table class="table_c table-bordered mx-3">
                    <thead>
                        <tr>
                            <th class="col-1">ID</th>
                            <th class="col-1">Nom</th>
                            <th class="col-1">Prénom</th>
                            <th class="col-1">Email</th>
                            <th class="col-4">Mot de passe</th>
                            <th class="col-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row) : ?>
                            <tr>
                                <td><?php echo $row->id_utilisateur; ?></td>
                                <td><?php echo $row->nom; ?></td>
                                <td><?php echo $row->prenom; ?></td>
                                <td><?php echo $row->email; ?></td>
                                <td><?php echo $row->password; ?></td>
                                <td>
                                    <!-- <a href="?page=admin&gest=user_mod&id=<?php echo $row->id_utilisateur; ?>" class="btn btn-light btn-sm text-white">Modifier</a>
                                    <a href="?page=admin&gest=user_delete&id=<?php echo $row->id_utilisateur; ?>" class="btn btn-light btn-sm text-white">Supprimer</a> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="text-center my-5">
                    <a href="/?page=admin&gest=user_create" class="col-md-2 btn btn-light btn-sm text-white mx-2">Valider</a>
                    <a href="admin.php" class="col-md-2 btn btn-light btn-sm text-white mx-2">Retour</a>
                </div>
            </div>
        </div>
    </div>
</body>