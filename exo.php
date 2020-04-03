<?php

class Exo {

  public function __construct() {

    stream_context_set_default( [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
        ],
    ]);

  }

  public function echo($r){
    return $r;
  }

  //Поштучное приемочное тестирование
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
          $is_ok = $url . "  ....  Ok\n";
        } else {

          $html_to_test = file_get_contents($url);
          if(strpos(file_get_contents($url),$testString)){
            $is_ok = $url . "  ....  Ok\n";
          } else {
            $is_ok = $url . "  ....  Ok. But ContentTest .... FAIL \n";
          }

        }
          //Ответ оке
        } else {
          $is_ok = $url." .... FAIL with code " .$answ."\n";
        }
    } else {
      $is_ok = 'Server No Answer';
    }

    echo $is_ok;


  }


  //Массовое тестирование на код ответа из sitemap
  public function sitemap_teser($sitemap_url, $limit = NULL) {



    stream_context_set_default( [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
        ],
    ]);

    $myxml = file_get_contents($sitemap_url);

    preg_match_all("#<loc>(.+?)</loc>#i", $myxml, $match_links);

    if(is_null($limit)){
      $limit = count($match_links[1]);
    }

    $oks = 0;
    $fails = 0;
    $redirects = 0;

    for ($i=0; $i < $limit; $i++) {
      $url = $match_links[1][$i];


      $headers = @get_headers($url);
      if (!empty($headers[0])) {
          preg_match('/\d{3}/', $headers[0], $matches);
          $answ = $matches[0] . PHP_EOL;

          if($answ == 200){
            echo $url . "  ....  Ok\n";
            $oks++;
          }
          elseif ($answ == 300 || $answ == 301 || $answ == 302) {
            echo $url . "  ....  Redirected\n";
            $redirects++;
          }
          else {
            echo $url . "  ....  Fail with CODE ".$answ."\n";
            $fails++;
          }
        }
    }

    echo "\n All links - ".$limit." ...\n Tests Ok - ".$oks." ...\n Tests Redirected - ".$redirects." ...\n Tests Fails - ".$fails." ...";


  }


}
