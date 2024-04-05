<?php

namespace App\Database\Repositories;

use App\Entities\Pedido;
use PDO;

class PedidoRepository
{
  private PDO $connection;

  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }

  public function save(Pedido $pedido): bool
  {
    // Implemente o código para salvar um novo pedido no banco de dados
  }

  public function update(int $id, Pedido $pedido): bool
  {
    // Implemente o código para atualizar um pedido existente no banco de dados
  }

  public function delete(int $id): bool
  {
    // Implemente o código para excluir um pedido existente do banco de dados
  }

  public function findById(int $id): ?Pedido
  {
    // Implemente o código para buscar um pedido pelo ID no banco de dados
  }

  public function findAll(): array
  {
    // Implemente o código para buscar todos os pedidos no banco de dados
  }
}
