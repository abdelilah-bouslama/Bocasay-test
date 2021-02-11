<?php
namespace Controllers;

use lib\Exceptions\AuthenticationFailedException;

class UserController extends AbstractController
{
    /**
     * @const string
     */
    const DEFAULT_SESSION_KEY = 'session_id';

    /**
     * @const int
     */
    const GROUP_ID = 2;

    /**
     * @return void
     */
    public function loginAction()
    {
        try {
            $this->model->authenticate($this->request->getParams('username'),$this->request->getParams('password'),self::GROUP_ID);
        } catch(AuthenticationFailedException $e) {
            $this->redirect('/');
        }
    }

    /**
     * @return void
     */
    public function logoutAction()
    {
        static::getSessionInstance()->destroy();
        $this->redirect('/');
    }

    /**
     * @return void
     */
    public function postDispatch()
    {
        if (static::getSessionInstance()->isActive() && !is_null($this->model->getEntity())) {
            $this->updateSession();
            $this->redirect('/home/dashboard');
        }
    }

    /**
     * @return void
     */
    private function updateSession()
    {
        $this->session = static::getSessionInstance();
        $this->session->add(self::DEFAULT_SESSION_KEY,$this->model->getEntity()->id_user);
    }
}
