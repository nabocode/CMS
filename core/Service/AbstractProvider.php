<?php

namespace Core\Service;

abstract class AbstractProvider
{
    protected $dependencyInjection;

    /**
     * AbstractProvider constructor.
     * @param \Core\DependencyInjection\DependencyInjection $dependencyInjection
     */
    public function __construct(\Core\DependencyInjection\DependencyInjection $dependencyInjection)
    {
        $this->dependencyInjection = $dependencyInjection;
    }

    /**
     * @return mixed
     */
    abstract function init();
}