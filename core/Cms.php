<?php

namespace Core;

use Core\Core\Router\DispatcherRouter;
use Core\Helper\Common;

class Cms
{
    private $dependencyInjection;
    public $router;

    /**
     * Cms constructor.
     * @param $dependencyInjection
     */
    public function __construct($dependencyInjection)
    {
        $this->dependencyInjection = $dependencyInjection;
        $this->router = $this->dependencyInjection->get('router');
    }

    /**
     * Run Cms
     */
    public function run()
    {
        try {
            $this->router->add('home', '/', 'HomeController:index');
            $this->router->add('news', '/news', 'HomeController:news');
            $this->router->add('news_single', '/news/(id:int)', 'HomeController:news');

            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());

            if ($routerDispatch == null) {
                $routerDispatch = new DispatcherRouter('ErrorController:page404');
            }

            list($class, $action) = explode(':', $routerDispatch->getController(), 2);

            $controller = '\\Cms\\Controller\\' . $class;
            $parameters = $routerDispatch->getParameters();

            call_user_func_array([new $controller($this->dependencyInjection), $action], $parameters);

        } catch(\Exception $e) {
            echo $e->getMessage();
            exit;
        }
        //print_r($this->dependencyInjection);
        //print_r($routerDispatch);
    }
}