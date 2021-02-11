<?php
namespace lib\Tools;

use lib\Exceptions\FileNotFoundException;
use lib\Exceptions\FileException;
use Throwable;

class FileTool
{
    /**
     * @param string $pathfile
     * 
     * @return boolean
     */
    public static function isOpenable($pathfile)
    {
        if (!file_exists($pathfile)) {
            throw new FileNotFoundException();
        }

        return is_readable($pathfile);
    }

    /**
     * @param string $pathfile
     * 
     * @return string
     */
    public static function getFileContent($pathfile)
    {
        $contenu = '';

        try {
            if (self::isOpenable($pathfile)) {
                $contenu = file_get_contents($pathfile);
            }
        } catch (Throwable $e) {
            throw new FileException($pathfile);
        }

        return $contenu;
    }
}