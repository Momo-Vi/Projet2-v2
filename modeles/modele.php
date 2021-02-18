<?php

abstract class Modele
{

    protected function getBdd()
    {
        // connect to database
        $mysqli = mysqli_connect('localhost:3306', 'root', '', 'bdd_jeux_slam');
        $mysqli->set_charset("utf8");
        return $mysqli;
    }
}
