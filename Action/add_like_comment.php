<?php
session_start();
require_once('../modeles/like_dislike_comment.php');

$Like = new LikeDislike;

$type = 'like';
$newtype = 'dislike';

$id_comm = $_GET['id'];
$id_jeu = $_GET['jeu'];
$username = $_GET['username'];


$like = $Like->getLike($id_comm);
foreach ($like as $likeer) {
    if ($likeer['username'] == $_SESSION['username']) {
        $id_comm2 = $likeer['id_comm'];
        $alreadylike = true;
    }
}
if ($alreadylike == true && $id_comm2 == $id_comm) {
    $Like->replacelike_dislike($id_comm, $usename, $newtype);
} else {
    $Like->addLikeDislike($id_comm, $username, $type);
}

header('Location: ../description_jeu.php?jeu=' . $id_jeu);
