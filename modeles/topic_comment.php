<?php

require_once('modele.php');

class TopicComment extends Modele
{
    public function addTopicComment($content, $id_user, $id_topic)
    {

        $content = $this->getBdd()->real_escape_string($content);

        $sql = "INSERT INTO topic_comment (contenu, id_user, id_topic) VALUES('$content', '$id_user', '$id_topic')";
        mysqli_query($this->getBdd(), $sql);
    }

    public function getTopicComment($id_topic)
    {
        $sql = "SELECT * 
                FROM topic_comment C 
                JOIN user U ON C.id_user = U.id
                WHERE id_topic = $id_topic
                ORDER BY date_create DESC";
        return mysqli_query($this->getBdd(), $sql)->fetch_all(MYSQLI_ASSOC);
    }
}
