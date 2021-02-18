<?php
session_start();
require_once('modeles/categories.php');
require_once('modeles/jeux.php');

$Categories = new Categories();
$liste_categorie = $Categories->recupererCategories();

$Jeux = new Jeux();
$jeux = $Jeux->getJeux();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style_log_reg.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class="wrapper" style="overflow:hidden; position:fixed;">
        <div class="conteiner">
            <h1>Creer un topic</h1>

            <form class="form2" method="post" action=" Action/add_topic.php?username=<?= $_SESSION['username'] ?>" autocomplete="off">

                <select style="width:70%" name="name_jeu" required>
                    <option value="" disabled selected>Quel jeu ?</option>
                    <?php foreach ($jeux as $jeu) {
                    ?>
                        <option value="<?= $jeu['name'] ?>"><?= $jeu['name'] ?></option>
                    <?php
                    } ?>
                </select>

                <input type="text" name="titre" placeholder="Titre du Topic" required>

                <textarea type="text" name="contenu" placeholder="Votre Topic" required></textarea>

                <button type="submit">Creer</button>

                <a href=" forum.php" class="login">
                    <h4> Oops je me suis trompé. Retourner au forum </h4>
                </a>
            </form>
        </div>

        <ul class="bg-bubbles">
            <?php

            for ($i = 0; $i < 15; $i++) { ?>
                <li></li>
            <?php
            };
            ?>
        </ul>
    </div>
</body>
<?php include_once('js/script_reg_log.php'); ?>

</html>