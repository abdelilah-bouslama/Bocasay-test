<?php
namespace Controllers;

use Http\Response;
use lib\Session;

class IndexController extends AbstractController
{
    /**
     * @var array
     */
    const DEFAULT_VIEW_PARAMS = ['$title' => 'Test Antadis'];

    /**
     * @inherit
     */
    public function preDispatch()
    {
        if (!is_null(static::getSessionInstance()) && static::getSessionInstance()->isAuthenticate()){
            $this->redirect('/home/dashboard');
        }
    }

    /**
     * @return void
     */
    public function indexAction()
    {
        $response  = new Response('index',self::DEFAULT_VIEW_PARAMS);
        $response->render();
    }

    /**
     * @return void
     */
    public function notfoundAction()
    {
        $response  = new Response('404',self::DEFAULT_VIEW_PARAMS);
        $response->render();
    }
}