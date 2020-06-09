# eXo by We::Dev
## Система приемочного тестирования

### Установка:
```
composer require overvoidjs/exotest:dev-master
```

### Пример использования:

```
include_once 'vendor/autoload.php';

```

приемочное тестирование(штучное) с проверкой контента:
```php
<?php

$i = new Exo;

$url = 'https://google.com/';
//Проверка статуса ответа
$i->is_ok($url);
//Проверка статуса ответа и наличия в коде страницы блока
$i->is_ok($url, '<span>Каталог</span>');

```

отправка POST запроса по url и получение ответа:
```php
<?php

$i = new Exo;

$url = 'https://samesite.with/post/or/api';
$param = [
'param1'=>'param1_data',
'param2'=>'param2_data'
];

//Можно положить в переменную, вернет ответ POSTa
$i->post_it($url,$param);

```


проверка ответов всех страниц указанных в sitemap.xml
```php
<?php

$i = new Exo;

$sitemap = 'site.ru/sitemap.xml';
$limit = 200;

$i->sitemap_teser($sitemap);

//$i->sitemap_tester($sitemap,$limit);

```
