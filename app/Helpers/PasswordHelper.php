<?php

namespace App\Helpers;

class PasswordHelper
{
  /**
   * Encripta uma senha usando o algoritmo MD5.
   *
   * @param string $password
   * @return string
   */
  public static function encrypt(string $password): string
  {
    return md5($password);
  }

  /**
   * Verifica se uma senha corresponde ao hash MD5 fornecido.
   *
   * @param string $password
   * @param string $hash
   * @return bool
   */
  public static function verify(string $password, string $hash): bool
  {
    return md5($password) === $hash;
  }
}
