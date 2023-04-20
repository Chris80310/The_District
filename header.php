<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>the_district</title>
</head>

<body>

    <header class="bg_header">

        <div class="container-fluid p-0">
            <div class="col d-flex div_header img-responsive">
                <!-- banière / logo :  --> 
                <img src="/assets/images_the_district/the_district_brand/logo_transparent.png" height="300px">
            </div>
            
            <nav class="navbar navbar-expand-lg p-0">
                <div class="row navbar-collapse py-2" id="navbarNav">
                    <ul class="col-8 navbar-nav d-flex justify-content-around p-0">
                        <li class="nav-item active mx-5">
                            <a class="nav-link" style="color:white" href="/index.php"><span><strong>Accueil</strong></span><span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link" style="color:white" href="categories.php"><span><strong>Catégories</strong></span></a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link" style="color:white" href="plats.php"><span><strong>Plats</strong></span></a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link" style="color:white" href="contact_form.php"><span><strong>Contact</strong></span></a>
                        </li>
                    </ul>
                    <div class="col d-flex justify-content-center input-group p-0">
                        <input id="oSaisie" name="oSaisie" type="text" aria-label="Saisie de mots clés" placeholder="Mot(s) clé(s)" required="required">
                        <div class="input-group-append">
                            <button class="btn btn-success button button_color" width="20px" type="submit">Recherche</button>
                        </div>
                    </div>
                </div>
            </nav>
        </div>


    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
