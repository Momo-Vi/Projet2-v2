<div>
    <?php
    $format_fr = $info_user->birthday;
    $format_us = implode('/', array_reverse(explode('-', $format_fr)));
    ?>

    <p style=" color:#313131; font-size:1.5rem; margin-left:15px;"><u>Identifiant :</u> <?= $info_user->username ?></p>
    <p style=" color:#313131; font-size:1.5rem; margin-left:15px;"><u>Email :</u> <?= $info_user->email ?></p>
    <p style=" color:#313131; font-size:1.5rem; margin-left:15px;"><u>Nom :</u> <?= $info_user->nom ?></p>
    <p style=" color:#313131; font-size:1.5rem; margin-left:15px;"><u>Prénom :</u> <?= $info_user->prenom ?></p>
    <p style=" color:#313131; font-size:1.5rem; margin-left:15px;"><u>Naissance :</u> <?= $format_us ?></p>
    <p style=" color:#313131; font-size:1.5rem; margin-left:15px;"><u>Tel :</u> <?= $info_user->num_tel ?></p>
    <p style=" color:#313131; font-size:1.5rem; margin-left:15px;"><u>Adresse :</u> <?= $info_user->adresse ?></p>
    <p style=" color:#313131; font-size:1.5rem; margin-left:15px;"><u>Pays :</u> <?= $info_user->pays ?></p>

    <hr>
    <a style="text-align :center;" href="profil.php">Modifier le profil</a>
    <a style="text-align :center;" href="index.php?logout='1'">Deconnexion</a>
</div>