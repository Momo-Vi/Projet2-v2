<?php

require_once('modele.php');

class User extends Modele
{

    public function getUserByID($id_user)
    {
        return mysqli_query($this->getBdd(), "SELECT * FROM user WHERE id = $id_user")->fetch_object();
    }

    public function getUserIDFromComment($id_comment)
    {
        return mysqli_query($this->getBdd(), "SELECT id_user FROM commentaires WHERE id = $id_comment")->fetch_object()->id_user;
    }
}
