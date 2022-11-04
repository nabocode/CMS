<?php

namespace Core\DependencyInjection;

class DependencyInjection
{
    private $container = [];

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value)
    {
        $this->container[$key] = $value;

        return $this;
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function get($key)
    {
        return $this->has($key);
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function has($key)
    {
        return isset($this->container[$key]) ? $this->container[$key] : null;
    }
}