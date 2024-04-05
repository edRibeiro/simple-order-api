<?php

namespace App\Controllers;

use App\Core\Response;
use App\Database\Connection;
use App\Database\Repositories\ClienteRepository;

class ClienteController
{
  function index()
  {
    $conn = Connection::connect();
    $repository = new ClienteRepository($conn);
    $clientes = $repository->findAll();
    Response::returnJson($clientes, 200);
  }

  function show($params)
  {
    Response::returnJson($params, 200);
  }
}
