<?php
namespace  classes;

use classes\Database;

class Protocol
{
    /**
     * @return array|false
     */
    public function getAll()
    {
        $db = new Database();

        $select = "SELECT * FROM protocol_table";
        return $db->fetchAll($select, __METHOD__);
    }

    /**
     * @param int $number
     * @param string $date
     * @param string $person
     * @param string $sign
     * @return array|false|string
     */
    public function addProtocol(int $number, string $date, string $person, string $sign)
    {
        $db = new Database();

        $errors = array();

        if ($this->checkProtocolNumber($number)) {
            $errors[] = $number . ' - такой номер протокола уже есть в базе';
        } else {
            $insert = "INSERT INTO protocol_table (number, date, person, sign) 
                   VALUES (?, ?, ?, ?)";

            $stmt = $db->pdo->prepare($insert);

            if ($stmt->execute([$number, $date, $person, $sign])) {
                 return $db->pdo->lastInsertId();
             } else {
                 $errors[] = $db->pdo->errorInfo()[2];
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
        $db = new Database();

        $select = "SELECT number FROM protocol_table WHERE `number` = :number";
        return $db->fetchOne($select, __METHOD__, [':number' => $number]);
    }
}