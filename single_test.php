<?php

require 'exo.php';

$i = new Exo;

$url = 'http://localhost:7888/catalog/instrumentyi/';

$i->is_ok($url,'<div class="product-card-name">');
