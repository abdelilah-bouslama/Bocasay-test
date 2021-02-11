<?php
namespace lib;

class Session 
{
    /**
     * @const string
     */
    const DEFAULT_SESSION_KEY = 'session_id';
    
    /**
     * @var lib\Session
     */
    public static $instance;

    /**
     * @return lib\Session
     */
    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new self();
        }

        return static::$instance;
    }

    /**
     * @param string $key
     * @param mixed $value
     * 
     * @return void
     */
    public function add($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param string $name
     * 
     * @return void
     */
    public function remove($name)
    {
        unset($_SESSION[$name]);
    }

    /**
     * @return boolean
     */
    public function isAuthenticate()
    {
        return $this->check(self::DEFAULT_SESSION_KEY);
    }

    /**
     * @param string $name
     * 
     * @return boolean
     */
    public function check($name)
    {
        return isset($_SESSION[$name]);
    }

    /**
     * @return mixed
     */
    public function get($name)
    {
        return $_SESSION[$name];
    }

    /**
     * @return void
     */
    public function destroy()
    {
        session_destroy();
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return session_status() == PHP_SESSION_ACTIVE;
    }
}