<?php
namespace  classes;

use classes\Database;

class Protocol
{
    public function getAll()
    {
        $db = Database::getInstance();

        $select = "SELECT * FROM protocols";
        return $db->fetchAll($select, __METHOD__);
    }

    /**
     * @param int $number
     * @param string $date
     * @param string $person
     * @param string $sing
     * @return array|bool
     */
    public function addProtocol(int $number, string $date, string $person, string $sing)
    {
        $db = Database::getInstance();

        $errors = array();

        if ($this->checkProtocolNumber($number)) {
            $errors[] = 'Номер протокола уже есть';
        } else {
            $insert = "INSERT INTO protocols (`number`, `date`, `person`, `sing`) 
                       VALUES (:number, :person, :sing, :sing)";
             if ($db->exec($insert, __METHOD__, [
                ':number' => $number,
                ':date'   => $date,
                ':person' => $person,
                ':sing'   => $sing,
            ])) {
                 return true;
             } else {
                 $errors[] = $db->errorInfo()[2];
             }

        }

        return $errors;
    }

    /**
     * @param $number
     * @return array|false|mixed
     */
    private function checkProtocolNumber($number)
    {
        $db = Database::getInstance();

        $select = "SELECT number FROM protocols WHERE `number` = :number";
        return $db->fetchOne($select, __METHOD__, [':number' => $number]);
    }
}