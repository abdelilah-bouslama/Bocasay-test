<?php
namespace Models;

use lib\DB\DAO;
use PDOException;

abstract class AbstractModel
{
    /**
     * @var lib\DAO\DAO|null
     */
    public static $dao;

    /**
     * @var Entities\AbstractEntity
     */
    protected $entity;

    public function __construct()
    {
        static::getDaoInstance();
    }

    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @return lib\DB\DAO
     */
    public static function getDaoInstance()
    {
        try {
            if (is_null(static::$dao)) {
                static::$dao = new DAO();
                self::$dao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            }
    
            return static::$dao; 
        } catch(PDOException $e) {
            // save in MessageSplash
            // redirect to error page
        }
    }
}