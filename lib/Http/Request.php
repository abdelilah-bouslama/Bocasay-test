<?php
namespace Http;

class Request 
{
    /**
     * @var string
     */
    protected $method;

    /**
     * @var array
     */
    protected $params;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->prepareRequstParams();
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getParams($paramName)
    {
        if (empty($this->params[$paramName])) {
            //throw exception param not exist
        }
        
        return $this->params[$paramName];
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return void
     */
    public function prepareRequstParams()
    {
        switch ($this->method) {
            case 'POST':
                $this->params = $_POST;  
                break;
            case 'GET':
                $this->params = $_GET;  
                break;
            default:
              //exception not found 
              break;
          }
    }
}