<?php
namespace lib\Exceptions;

class DAOException extends \PDOException
{
    /**
     * @inherit
     */
    protected $msg  = 'Erreur accés à la base de données';
}