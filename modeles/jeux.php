<?php
require_once('modele.php');

class Jeux extends Modele
{

    public function getJeux()
    {
        $sql = "SELECT * FROM jeux";
        return mysqli_query($this->getBdd(), $sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getJeuFromID($id_jeu)
    {
        $sql = "SELECT * FROM jeux WHERE id = $id_jeu";
        return mysqli_query($this->getBdd(), $sql)->fetch_object();
    }

    public function getJeuFromChoice($choix_jeu)
    {
        $sql = "SELECT * FROM jeux WHERE id = $choix_jeu";
        return mysqli_query($this->getBdd(), $sql);
    }
}
