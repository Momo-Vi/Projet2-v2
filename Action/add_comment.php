<?php
session_start();
require_once('../modeles/commentaire.php');

$Commentaire = new Commentaire;
$new_commentaire = $_POST['comment'];

$id_user = $_SESSION['id'];
$id_jeu = $_POST['id_jeu'];

$Commentaire->addComment($new_commentaire, $id_user, $id_jeu);
header('Location: ../description_jeu.php?jeu=' . $id_jeu);
