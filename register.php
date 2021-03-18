<?php
session_start();
include('Action/authentification.php');
require_once('traitement/register_bdd.php');

$register = new RegisterBdd();
$reg = $register->register();

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Inscription</title>
	<link rel="icon" href="images/icon.png" />
	<link rel="stylesheet" type="text/css" href="css/style_log_reg.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
	<div class="wrapper" style="position:fixed">
		<div class="container">
			<h1>Creation du compte</h1>

			<form class="form" method="post" action=" register.php" autocomplete="off">

				<input type="text" name="username" placeholder="Identifiant*" value="<?php echo $username; ?>" required>

				<input type="text" name="nom" placeholder="Nom" value="<?php echo $nom; ?>">

				<input type="text" name="prenom" placeholder="Prénom" value="<?php echo $prenom; ?>">

				<input type="date" name="birthday" placeholder="Date de Naissance" value="<?php echo $birthday; ?>" required>

				<input type="tel" pattern="^(?:0|\(?\+33\)?\s?)[1-9](?:[\.\-\s]?\d\d){4}$" name="num_tel" placeholder="Tel (06 ou +33)" value="<?php echo $num_tel; ?>">

				<input type="text" name="adresse" placeholder="Adresse" value="<?php echo $adresse; ?>">

				<input type="text" name="pays" placeholder="Pays" value="<?php echo $pays; ?>">

				<input type="email" name="email" placeholder="Email*" value="<?php echo $email; ?>" required>

				<input type="password" name="password_1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Mot de passe*" required data-toggle="tooltip" data-placement="top" title=" 1 Majuscule / 1 Minuscule / 8 Caractères requis">

				<input type="password" name="password_2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Confirmer Mot de passe*" required data-toggle="tooltip" data-placement="top" title="Ressaisir votre mot de passe ">

				<p style="font-size : 15px; margin-top: 5px;">* : champ obligatoire</p>
				<button type="submit" id="login-button" name="reg_user" onclick="reg()">Creer mon compte</button>

				<a href=" login.php" class="login">
					<h4> Deja inscrit ? Se connecter </h4>
				</a>
			</form>
		</div>
	</div>

</body>
<?php include_once('js/script_reg_log.php'); ?>

</html>