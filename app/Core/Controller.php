<?php

namespace App\Core;

use Exception;

class Controller
{
  function execute(string $router)
  {
    if (!str_contains($router, '@')) {
      throw new Exception("A rota está registrada com o formato errado.");
    }

    list($controller, $method) = explode('@', $router);

    $namespace = "App\Controllers\\";

    $controllerNamespace = $namespace . $controller;

    if (!class_exists($controllerNamespace)) {
      throw new Exception("O controller {$controller} não existe.");
    }

    $controller = new $controllerNamespace;

    if (!method_exists($controller, $method)) {
      throw new Exception("O método {$method} não existe em {$controllerNamespace}.");
    }

    $params = new ControllerParams;
    $params = $params->get($router);

    $controller->$method($params);
  }
}
