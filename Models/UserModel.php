<?php
namespace Models;

use Entities\User;
use lib\Exceptions\AuthenticationFailedException;

class UserModel extends AbstractModel
{
    public function __construct()
    {
        parent::{__FUNCTION__}();
    }

    /**
     * @param string $username
     * @param string $password
     * @param string $groupId
     * @throws lib\Exceptions\AuthenticationFailedException
     * 
     * @return Entities\User
     */
    public function authenticate($username, $password, $groupId)
    {
        $stmt = self::$dao->prepare(
            sprintf(
                "CALL find_user('%s','%s',%d)",
                $username,
                $password,
                $groupId
            )
        );
        $stmt->execute();
        $this->entity = $stmt->fetchObject(User::class);
        $stmt->closeCursor();
        if (!$this->entity instanceof User){
            throw new AuthenticationFailedException();
        }
        $this->updateDB();

        return $this->entity;
    }

    /**
     * @param Entities\User $user
     * @return void
    */
    private function updateDB()
    {
        try {
            $currentDate = new \DateTime('now');
            $stmt = self::$dao->prepare(
                "UPDATE user SET last_login =  now() WHERE id_user = :id_user"
            );
            $stmt->execute(['id_user' => $this->entity->id_user]);
            $stmt->closeCursor();
        } catch(\Exception $e) {
            //redirect to error page with sql message
        }
    }
}