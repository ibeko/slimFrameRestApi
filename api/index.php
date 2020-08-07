<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/config/db.php';

// Instantiate App
$app = AppFactory::create();
$app->setBasePath('/slimrest/api');

require __DIR__ . "/../src/routes/courses.php";

$app->run();