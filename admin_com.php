<?php
require_once('DAO.php');
include("header.php");

$resultat = all_from_com();
?>

<div class="container col-7 div_cat mt-5 py-5 bg_admin">
    
        <div class="col-5 d-flex justify-content-center m-auto my-5 cat_count rounded p-3">
            <h2>Liste des commandes</h2>
        </div>
        <hr class="w-75 mx-auto mt-3 mb-3">
        <br>
        <div class="text-center mb-5">
            <a href="" class="col-2 btn btn-light btn-sm mx-3">Ajouter une commande</a>
            <a href="admin.php" class="col-2 btn btn-light btn-sm mx-3">Retour</a>
        </div>
        
        <table class="table_c table-bordered mx-3">
            <thead>
                <tr>
                    <th class="col-1 text-center">ID Plat</th>
                    <th class="col-1 text-center">Quantité</th>
                    <th class="col-1 text-center">Total</th>
                    <th class="col-1 text-center">Date</th>
                    <th class="col-1 text-center">etat</th>
                    <th class="col-1 text-center">Nom client</th>
                    <th class="col-1 text-center">Téléphone</th>
                    <th class="col-1 text-center">Email</th>
                    <th class="col-2 text-center">Adresse</th>
                    <th class="col-2 text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($resultat as $row) : ?>
                    <tr>
                    <!-- <td><?= $row->libplat ?> </td> -->
                    <td class="text-center"><?= $row->id_plat ?> </td>
                    <td class="text-center"><?= $row->quantite ?> </td>
                    <td class="text-center"><?= $row->total ?>€ </td>
                    <td class="text-center"><?= $row->date_commande ?> </td>
                    <td class="text-center"><?= $row->etat ?> </td>
                    <td class="text-center"><?= $row->nom_client ?> </td>
                    <td class="text-center"><?= $row->telephone_client ?> </td>
                    <td class="text-center"><?= $row->email_client ?> </td>
                    <td class="text-center"><?= $row->adresse_client ?> </td>
                    <td class="text-center">
                        <a href="<?= $row->id ?> " class="col-8 btn btn-light btn-sm my-1">Modifier</a>
                        <a href="<?= $row->id ?> " class="col-8 btn btn-light btn-sm my-1">Supprimer</a>
                    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    
</div>