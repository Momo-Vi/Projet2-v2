<?php
session_start();
require_once('../modeles/reply_comment.php');

$ReplyComment = new ReplyComment;
$content = $_POST['reply_comment'];
$id_user = $_SESSION['id'];
$id_comment = $_POST['id_comment'];
$id_jeu = $_POST['id_jeu'];

$ReplyComment->addReplyComment($content, $id_user, $id_comment);
header('Location: ../description_jeu.php?jeu=' . $id_jeu);
