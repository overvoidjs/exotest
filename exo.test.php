<?php

class Exo {

  public function __construct() {

  }

  public function echo($r){
    return $r;
  }

  public function is_ok($url , $testString = NULL){

    stream_context_set_default( [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
        ],
    ]);

    $headers = @get_headers($url);
    if (!empty($headers[0])) {
        preg_match('/\d{3}/', $headers[0], $matches);
        $answ = $matches[0] . PHP_EOL;

        if($answ == 200){

          if(is_null($testString)){
          $is_ok = 'Тест пройден для '.$url.'';
        } else {

          $html_to_test = file_get_contents($url);
          if(strpos(file_get_contents($url),$testString)){
            $is_ok = 'Тест пройден для '.$url.'';
          } else {
            $is_ok = 'Ответ сервера ок. Не пройден тест по строке. Для '.$url.'';
          }

        }
          //Ответ оке
        } else {
          $is_ok = 'Тест не пройден из за кода ответа :('.$answ.') для '.$url.'\n';
        }
    } else {
      $is_ok = 'Сервер не ответил :(';
    }

    return $is_ok;


  }

}
