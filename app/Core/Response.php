<?php

namespace App\Core;

class Response
{
  /**
   * Converte um array em uma resposta em JSON escreve na saida da requisição
   *
   * @param [array] $array
   * @return void
   */
  public static function returnJson($array, $status_code = NULL)
  {
    //Definindo o cabeçalho da resposta
    http_response_code(intval($status_code));

    // header("HTTP/1.1 $status_code $status_msg");
    header("Content-Type: application/json");
    echo json_encode(self::utf8ize($array));
    exit;
  }

  /**
   * Função para forçar o encode UTF-8 nos caracteres
   *
   * @param [string || array] $d
   * @return [ string || array]
   */
  private static function utf8ize($d)
  {
    if (is_array($d)) {
      foreach ($d as $k => $v) {
        $d[$k] = self::utf8ize($v);
      }
    } else if (is_string($d)) {
      return utf8_encode($d);
    }
    return $d;
  }
}
