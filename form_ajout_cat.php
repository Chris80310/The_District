<?php

include "header.php"

?>

<body class="bg1">

    <div class="container col-7 div_cat mt-5 py-5">

        <div class="col-3 d-flex justify-content-center mx-auto my-5 cat_count rounded p-3">  
            <h1>Ajout catégorie</h1>
        </div>

        <form action ="script_cat_ajout.php" method="post" enctype="multipart/form-data">

            <div class="">
                <div class="row my-5 m-auto">
                    <div class="col">
                        <label for="nom_label"><h5>libelle :</h5></label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="col-8 form" name="libelle" id="libelle">
                    </div>
                </div>

                <div class="row my-5 m-auto">
                    <div class="col">
                        <label for="prenom_label"><h5>image :</h5></label><br>
                    </div>
                    <div class="col-9">
                        <input type="file" class="col-8 form" name="picture" id="image">
                    </div>
                </div>
                
                <div class="row my-5 m-auto">
                    <div class="col">
                        <label for="url_label"><h5>active:</h5></label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="col-8 form" name="active" id="active">
                    </div>
                </div>   

                <div class="col-12 d-flex justify-content-center my-5">
                    <input class="btn btn-primary col-2 mx-5 mt-3 btn_form" type="submit" name="Confirmer" value="Confirmer">
                    <a class="btn btn-primary col-2 mx-5 mt-3 btn_form2" href="admin.php">Retour</a>
                </div>
            </div>

        </form>   
    </div>
</body>

<?php

include "footer.php"

?>