<?php
namespace SimpleCore\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


use SimpleCore\Exception\SimpleCoreException;
use Slim\App;

class DefaultRoutes extends ControllerAbstract
{
  public function helloWorld(Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
  }

  public function postJson(Request $request, Response $response, $args) {
    $body = $request->getParsedBody();
    $response->getBody()->write(json_encode($body));
    $response->withHeader('Content-type', 'application/json');
    return $response;
  }

  public function error(Request $request, Response $response, $args) {
    throw new SimpleCoreException('sda',12);
  }

  public function getRoutes(App $app)
  {
    $app->get('/', DefaultRoutes::class.':helloWorld');
    $app->get('/error[/]', DefaultRoutes::class.':error');
    $app->post('/', DefaultRoutes::class.':postJson');
  }
}