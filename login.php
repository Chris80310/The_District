<?php

include "header.php"

?>

<body class="bg1">

    <div class="container col-7 div_cat mt-5 py-5">

        <div class="col-3 d-flex justify-content-center mx-auto my-5 cat_count rounded p-3">  
            <h1>Connexion</h1>
        </div>

        <form action ="script_contact.php" method="post">

            <div class="">
                
                <div class="row my-5 m-auto">
                    <div class="col">
                        <label for="url_label"><h5>Adresse mail:</h5></label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="col-8 form" name="email" id="form" placeholder=" Exemple@service.com">
                    </div>
                </div> 
                
                <div class="row my-5 m-auto">
                    <div class="col">
                        <label for="url_label"><h5>Mot de passe:</h5></label>
                    </div>
                    <div class="col-9">
                        <input type="password" class="col-8 form" name="mdp" id="mdp">
                    </div>
                </div>   

                <div class="col-12 d-flex justify-content-center my-5">
                    <input class="btn btn-primary col-2 mx-5 mt-3 btn_form" type="submit" value="Confirmer">
                    <a class="btn btn-primary col-2 mx-5 mt-3 btn_form2" href="index.php">Retour</a>
                </div>
            </div>

        </form>   
    </div>
</body>

<?php

include "footer.php"

?>