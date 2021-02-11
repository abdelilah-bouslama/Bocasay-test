<?php
namespace Http;

use lib\Session;
use lib\Tools\FileTool;
use lib\Tools\Functions;

class Response
{
    /**
     * @const string
     */
    const DEFAULT_ERROR_KEY = '$error';

    /**
     * @var string
     */
    protected $content;

    /**
     * @param array $params
     */
    protected $params;

    /**
     * @param string $viewFileName
     */
    public function __construct($viewFileName,$params)
    {
        $this->content = FileTool::getFileContent(
                Functions::getConstant('baseDir'). '/../views/'. $viewFileName.'.php'
        );

        $this->params = array_merge($params,[self::DEFAULT_ERROR_KEY => '']);     
    }

    /**
     * @param string $msg
     * 
     * @return void
     */
    public static function setErrorMessage($msg)
    {
        Session::getInstance()->add(self::DEFAULT_ERROR_KEY,$msg);
    }

    /**
     * @return void
     */
    public function render()
    { 
        if (Session::getInstance()->check(self::DEFAULT_ERROR_KEY)){
            $this->params[self::DEFAULT_ERROR_KEY] = Session::getInstance()->get('$error');
        }
       echo str_replace(array_keys($this->params), array_values($this->params), $this->content);
    }
}