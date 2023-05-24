<?php

include "header.php";

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Aministration</title>
</head>
<body>
    <div class="container col-7 div_cat mt-5 py-5">
        <div class="">
           
            <?php if (isset($_SESSION['login'])) : ?>
            <nav>
                <div class="col-md-4 col-12 d-flex justify-content-center m-auto my-5 cat_count rounded">
                    <h1 class="text-center text-white my-5">Administration</h1>
                </div>
                <div class="d-flex row mt-5 mb-5 rounded mnb">
                    <ul class="navbar-nav ms-md-auto me-md-5">
                        <li class="nav-item mx-4 d-flex justify-content-center">
                            <a class="nav-link text-white" href="admin_cat.php">Gestion catégories</a>
                        </li>
                        <li class="nav-item mx-4 d-flex justify-content-center">
                            <a class="nav-link text-white" href="admin_plat.php">Gestion plats</a>
                        </li>
                        <li class="nav-item mx-4 d-flex justify-content-center">
                            <a class="nav-link text-white" href="admin_com.php">Gestion commandes</a>
                        </li>
                        <li class="nav-item mx-4 d-flex justify-content-center">
                            <a class="nav-link text-white" href="admin_util.php">Gestion utilisateurs</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <?php else : header("Location:/index.php"); endif; ?>   

        </div>
    </div>
</body>
</html>

