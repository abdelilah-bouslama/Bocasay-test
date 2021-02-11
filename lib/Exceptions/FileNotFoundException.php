<?php
namespace lib\Exceptions;

class FileNotFoundException extends AbstractException
{
    /**
     * @inherit
     */
    protected $msg = "URL Demandé n'existe pas";
}