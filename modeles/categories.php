<?php

require_once('modele.php');

class Categories extends Modele
{

    public function recupererCategories()
    {
        $sql = "SELECT * FROM categories";
        return mysqli_query($this->getBdd(), $sql)->fetch_all(MYSQLI_ASSOC);
    }


    public function recupererJeuxParCategorie($id_cat)
    {
        $sql = "SELECT *
                FROM jeux J
                JOIN categoriser C
                ON C.id_jeux = J.id 
                AND C.id_categories = $id_cat";
        return mysqli_query($this->getBdd(), $sql);
    }

    public function recupererCategorie($id_produit)
    {
        $sql = "SELECT *
            FROM categories P
            JOIN categoriser C
            ON C.id_categories = P.id 
            AND C.id_jeux = $id_produit";
        return mysqli_query($this->getBdd(), $sql)->fetch_all(MYSQLI_ASSOC);
    }
}
