<?php

if (!isset($_SESSION['username'])) {
    header('location:  login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location:  login.php");
}

require_once('modeles/categories.php');
require_once('modeles/user.php');

$User = new User;
$info_user = $User->getUserByID($_SESSION['id']);

$Categorie = new Categories;
$liste_categorie = $Categorie->recupererCategories();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Center Game</title>
    <link rel="icon" href="images/icon.png" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style_log_reg.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap_min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div id="sideNavigation" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNavMenu()">&times;</a>

    </div>


    <div id="sideNavigation2" class="sidenav2">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNavProfil()">&times;</a>
        <?php include_once('templates/info_profil.php') ?>

    </div>


    <div class="topnav">
        <nav><b>
                <a onclick="openNavMenu()">
                    <i class="fas fa-bars"></i> Menu
                </a>
                <div style="float:right">
                    <a href="index.php?choix=0">
                        <i class="fas fa-th-list"></i> Liste de jeux
                    </a>

                    <a href="forum.php">
                        <i class="far fa-comments"></i> Forum
                    </a>

                    <a href="#"></a>

                    <a href="#" onclick="openNavProfil()">
                        <i class="fas fa-user-circle"></i> Profil
                    </a>
                </div>

            </b></nav>
    </div>
</body>
<?php include_once('js/script.php'); ?>

</html>