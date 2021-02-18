<?php
session_start();
require_once('../modeles/like_dislike_comment.php');

$Dislike = new LikeDislike;

$type = 'dislike';
$newtype = 'like';

$id_comm = $_GET['id'];
$id_jeu = $_GET['jeu'];
$username = $_GET['username'];


$dislike = $Dislike->getDislike($id_comm);
foreach ($dislike as $dislikeer) {
    if ($dislikeer['username'] == $_SESSION['username']) {
        $id_comm2 = $dislikeer['id_comm'];
        $alreadydislike = true;
    }
}

if ($alreadydislike == true && $id_comm2 == $id_comm) {
    $Dislike->replacelike_dislike($id_comm, $username, $type);
} else {
    $Dislike->addLikeDislike($id_comm, $username, $type);
}

header('Location: ../description_jeu.php?jeu=' . $id_jeu);
