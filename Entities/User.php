<?php
namespace Entities;

class User extends AbstractEntity
{
    /**
     * @var int
     */
    protected $id_user;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $last_login;
}