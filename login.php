<?php
session_start();
include('Action/authentification.php');
require_once('traitement/login_bdd.php');

$log = new LoginBdd;
$login = $log->login();

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="css/style_log_reg.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
	<div class="wrapper" style="position:fixed">
		<div class="conteiner">
			<h1>Se connecter</h1>

			<form class="form2" method="post" action=" login.php" autocomplete="off">

				<input type="text" name="username" placeholder="Identifiant" value="<?php echo $username; ?>" required>

				<input type="password" name="password" placeholder="Mot de passe">

				<button style="width:70%; margin-left:0px;" type="submit" id="login-button" name="login_user" onclick="login()">Me connecter</button>

				<a href=" register.php" class="login">
					<h4> Vous etes nouveau ? S'inscrire </h4>
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