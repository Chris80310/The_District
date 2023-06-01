<?php
require_once('DAO.php');
include("header.php");

$resultat = all_from_com();
?>

<div class="container col-xs-7 div_cat mt-5 py-5 bg_admin">
    
    <div class="col-xs-5 col-8 d-flex justify-content-center m-auto my-5 cat_count rounded p-3">
        <h2>Liste des commandes</h2>
    </div>
    <hr class="w-75 mx-auto mt-3 mb-3">
    <br>
    <div class="text-center mb-5">
        <a href="" class="col-xs-2 col-4 btn btn-light btn-sm mx-3">Ajouter une commande</a>
        <a href="admin.php" class="col-xs-2 col-4 btn btn-light btn-sm mx-3">Retour</a>
    </div>
    
    <div class="table-responsive text-center">
        <table class="table_c table-bordered mx-3">
            <thead>
                <tr>
                    <th class="col-xs-1 col-2">ID Plat</th>
                    <th class="col-xs-1 col-2">Quantité</th>
                    <th class="col-xs-1 col-2">Total</th>
                    <th class="col-xs-1 col-2">Date</th>
                    <th class="col-xs-1 col-2">etat</th>
                    <th class="col-xs-1 col-2">Nom client</th>
                    <th class="col-xs-1 col-2">Téléphone</th>
                    <th class="col-xs-1 col-2">Email</th>
                    <th class="col-xs-2 col-2">Adresse</th>
                    <th class="col-xs-2 col-2">Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($resultat as $row) : ?>
                    <tr>
                    <td><?= $row->id_plat ?> </td>
                    <td><?= $row->quantite ?> </td>
                    <td><?= $row->total ?>€ </td>
                    <td><?= $row->date_commande ?> </td>
                    <td><?= $row->etat ?> </td>
                    <td><?= $row->nom_client ?> </td>
                    <td><?= $row->telephone_client ?> </td>
                    <td><?= $row->email_client ?> </td>
                    <td><?= $row->adresse_client ?> </td>
                    <td>
                        <a href="<?= $row->id ?> " class=" col-xs-10 btn btn-light btn-sm my-1">Modifier</a>
                        <a href="<?= $row->id ?> " class=" col-xs-10 btn btn-light btn-sm my-1">Supprimer</a>
                    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div> 
</div>