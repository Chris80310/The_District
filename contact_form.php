<?php

include "header.php"

?>

<body class="bg1">

    <div class="container col-xs-7 col-12 div_cat mt-5 py-5">

        <div class="col-xs-3 col-12 d-flex justify-content-center mx-auto my-5 cat_count rounded p-3">  
            <h1>Contact</h1>
        </div>

        <form action ="script_contact.php" method="post">

            <div class="">
                <div class="row my-5 m-auto">
                    <div class="col-xs col-12">
                        <label for="nom_label"><h5>Nom :</h5></label>
                    </div>
                    <div class="col-xs-9 col-12">
                        <input type="text" class="col-xs-8 col-12 form" name="nom" id="form">
                    </div>
                </div>

                <div class="row my-5 m-auto">
                    <div class="col">
                        <label for="prenom_label"><h5>Prenom :</h5></label><br>
                    </div>
                    <div class="col-xs-9 col-12">
                        <input type="text" class="col-xs-8 col-12 form" name="prenom" id="form">
                    </div>
                </div>
                
                <div class="row my-5 m-auto">
                    <div class="col">
                        <label for="url_label"><h5>Adresse mail:</h5></label>
                    </div>
                    <div class="col-xs-9 col-12">
                        <input type="text" class="col-xs-8 col-12 form" name="email" id="form" placeholder=" Exemple@service.com">
                    </div>
                </div>   

                <div class="row my-5 m-auto">
                    <div class="col">
                        <label for="tel_label"><h5>Numéro de téléphone :</h5></label> <br>
                    </div>  
                    <div class="col-xs-9 col-12">
                        <input type="number" class="col-xs-8 col-12 form" name="tel" id="form">
                    </div>
                </div> 

                <div class="row my-5 m-auto">
                    <div class="col">
                        <label for="txt_label"><h5>Votre message :</h5></label> <br>
                    </div>  
                    <div class="col-xs-9 col-12">
                        <textarea cols="20" rows="10" class="col-xs-8 col-12 form" name="mess" id="form" placeholder=" Votre message ici"></textarea>
                    </div>
                </div> 

                <div class="col-12 d-flex justify-content-center my-5">
                    <input class="btn btn-primary col-xs-2 col-6 mx-2 mt-3 btn_form" type="submit" name="Confirmer" value="Confirmer">
                    <a class="btn btn-primary col-xs-2 col-6 mx-2 mt-3 btn_form2" href="index.php">Retour</a>
                </div>
            </div>

        </form>   
    </div>
</body>

<?php

include "footer.php"

?>