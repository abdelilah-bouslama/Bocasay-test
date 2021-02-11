<?php
namespace lib\Tools;

use lib\Tools\FileTool;
use lib\Tools\Functions;

Trait ConfigLoaderTrait
{
     /**
     * @return array
     */
    private function getConfig()
    {
        $config = Functions::jsonDecode(
            FileTool::getFileContent(
                Functions::getConstant('baseDir'). '/../config/config.json'
            )
        );

        return array_values($config);
    }
}