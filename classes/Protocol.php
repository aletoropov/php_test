<?php
namespace  classes;

use classes\Database;

class Protocol
{
    public int $number;
    public string $date;
    public string $person;
    public string $sing;

    public function getAll()
    {
        $db = Database::getInstance();

        $select = "SELECT * FROM protocols";
        return $db->fetchAll($select, __METHOD__);
    }

    public function addProtocol()
    {

    }
}