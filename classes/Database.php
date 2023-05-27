<?php
/**
 * @author Торопов Александр <toropovsite@yandex.ru>
 *
 * Клас для работы с базой данных на основе PDO
 */

namespace classes;

class Database
{

    public \PDO $pdo;
    private array $log = [];

    public function __construct()
    {
        $host = DB_HOST;
        $dbName = DB_NAME;
        $dbUser = DB_USER;
        $dbPassword = DB_PASSWORD;


        $this->pdo = new \PDO(
            "mysql:host=$host;dbname=$dbName",
            $dbUser,
            $dbPassword,
            [
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
            ]
        );

        return $this->pdo;
    }

    /**
     * @param string $query
     * @param $_method
     * @param array $params
     * @return array|false
     */
    public function fetchAll(string $query, $_method, array $params = [])
    {
        $time = microtime(true);
        $prepared = $this->pdo->prepare($query);

        $ret = $prepared->execute($params);

        if (!$ret) {
            $errorInfo = $prepared->errorInfo();
            trigger_error("{$errorInfo[0]}#{$errorInfo[1]}: " . $errorInfo[2]);
            return [];
        }

        $data = $prepared->fetchAll(\PDO::FETCH_ASSOC);
        $affectedRows = $prepared->rowCount();
        $this->log[] = [$query, microtime(true) - $time, $_method, $affectedRows];

        return $data;
    }

    /**
     * @param string $query
     * @param $_method
     * @param array $params
     * @return array|false|mixed
     */
    public function fetchOne(string $query, $_method, array $params = [])
    {
        $t = microtime(true);
        $prepared = $this->pdo->prepare($query);

        $ret = $prepared->execute($params);

        if (!$ret) {
            $errorInfo = $prepared->errorInfo();
            trigger_error("{$errorInfo[0]}#{$errorInfo[1]}: " . $errorInfo[2]);
            return [];
        }

        $data = $prepared->fetchAll(\PDO::FETCH_ASSOC);
        $affectedRows = $prepared->rowCount();


        $this->log[] = [$query, microtime(true) - $t, $_method, $affectedRows];
        if (!$data) {
            return false;
        }
        return reset($data);
    }

    /**
     * @param string $query
     * @param $_method
     * @param array $params
     * @return int
     */
    public function exec(string $query, $_method, array $params = []): int
    {
        $t = microtime(1);
        $prepared = $this->pdo->prepare($query);

        $ret = $prepared->execute($params);

        if (!$ret) {
            $errorInfo = $prepared->errorInfo();
            trigger_error("{$errorInfo[0]}#{$errorInfo[1]}: " . $errorInfo[2]);
            return -1;
        }
        $affectedRows = $prepared->rowCount();

        $this->log[] = [$query, microtime(1) - $t, $_method, $affectedRows];

        return $affectedRows;
    }
}