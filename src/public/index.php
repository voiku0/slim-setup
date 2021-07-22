<?php
use Slim\Factory\AppFactory;

require __DIR__.'/../../vendor/autoload.php';

$app = AppFactory::create();

//request handler
$app->addBodyParsingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);
$errorHandler = $errorMiddleware->getDefaultErrorHandler();
$errorHandler->registerErrorRenderer('application/json', (new SimpleCore\Handlers\ErrorHandlerRenderer()));
$errorHandler->forceContentType('application/json');
(new SimpleCore\Controller\DefaultRoutes())->getRoutes($app);
$app->run();