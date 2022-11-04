<?php

namespace Core\Service\Router;

use Core\Service\AbstractProvider;
use Core\Core\Router\Router;

class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public $serviceName = 'router';

    /**
     * @return mixed|void
     */
    public function init()
    {
        $router = new Router('http://localhost:8000/');
        $this->dependencyInjection->set($this->serviceName, $router);
    }
}