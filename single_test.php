<?php

require 'exo.php';

$i = new Exo;

$url = 'https://vk.com/';

var_dump($i->is_ok($url, 'ВКонтакте для мобильных устройств'));
