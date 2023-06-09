<?php

require("DAO.php");

// var_dump($_REQUEST);
// var_dump($_FILES);


// Récupération de l'element (syntaxe abrégée)
$libelle   = (isset($_POST['libelle']) && $_POST['libelle'] != "") ? $_POST['libelle'] : Null;
$active    = (isset($_POST['active']) && $_POST['active'] != "") ? $_POST['active']  : Null;
$picsName = (isset($_POST['picture']) && $_POST['picture'] != "") ? $_POST['picture'] : Null;
$id = (isset($_POST['id']) && $_POST['id'] != "") ? $_POST['id'] : Null;



// En cas d'erreur, on renvoie vers le formulaire
// if ($libelle == Null || $active == Null) {
//     header("Location: form_ajout_cat.php");
//     exit;
// }


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // var_dump($_FILES["picture"]);
    
    // Récupération et vérification de l'image:
    if (isset($_FILES["picture"]) && $_FILES["picture"]["error"] == 0) {
        $format = array("img/jpg", "img/gif", "img/jpeg", "img/pjpeg", "img/png", "img/x-png", "img/tiff", "image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff", "image/jpg");
        $picsName = $_FILES["picture"]["name"];
        $picsType = $_FILES["picture"]["type"];
        $picsSize = $_FILES["picture"]["size"];
        $maxSize = 5000000;
        // (<= 5Mo)
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $picsType = finfo_file($finfo, $_FILES["picture"]["tmp_name"]);
            finfo_close($finfo);

        if (in_array($picsType, $format)){
            if ($picsSize > $maxSize){
                die("La taille de votre image est supérieure à la limite autorisée!");
            }          
            else {
                move_uploaded_file($_FILES["picture"]["tmp_name"], "assets/images_the_district/category" . $_FILES["picture"]["name"]);
                // echo "Votre image a été téléchargé avec succès.";
            }
        }          
        else {
            echo "Erreur: Il y a eu un problème de téléchargement de votre image! 
            Veuillez réessayer.";
        }
    } else {
        echo "Erreur: " . $_FILES["picture"]["error"];
    }
}

update_cat($libelle,$active,$picsName,$id);

if (update_cat($libelle,$active,$picsName,$id)== true){
    header('location: admin_cat.php');
}
// var_dump(update_cat($libelle,$active,$picsName,$id));



?>
