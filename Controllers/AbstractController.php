<?php
namespace Controllers;

use Http\Request;
use lib\Tools\Functions;
use lib\Session;

abstract class AbstractController
{
    /**
     * @var Model\AbstractModel
     */
    protected $model;

    /**
     * @var Http\Request
     */
    protected $request;

    /**
     * @var string
     */
    const MODEL_PATH = "Models\\%sModel";

    /**
     * @var lib\Session
     */
    public static $session;

    public function __construct($model = true)
    {
        if (!is_null($model) && is_null($this->model)) {
            $this->model = $this->initModel();
        }

        $this->request = new Request();
    }

    /**
     * @return Model\AbstractModel
     */
    private function initModel()
    {
        $model = sprintf(
            self::MODEL_PATH,
            str_replace(["Controllers\\", "Controller"],'',Functions::get_class($this))
        );
        
        return new $model();
    }

    /**
     * @return void
     */
    public function preDispatch(){}

    /**
     * @return lib\DB\DAO
     */
    public static function getSessionInstance()
    {
        if (is_null(static::$session)) {
            static::$session = new Session();
        }

        return static::$session; 
    }
    /**
     * @param string $targetUri
     * 
     * @return void
     */
    public function redirect($targetUri)
    {
        Functions::redirect($targetUri);
    }

    /**
     * @return void
     */
    public function postDispatch()
    {}
}