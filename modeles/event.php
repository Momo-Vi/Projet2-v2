<?php
require_once('modele.php');

class Events extends Modele
{
    public function recupererEvent()
    {
        $sql = "SELECT * FROM event ORDER BY date ASC";
        return mysqli_query($this->getBdd(), $sql)->fetch_all(MYSQLI_ASSOC);
    }
}
