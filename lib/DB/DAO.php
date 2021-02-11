<?php
namespace lib\DB;

use lib\Exceptions\DAOException;
use lib\Tools\ConfigLoaderTrait;
use Throwable;

/**
 * Class gerant les manipulation vers la BDD
 */
class DAO extends \PDO
{
    use ConfigLoaderTrait;

    /**
     * @param string $connection
     * @param string $user
     * @param string $password
     */
    public function __construct()
    {
        try {
            list($host, $databseName, $user, $password) =  $this->getConfig();
            parent::{__FUNCTION__}('mysql:host='.$host.';dbname='.$databseName.';', $user, $password);
        } catch(Throwable $e){
            throw new DAOException();
        }
    }
}