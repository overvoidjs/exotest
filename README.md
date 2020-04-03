# exotest - Класс для тестирования url путей

Пример использования:


приемочное тестирование(штучное) с проверкой контента:
```php
<?php
require_once 'exo.php';

$i = new Exo;

$url = 'https://google.com/';
echo $i->is_ok($url);
//var_dump($i->is_ok($url, 'Каталог'));

```

проверка ответов всех страниц указанных в sitemap.xml
```php
<?php
require 'exo.test.php';

$i = new Exo;

$sitemap = 'site.ru/sitemap.xml';
$limit = 200;

$i->sitemap_teser($sitemap);

//$i->sitemap_tester($sitemap,$limit);

```
