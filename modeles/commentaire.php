<?php

require_once('modele.php');

class Commentaire extends Modele
{
    public function getCommentsFromIDJeux($id_jeu)
    {
        $sql = "SELECT * 
                FROM commentaires C 
                JOIN user U ON C.id_user = U.id
                WHERE id_jeu = $id_jeu
                ORDER BY date_create DESC";
        return mysqli_query($this->getBdd(), $sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function addComment($content, $id_user, $id_jeu)
    {

        $content = $this->getBdd()->real_escape_string($content);

        $sql = "INSERT INTO commentaires (contenu, id_user, id_jeu) VALUES('$content', '$id_user', '$id_jeu')";
        mysqli_query($this->getBdd(), $sql);
    }
}
