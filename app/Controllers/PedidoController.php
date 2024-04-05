<?php

namespace App\Controllers;

use App\Core\Response;
use App\Database\Connection;
use App\Database\Repositories\ProdutoRepository;

class ProdutoController
{
  function index(): void
  {
  }

  function show($params)
  {
    Response::returnJson($params, 200);
  }
}
