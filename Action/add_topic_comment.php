<?php
session_start();
require_once('../modeles/topic_comment.php');

$TopicComment = new TopicComment;
$new_topic_comment = $_POST['comment'];
$id_user = $_SESSION['id'];
$id_topic = $_POST['id_topic'];

$TopicComment->addTopicComment($new_topic_comment, $id_user, $id_topic);
header('Location: ../topic_jeu.php?topic=' . $id_topic);
