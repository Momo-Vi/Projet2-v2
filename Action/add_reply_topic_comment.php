<?php
session_start();
require_once('../modeles/reply_topic_comment.php');

$ReplyTopicComment = new ReplyTopicComment;
$content = $_POST['reply_topic_comment'];
$id_user = $_SESSION['id'];
$id_topic_comment = $_POST['id_comment'];
$id_topic = $_POST['id_topic'];

$ReplyTopicComment->addReplyTopicComment($content, $id_user, $id_topic_comment);
header('Location: ../topic_jeu.php?topic=' . $id_topic);
