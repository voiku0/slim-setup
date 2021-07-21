<?php
use Slim\Factory\AppFactory;

require __DIR__.'/../../vendor/autoload.php';

$app = AppFactory::create();

//request handler
$app->addBodyParsingMiddleware();

(new SimpleCore\Controller\DefaultRoutes())->getRoutes($app);
$app->run();