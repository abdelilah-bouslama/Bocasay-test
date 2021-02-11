<?php
session_start();
require_once __DIR__ . '/../config/autoload.php';
use lib\Routes\Route;
use lib\Tools\Functions;

Functions::setConstant('baseDir', __DIR__);
$routeur = new Route($_GET);
$routeur->router();
