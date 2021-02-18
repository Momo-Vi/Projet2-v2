<?php
require_once('modele.php');
class LikeDislike extends Modele
{

    public function getLike($id_comm)
    {
        $sql = "SELECT * 
                FROM like_dislike_comment 
                WHERE id_comm = $id_comm 
                AND type = 'like' ";

        return mysqli_query($this->getBdd(), $sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getDislike($id_comm)
    {
        $sql = "SELECT * 
                FROM like_dislike_comment
                WHERE id_comm = $id_comm 
                AND type = 'dislike' ";

        return mysqli_query($this->getBdd(), $sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function addLikeDislike($id_comm, $username, $type)
    {
        $sql = "INSERT INTO like_dislike_comment (id_comm, username, type) 
                VALUES('$id_comm', '$username', '$type')";

        mysqli_query($this->getBdd(), $sql);
    }

    public function replacelike_dislike($id_comm, $username, $newtype)
    {
        $sql = "UPDATE like_dislike_comment 
                SET type = $newtype 
                WHERE id_comm = $id_comm
                AND username = $username";

        mysqli_query($this->getBdd(), $sql);
    }
}
