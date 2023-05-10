
<?php
   
    require_once('DAO.php');
    include("header.php");
    $categorie = id_cat($_GET['id'])
?>


<body>
    <div class="container col-7 div_cat mt-5 py-5 bg_admin">

        <h2 class="text-center mb-5">Modifier la catégorie</h2>
        <hr>
        <div class="container my-5 mnb-nm rounded">
        
        <div class="">
        <div class="text-center mb-5">
            <h2>Liste des utilisateurs</h2>
            <hr class="w-75 mx-auto mt-3 mb-3"><a href="/?page=admin&gest=user_create" class="btn btn-light btn-sm text-black">Créer un utilisateur</a>
            <hr class="w-75 mx-auto mt-3 mb-3">
        </div>
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
                            <!-- <a href="?page=admin&gest=user_mod&id=<?php echo $row->id_utilisateur; ?>" class="btn btn-light btn-sm text-black">Modifier</a>
                            <a href="?page=admin&gest=user_delete&id=<?php echo $row->id_utilisateur; ?>" class="btn btn-light btn-sm text-black">Supprimer</a> -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
            
        </div>
    </div>
</body>