<?php
namespace SimpleCore\Controller;

use Slim\App;

abstract class ControllerAbstract
{
  abstract function getRoutes(App $app);
}