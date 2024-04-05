<?php

namespace Tests\Database\Repositories;

use App\Database\Repositories\ProdutoRepository;
use PDO;
use PDOStatement;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ProdutoRepositoryTest extends TestCase
{
  private ProdutoRepository $produtoRepository;
  private MockObject $pdo;
  private MockObject $statement;

  protected function setUp(): void
  {
    parent::setUp();

    // Mock do objeto PDO
    $this->pdo = $this->createMock(PDO::class);

    // Mock do objeto PDOStatement
    $this->statement = $this->createMock(PDOStatement::class);

    // Configurando o objeto ProdutoRepository com o mock do PDO
    $this->produtoRepository = new ProdutoRepository($this->pdo);
  }

  public function testSave()
  {
    // Definindo o array de dados do produto
    $produto = [
      'nome' => 'Camiseta',
      'preco' => 29.99
    ];

    // Configurando o retorno do método execute do mock PDOStatement para true
    $this->statement->expects($this->once())->method('execute')->willReturn(true);

    // Verificando se o método save retorna true ao inserir o produto
    $this->assertTrue($this->produtoRepository->save($produto));
  }

  public function testFindAll()
  {
    // Definindo o array de produtos simulado
    $produtos = [
      ['id' => 1, 'nome' => 'Camiseta', 'preco' => 29.99],
      ['id' => 2, 'nome' => 'Calça', 'preco' => 49.99],
      ['id' => 3, 'nome' => 'Tênis', 'preco' => 99.99],
    ];

    // Configurando o retorno do método fetchAll do mock PDOStatement para o array de produtos simulado
    $this->statement->expects($this->once())->method('fetchAll')->willReturn($produtos);

    // Verificando se o método findAll retorna os produtos corretamente
    $this->assertEquals($produtos, $this->produtoRepository->findAll());
  }

  public function testFindById()
  {
    // Definindo o ID do produto a ser buscado
    $productId = 1;

    // Definindo os dados do produto simulado
    $produto = ['id' => $productId, 'nome' => 'Camiseta', 'preco' => 29.99];

    // Configurando o retorno do método execute do mock PDOStatement para true
    $this->statement->expects($this->once())->method('execute')->willReturn(true);

    // Configurando o retorno do método fetch do mock PDOStatement para os dados do produto simulado
    $this->statement->expects($this->once())->method('fetch')->willReturn($produto);

    // Verificando se o método findById retorna os dados do produto corretamente
    $this->assertEquals($produto, $this->produtoRepository->findById($productId));
  }

  public function testUpdate()
  {
    // Definindo os dados do produto a serem atualizados
    $productId = 1;
    $updatedData = ['nome' => 'Calça', 'preco' => 39.99];

    // Configurando o retorno do método execute do mock PDOStatement para true
    $this->statement->expects($this->once())->method('execute')->willReturn(true);

    // Verificando se o método update retorna true para uma atualização bem-sucedida
    $this->assertTrue($this->produtoRepository->update($productId, $updatedData));
  }

  public function testDelete()
  {
    // Definindo o ID do produto a ser deletado
    $productId = 1;

    // Configurando o retorno do método execute do mock PDOStatement para true
    $this->statement->expects($this->once())->method('execute')->willReturn(true);

    // Verificando se o método delete retorna true para uma exclusão bem-sucedida
    $this->assertTrue($this->produtoRepository->delete($productId));
  }
}
