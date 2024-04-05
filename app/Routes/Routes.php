<?php

namespace App\Routes;

class Routes
{
  public static function get(): array
  {
    return [
      'get' => [
        '/api/clientes' => 'ClienteController@index',
        '/api/clientes/[0-9]+' => 'ClienteController@show',
        '/api/produtos' => 'ProdutoController@index',
        '/api/produtos/[0-9]+' => '',
        '/api/pedidos' => '',
        '/api/pedidos/[0-9]+' => ''
      ],
      'post' => [
        '/api/clientes' => '',
        '/api/produtos' => '',
        '/api/pedidos' => ''
      ]
    ];
  }
}
