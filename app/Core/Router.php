<?php

namespace App\Core;

class Router
{
  public static function run()
  {
    try {
      $routerRegistred = new RouterFilter;
      $router = $routerRegistred->get();

      $controller = new Controller;
      $controller->execute($router);
    } catch (\Throwable $th) {
      Response::returnJson([$th->getMessage()], 500);
    }
  }
}
