<?php
namespace Controllers;

use Http\Response;

class HomeController extends AbstractController
{
    public function __construct($model = true)
    {
        if (is_null(static::getSessionInstance()) || !static::getSessionInstance()->isAuthenticate()){
            $this->redirect('/');
        }

        $this->model = null;  // to replace with model a use in dashboard app
        parent::{__FUNCTION__}(null);
    }

    public function dashboardAction()
    {
        $response  = new Response('dashboard',[]);
        $response->render();
    }
}