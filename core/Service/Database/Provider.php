<?php

namespace Core\Service\Database;

use Core\Service\AbstractProvider;
use Core\Core\Database\Connection;

class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public $serviceName = 'db';

    /**
     * @return mixed|void
     */
    public function init()
    {
        $db = new Connection();
        $this->dependencyInjection->set($this->serviceName, $db);
    }
}