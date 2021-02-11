<?php
namespace lib\Exceptions;

class AuthenticationFailedException extends AbstractException
{
    /**
     * @inherit
     */
    protected $msg = "LOGIN OU MOT DE PASSE INCORRECT";
}