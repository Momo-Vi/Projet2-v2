<?php

require_once('modele.php');

class ReplyComment extends Modele
{

    public function getReplyCommentsFromIDComm($id_comment)
    {
        $sql = "SELECT * 
                FROM reply_comment C 
                JOIN user U ON C.id_user = U.id
                WHERE id_comment = $id_comment
                ORDER BY date_create DESC";
        return mysqli_query($this->getBdd(), $sql)->fetch_all(MYSQLI_ASSOC);
    }
    public function addReplyComment($content, $id_user, $id_comment)
    {

        $content = $this->getBdd()->real_escape_string($content);

        $sql = "INSERT INTO reply_comment (contenu, id_user, id_comment) VALUES('$content', '$id_user', '$id_comment')";
        mysqli_query($this->getBdd(), $sql);
    }

    public function getReplyComment()
    {
        $sql = "SELECT * FROM reply_comment";
        return mysqli_query($this->getBdd(), $sql)->fetch_all(MYSQLI_ASSOC);
    }
}
