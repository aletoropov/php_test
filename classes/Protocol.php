<?php
namespace  classes;

use classes\Database;

class Protocol
{
    /**
     * @var \classes\Database
     */
    public Database $db;

    /**
     * Создаем соединение с базой данных
     */
    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * @return array|false
     */
    public function getAll()
    {
        $select = "SELECT * FROM protocol_table";
        return $this->db->fetchAll($select, __METHOD__);
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
        $errors = array();

        if ($this->checkProtocolNumber($number)) {
            $errors[] = $number . ' - такой номер протокола уже есть в базе';
        } else {
            $insert = "INSERT INTO protocol_table (number, date, person, sign) 
                   VALUES (?, ?, ?, ?)";

            $stmt = $this->db->pdo->prepare($insert);

            if ($stmt->execute([$number, $date, $person, $sign])) {
                 return $this->db->pdo->lastInsertId();
             } else {
                 $errors[] = $this->db->pdo->errorInfo()[2];
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
        $select = "SELECT number FROM protocol_table WHERE `number` = :number";
        return $this->db->fetchOne($select, __METHOD__, [':number' => $number]);
    }
}