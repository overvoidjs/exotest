<?php


$i = new Exo;

$url = 'https://vk.com/';

$payload = [
  'data'=>'data'
];

$post_file_name = 'new_img';
$post_file_path = './new_img.jpg';

$test = $i->post_it_file($url,$payload,$post_file_name,$post_file_path);
