<?php
session_start();
require_once('../modeles/topic.php');
require_once('../modeles/topic_comment.php');

$Topic = new Topic();

$name_jeu = $_POST['name_jeu'];
$titre = $_POST['titre'];
$contenu = $_POST['contenu'];
$username = $_GET['username'];
$Topic->addTopic($name_jeu, $titre, $contenu, $username);
header('Location: ../forum.php');
