<?php
namespace lib\Routes;

use Controllers\IndexController;
use lib\Exceptions\FileNotFoundException;
use lib\Session;
use lib\Tools\Functions;

/**
 * Class gerant les routes
 */
class Route 
{
    /**
     * @var string
     */
    private $uri;

    /**
     * @var string
     */
    const CONTROLLER_PATH = "Controllers\\%sController";

    /**
     * @var string
     */
    const ACTION_PATH = "%sAction";

    /**
     * @var AbstractController
     */
    private $controllerInstance;

    /**
     * @var string
     */
    private $actionName = "Index";

    public function __construct($params)
    {
        $this->uri = !empty($params) ? $params['path'] : null;
        $this->init();
    }

    /**
     * @return void
     */
    private function init()
    {
        $name = IndexController::class;
        $this->controllerInstance = new $name(null);
        $this->actionName = sprintf(self::ACTION_PATH,$this->actionName);
    }

    /**
     * @return void
     */
    public function router()
    {
        try {
            if(!is_null($this->uri)){
                $uriData = explode("/",$this->uri);
                $controllerName = sprintf(self::CONTROLLER_PATH, ucfirst($uriData[0]));
                if(count($uriData) > 0 && !Functions::class_exists($controllerName)) {
                   throw new FileNotFoundException(); 
                }
                $this->controllerInstance = $uriData[0] != "index" 
                    ? new $controllerName() : $this->controllerInstance; 
                $this->actionName = sprintf(self::ACTION_PATH,$uriData[1]);
            }
            $this->execute();
           
        }catch(FileNotFoundException $e){
            Functions::redirect('/index/notfound');
        }
    }

    /**
     * @return void
     */
    private function execute()
    {
        $this->controllerInstance->preDispatch();
        $this->controllerInstance->{$this->actionName}();
        $this->controllerInstance->postDispatch();
    }
}