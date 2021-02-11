<?php
$autoloader = require_once __DIR__ . '/../vendor/autoload.php';
$autoloader->addPsr4('lib\\', __DIR__ . '/../lib/');
$autoloader->addPsr4('lib\\Routes\\', __DIR__ . '/../lib/Routes/');
$autoloader->addPsr4('lib\\Exceptions\\', __DIR__ . '/../lib/Exceptions/');
$autoloader->addPsr4('lib\\Tools\\', __DIR__ . '/../lib/Tools/');
$autoloader->addPsr4('lib\\DB\\', __DIR__ . '/../lib/DB/');

$autoloader->addPsr4('Controllers\\', __DIR__ . '/../Controllers/');
$autoloader->addPsr4('Http\\', __DIR__ . '/../lib/Http/');
$autoloader->addPsr4('Models\\', __DIR__ . '/../Models/');
$autoloader->addPsr4('Entities\\', __DIR__ . '/../Entities/');