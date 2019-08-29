<?php

require 'exo.test.php';

$i = new Exo;

$url = 'https://stommarket.ru/';

var_dump($i->is_ok($url, 'Каталог'));
