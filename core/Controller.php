<?php

namespace Core;

use \Core\DependencyInjection\DependencyInjection;

abstract class Controller
{
    /**
     * @var DependencyInjection
     */
    protected $dependencyInjection;
    protected $db;

    /**
     * Controller constructor.
     * @param DependencyInjection $dependencyInjection
     */
    public function __construct(DependencyInjection $dependencyInjection)
    {
        $this->dependencyInjection = $dependencyInjection;
    }
}