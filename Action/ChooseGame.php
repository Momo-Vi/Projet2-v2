<?php
session_start();

$choix = $_POST['choice_game'];

header('Location: ../description_jeu.php?jeu=' . $choix);
