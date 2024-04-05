<?php

namespace App\Controllers;

use App\Core\Response;
use App\Database\Connection;
use App\Database\Repositories\ProdutoRepository;

class ProdutoController
{
  function index(): void
  {
    $conn = Connection::connect();
    $repository = new ProdutoRepository($conn);
    $produtos = $repository->findAll();
    Response::returnJson($produtos, 200);
  }

  function show($params)
  {
    Response::returnJson($params, 200);
  }
}
