<?php
session_start();
require_once('templates/base_profil.php');
require_once('traitement/profil_update.php');
include('Action/authentification.php');
require_once('modeles/user.php');

$User = new User;
$info_user = $User->getUserByID($_SESSION['id']);


$updateprofil = new UpdateProfil();
$update = $updateprofil->update_profile();
?>

<body>
    <div class="wrapper">
        <?php
        $format_fr = $info_user->birthday;
        $format_us = implode('/', array_reverse(explode('-', $format_fr)));
        ?>
        <div class="container">
            <h1>Modifier mes infos</h1>

            <form class="form" method="post" action="profil.php" autocomplete="off">

                <input type="text" name="username" placeholder="Pseudo" value="<?php echo $info_user->username; ?>">

                <input type="text" name="nom" placeholder="Nom" value="<?php echo $info_user->nom; ?>">

                <input type="text" name="prenom" placeholder="Prénom" value="<?php echo $info_user->prenom; ?>">

                <input type="tel" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" name="num_tel" placeholder="Phone Number" value="<?php echo $info_user->num_tel; ?>">

                <input type="text" name="adresse" placeholder="Adresse" value="<?php echo $info_user->adresse; ?>">

                <input type="text" name="pays" placeholder="Pays" value="<?php echo $info_user->pays; ?>">

                <input type="email" name="email" placeholder="E-mail" value="<?php echo $info_user->email; ?>">

                <input type="password" name="password_1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Mot de passe" data-toggle="tooltip" data-placement="top" title=" 1 Majuscule / 1 Minuscule / 8 Caractères requis">

                <input type="password" name="password_2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Confirmer le mot de passe" data-toggle="tooltip" data-placement="top" title="Ressaisir votre mot de passe ">

                <button type="submit" id="login-button" name="modif_profil" onclick="update_profile()">Modifier</button>

            </form>
        </div>

    </div>
</body>