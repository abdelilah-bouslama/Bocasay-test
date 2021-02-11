<?php
namespace Entities;

abstract class AbstractEntity
{
    /**
     * @param string $name
     * @return string
     */
    public function __get($name) 
    {
        return $this->$name;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value) 
    {
        $this->$name = $value;
    }
}