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
    <link rel="icon" href="images/icon.png" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style_log_reg.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap_min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="wrapper">
        <div class="conteiner">
            <h1>Creer un topic</h1>

            <form class="form2" method="post" action=" Action/add_topic.php?username=<?= $_SESSION['username'] ?>" autocomplete="off">

                <select style="width:70%" name="name_jeu" required>
                    <?php foreach ($jeux as $jeu) {
                    ?>
                        <option value="<?= $jeu['name'] ?>"><?= $jeu['name'] ?></option>
                    <?php
                    } ?>
                </select>

                <input type="text" name="titre" placeholder="Titre du Topic" required>

                <textarea type="text" name="contenu" placeholder="Votre Topic" required></textarea>

                <button style="width:50%; margin-left:0px" type="submit">Creer</button>

                <a href=" forum.php" class="login">
                    <h4> Oops je me suis trompé. Retourner au forum </h4>
                </a>
            </form>
        </div>
    </div>
</body>
<?php include_once('js/script_reg_log.php'); ?>

</html>