<?php

namespace Tests\Helpers;

use App\Helpers\PasswordHelper;
use PHPUnit\Framework\TestCase;

class PasswordHelperTest extends TestCase
{
  public function testEncrypt()
  {
    $password = 'senha123';
    $hashedPassword = PasswordHelper::encrypt($password);

    // Verifica se a senha encriptada não é vazia
    $this->assertNotEmpty($hashedPassword);

    // Verifica se a senha encriptada é uma string
    $this->assertIsString($hashedPassword);
  }

  public function testVerify()
  {
    $password = 'senha123';
    $hashedPassword = PasswordHelper::encrypt($password);

    // Verifica se a senha original corresponde à senha encriptada
    $this->assertTrue(PasswordHelper::verify($password, $hashedPassword));

    // Verifica se uma senha diferente não corresponde à senha encriptada
    $this->assertFalse(PasswordHelper::verify('outrasenha', $hashedPassword));
  }
}
