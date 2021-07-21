<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Factory\AppFactory;

require __DIR__.'/../../vendor/autoload.php';

$app = AppFactory::create();

//request handler
$app->addBodyParsingMiddleware();
$app->get('/', function (Request $request, Response $response, $args) {
  $response->getBody()->write("Hello world!");
  return $response;
});

$app->post('/', function (Request $request, Response $response, $args){
  $body = $request->getParsedBody();
  $response->getBody()->write(json_encode($body));
  $response->withHeader('Content-type', 'application/json');
  return $response;
});

$app->run();