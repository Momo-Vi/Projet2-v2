<?php

require_once('modele.php');

class ReplyTopicComment extends Modele
{

    public function getReplyTopicCommentsFromIDComm($id_topic_comment)
    {
        $sql = "SELECT * 
                FROM reply_topic_comment C 
                JOIN user U ON C.id_user = U.id
                WHERE id_topic_comment = $id_topic_comment
                ORDER BY date_create DESC";
        return mysqli_query($this->getBdd(), $sql)->fetch_all(MYSQLI_ASSOC);
    }
    public function addReplyTopicComment($content, $id_user, $id_topic_comment)
    {
        $content = $this->getBdd()->real_escape_string($content);

        $sql = "INSERT INTO reply_topic_comment (contenu, id_user, id_topic_comment) VALUES('$content', '$id_user', '$id_topic_comment')";
        mysqli_query($this->getBdd(), $sql);
    }

    public function getReplyTopicComment()
    {
        $sql = "SELECT * FROM reply_topic_comment";
        return mysqli_query($this->getBdd(), $sql)->fetch_all(MYSQLI_ASSOC);
    }
}
