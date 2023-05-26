<?php
    session_start();
    $id_user  = (isset($_POST['id']) && $_POST['id'] != "") ? $_POST['id'] : Null;
    $nom    = (isset($_POST['nom']) && $_POST['nom'] != "") ? $_POST['nom']  : Null;
    $email   = (isset($_POST['email']) && $_POST['email'] != "") ? filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) : null;
    $mdp   = (isset($_POST['mdp']) && $_POST['mdp'] !== "") ? filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING) : null;

    var_dump($_POST);
    
    if (create_user($nom, $prenom, $email, $mdp)== TRUE){
        header('location: user_ajout.php'); 
        exit; 
    }
    else{
        $_SESSION["log_err"]="Champ incorrect";
        header("Location: user_ajout.php");
        exit;
    }
    var_dump(create_user($nom, $prenom, $email, $mdp)); 
?>
<!-- ***************************************************************************************************************************************************** -->

<?php
require_once('DAO.php');
include("header.php");

$aaa=create_user($nom, $prenom, $email, $hashed_password);
?>

<body class="bg1">

    <div class="container col-7 div_cat mt-5 py-5">

        <div class="col-3 d-flex justify-content-center mx-auto my-5 cat_count rounded p-3">  
            <h1>Ajout utilisateur</h1>
        </div>

        <form action ="user_ajout.php" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" id="id">

            <div class="">
                <div class="row my-5 m-auto">
                    <div class="col">
                        <label for="nom"><h5>Nom & Prénom :</h5></label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="col-8 form" name="nom" id="nom">
                    </div>
                </div>

                <div class="row my-5 m-auto">
                    <div class="col">
                        <label for="email"><h5>Email</h5></label><br>
                    </div>
                    <div class="col-9">
                        <input type="email" class="col-8 form" name="email" id="email">
                        <br>
                        <strong><small class="text-danger"><?php if(isset($_SESSION["log_err"])){echo $_SESSION["log_err"];}?></small></strong>
                    </div>
                </div>
                
                <div class="row my-5 m-auto">
                    <div class="col">
                        <label for="mdp"><h5>Mot de passe :</h5></label>
                    </div>
                    <div class="col-9">
                        <input type="password" class="col-8 form" name="mdp" id="mdp">
                        <br>
                        <strong><small class="text-danger"><?php if(isset($_SESSION["log_err"])){echo $_SESSION["log_err"];}?></small></strong>
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