<?php

stream_context_set_default( [
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
    ],
]);

$myxml = file_get_contents("https://stommarket.ru/sitemap.xml/");

preg_match_all("#<loc>(.+?)</loc>#i", $myxml, $match_links);




for ($i=0; $i < 50; $i++) {
  $url = $match_links[1][$i];


  $headers = @get_headers($url);
  if (!empty($headers[0])) {
      preg_match('/\d{3}/', $headers[0], $matches);
      $answ = $matches[0] . PHP_EOL;

      if($answ == 200){
        echo $url . "....Ok\n";
      }
      else {
        echo $url . "....Fail with CODE ".$answ."\n";
      }
    }
}
