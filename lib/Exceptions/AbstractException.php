<?php
namespace lib\Exceptions;

use Http\Response;
use lib\Session;

/**
 * Class générant les Exceptions Métier
 */
abstract class AbstractException extends \Exception 
{
    /**
     * @var string
     */
    protected $msg;

    public function __construct()
    {
        Response::setErrorMessage($this->msg);
    }
}