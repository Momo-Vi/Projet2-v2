<?php
require_once('modele.php');
class TopicLikeDislike extends Modele
{

    public function getTopicLike($id_topic_comment)
    {
        $sql = "SELECT * 
                FROM like_dislike_topic_comment 
                WHERE id_topic = $id_topic_comment
                AND type = 'like' ";
        return mysqli_query($this->getBdd(), $sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getTopicDislike($id_topic_comment)
    {
        $sql = "SELECT * 
                FROM like_dislike_topic_comment
                WHERE id_topic = $id_topic_comment 
                AND type = 'dislike' ";
        return mysqli_query($this->getBdd(), $sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function addTopicLikeDislike($id_topic_comment, $username, $type)
    {
        $sql = "INSERT INTO like_dislike_topic_comment (id_topic, username, type) 
        VALUES('$id_topic_comment', '$username', '$type')";

        mysqli_query($this->getBdd(), $sql);
    }

    public function replace_topic_like_dislike($id_comm, $username, $newtype)
    {
        $sql = "UPDATE like_dislike_comment 
                SET type = $newtype 
                WHERE id_comm = $id_comm
                AND username = $username";

        mysqli_query($this->getBdd(), $sql);
    }
}
