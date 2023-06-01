
<?php
   
    require_once('DAO.php');
    include("header.php");

    $resultat = all_from_usr();
?>


<div class="container col-7 div_cat mt-5 py-5 bg_admin">

    <h2 class="col-xs-5 col-8 d-flex justify-content-center m-auto my-5 cat_count rounded p-3">Gestion utilisateurs</h2>

    <div class="text-center mb-5">
        <a href="user_ajout.php" class="col-xs-2 col-4 btn btn-light btn-sm mx-3">Ajout utilisateur</a>
        <a href="admin.php" class="col-xs-2 col-4 btn btn-light btn-sm mx-3">Retour</a>
    </div>

    <div class="table-responsive text-center">
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
                <?php foreach ($resultat as $usr) : ?>
                    <tr>
                        <td><?php $usr->id_utilisateur; ?></td >
                        <td><?php $usr->nom; ?></td >
                        <td><?php $usr->prenom; ?></td >
                        <td><?php $usr->email; ?></td >
                        <td><?php $usr->password; ?></td >
                        <td>
                            <a href="?page=admin&gest=user_mod&id=<?php $usr->id_utilisateur; ?>" class="btn btn-light btn-sm text-white">Modifier</a>
                            <a href="?page=admin&gest=user_delete&id=<?php $usr->id_utilisateur; ?>" class="btn btn-light btn-sm text-white">Supprimer</a>
                        </td >
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center my-5">
            <a href="/?page=admin&gest=user_create" class="col-xs-2 btn btn-light btn-sm text-white mx-2">Valider</a>
        </div>
    
    </div>
</div>
