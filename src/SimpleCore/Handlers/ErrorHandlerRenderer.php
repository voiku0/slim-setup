<?php
namespace SimpleCore\Handlers;
use Slim\Interfaces\ErrorRendererInterface;
use Throwable;

class ErrorHandlerRenderer implements ErrorRendererInterface
{
  public function __invoke(Throwable $exception, bool $displayErrorDetails): string
  {
    return json_encode($exception->getMessage());
  }
}