<?php
session_start();
require_once('../modeles/like_dislike_topic_comment.php');

$DisLike = new TopicLikeDislike;

$type = 'dislike';
$newtype = 'like';

$id_topic_comment = $_GET['id_topic_comment'];
$id_topic = $_GET['topic'];
$username = $_GET['username'];

$topicdislike = $DisLike->getTopicDislike($id_topic_comment);

foreach ($topicdislike as $topicdislikeer) {
    if ($topicdislikeer['username'] == $_SESSION['username']) {
        $id_topic_comm2 = $topicdislikeer['id_topic'];
        $alreadydislike = true;
    }
}
if ($alreadydislike == true && $id_comm2 == $id_comm) {
    $DisLike->replace_topic_like_dislike($id_topic_comment, $usename, $newtype);
} else {
    $DisLike->addTopicLikeDislike($id_topic_comment, $username, $type);
}

header('Location: ../topic_jeu.php?topic=' . $id_topic);
