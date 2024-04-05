<?php

namespace App\Core;

use App\Routes\Routes;
use App\Support\RequestType;
use App\Support\Uri;

class RouterFilter
{
  private string $uri;
  private string $method;
  private array $routesRegistred;

  public function __construct()
  {
    $this->uri = Uri::get();
    $this->method = RequestType::get();
    $this->routesRegistred = Routes::get();
  }

  private function simpleRouter(): string | null
  {
    if (array_key_exists($this->uri, $this->routesRegistred[$this->method])) {
      return $this->routesRegistred[$this->method][$this->uri];
    }
    return null;
  }

  private function dynamicRouter(): string | null
  {
    foreach ($this->routesRegistred[$this->method] as $index => $route) {
      $regex = str_replace('/', '\/', ltrim($index, '/'));
      if ($index !== '/' && preg_match("/^$regex$/", ltrim($this->uri, '/'))) {
        return $route;
      }
    }
    return null;
  }

  public function get(): string | null
  {
    $router = $this->simpleRouter();
    if ($router) {
      return $router;
    }

    $router = $this->dynamicRouter();
    if ($router) {
      return $router;
    }
    return 'Not Found';
  }
}
