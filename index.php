
<!-- HEADER : -->
<?php
    session_start();
?>

<?php 
    if (file_exists("header.php") ) 
    {
        include("header.php");
    }
?>

<!-- ACCEUIL :  -->
<?php 
    if (file_exists("accueil.php") ) 
    {
        include("accueil.php");
    }
?>

<!-- FOOTER : -->
<?php
    if (file_exists("footer.php") ) 
    {
        include("footer.php");
    } 
?>