<?php
namespace lib\Exceptions;

class FileException extends AbstractException
{
    /**
     * @inherit
     */
    protected $msg  = 'Erreur de lecture de fichier %s';

    public function __construct($file)
    {
        $this->msg = sprintf($this->msg, $file);
        parent::{__FUNCTION__}();
    }
}