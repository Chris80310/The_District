
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link mx-5 rel="stylesheet" href="style.css">
    <script> src="https://code.jquery.com/jquery-3.6.0.min.js"</script>
    <link mx-5 href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>the_district</title>
    
</head>

<body>

    <header class="bg_header">

        <div class="container-fluid p-0">
            <div class="col d-flex div_header">
                <!-- banière / logo :  --> 
                <img src="/assets/images_the_district/the_district_brand/logo_transparent.png" class="img-fluid" style="height: 300px;">
            </div>
            
            <nav class="navbar navbar-expand-lg navbarNav">
                <div class="container-fluid navbarNav">
                <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="btn_menu mx-2">Menu</span>
                    <span class="navbar-toggler-icon"></span>
                </button>

                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <!-- <a class="navbar-brand" href="#">Hidden brand</a> -->
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link mx-5" style="color:white" href="/index.php"><span><strong>Accueil</strong></span><span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-5" style="color:white" href="categories.php"><span><strong>Catégories</strong></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-5" style="color:white" href="plats.php"><span><strong>Plats</strong></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-5" style="color:white" href="contact_form.php"><span><strong>Contact</strong></span></a>
                            </li>

                            <?php if (!isset($_SESSION['login'])) : ?>
                                <li class="nav-item">
                                    <a class="nav-link mx-5" style="color:white" name="connect" id="connect" href="login.php"><span><strong>Connexion</strong></span></a>
                                </li>
                            <?php endif; ?>
                            <?php if (isset($_SESSION['login'])) : ?>
                                <li class="nav-item">
                                    <a class="nav-link mx-5" style="color:white" name="connect" id="connect" href="admin.php"><span><strong>Admin</strong></span></a>
                                    <span class="">Connecté en tant que : <b><?= $_SESSION['login']?></b></span>
                                    <a class="btn btn-primary nav-link mx-5" href="deco.php" style="width:130px" name="connect" id="connect">Deconnexion</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <div class="col-lg d-flex justify-content-center input-group p-0">
                            <input id="oSaisie" name="oSaisie" type="text" aria-label="Saisie de mots clés" placeholder="Mot(s) clé(s)" required="required">
                            <div class="input-group-append">
                                <button class="btn btn-success button button_color" width="20px" type="submit">Recherche</button>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

