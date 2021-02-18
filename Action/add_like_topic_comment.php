<?php
session_start();
require_once('../modeles/like_dislike_topic_comment.php');

$Like = new TopicLikeDislike;

$type = 'like';
$newtype = 'dislike';

$id_topic_comment = $_GET['id_topic_comment'];
$id_topic = $_GET['topic'];
$username = $_GET['username'];

$topiclike = $Like->getTopicLike($id_topic_comment);

foreach ($topiclike as $topiclikeer) {
    if ($topiclikeer['username'] == $_SESSION['username']) {
        $id_topic_comm2 = $topiclikeer['id_topic'];
        $alreadylike = true;
    }
}
if ($alreadylike == true && $id_comm2 == $id_comm) {
    $Like->replace_topic_like_dislike($id_comm, $usename, $newtype);
} else {
    $Like->addTopicLikeDislike($id_topic_comment, $username, $type);
}


header('Location: ../topic_jeu.php?topic=' . $id_topic);
