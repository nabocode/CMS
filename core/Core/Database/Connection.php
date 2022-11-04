<?php

namespace Core\Core\Database;
use \PDO;

class Connection
{
    private $link;

    /**
     * Connection constructor.
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * @return $this
     */
    private function connect() {
        $config = [
            'host'     => '192.168.0.103',
            'db_name'  => 'cms',
            'username' => 'root',
            'password' => 'qwerty',
        ];
        $dsn = 'mysql:host=' . $config['host'] . ';dbname='. $config['db_name'];
        $this->link = new PDO($dsn, $config['username'], $config['password']);

        return $this;
    }

    /**
     * @param $sql
     * @return $this
     */
    public function execute($sql)
    {
        $sth = $this->link->prepare($sql);

        return $this;
    }

    /**
     * @param $sql
     * @return array
     */
    public function query($sql)
    {
        $sth = $this->link->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        if ($result === false) {
            return [];
        }

        return $result;
    }

}