<?php
require_once('modele.php');
class Topic extends Modele
{
    public function getTopic()
    {
        $sql = "SELECT * 
                FROM topic";
        return mysqli_query($this->getBdd(), $sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getTopicFromName_Jeu($name_jeu)
    {
        $sql = "SELECT * 
                FROM topic
                WHERE name_jeu = $name_jeu";
        return mysqli_query($this->getBdd(), $sql);
    }


    public function addTopic($name_jeu, $titre, $contenu, $username)
    {

        $titre = $this->getBdd()->real_escape_string($titre);
        $contenu = $this->getBdd()->real_escape_string($contenu);

        $sql = "INSERT INTO topic (name_jeu, titre, contenu, auteur_name) 
        VALUES('$name_jeu', '$titre','$contenu', '$username')";

        mysqli_query($this->getBdd(), $sql);
    }
}
