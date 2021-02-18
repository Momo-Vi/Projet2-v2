<?php
session_start();
require_once('templates/base.php');
require_once(' traitement/profil_update.php');
include('authentification.php');

$updateprofil = new UpdateProfil();
$update = $updateprofil->update_profile();

?>

<!DOCTYPE html>
<html>

<body>
    <div class="wrapper" style="position:fixed">
        <div class="container">
            <h1>Modifier mes infos</h1>

            <form class="form" method="post" action=" profil.php" autocomplete="off">

                <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">

                <input type="text" name="nom" placeholder="First Name" value="<?php echo $nom; ?>">

                <input type="text" name="prenom" placeholder="Last Name" value="<?php echo $prenom; ?>">

                <input type="date" name="birthday" placeholder="Birth Date" value="<?php echo $birthday; ?>">

                <input type="tel" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" name="num_tel" placeholder="Phone Number" value="<?php echo $num_tel; ?>">

                <input type="text" name="adresse" placeholder="Adress" value="<?php echo $adresse; ?>">

                <input type="text" name="pays" placeholder="Country" value="<?php echo $pays; ?>">

                <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">

                <input type="password" name="password_1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password">

                <input type="password" name="password_2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Confirmed Password">

                <button type="submit" id="login-button" name="modif_profil" onclick="update()">Modifier</button>

            </form>
        </div>
    </div>

</body>