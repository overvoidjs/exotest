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
echo $i->is_ok($url);
//Проверка статуса ответа и наличия в коде страницы блока
echo $i->is_ok($url, '<span>Каталог</span>');

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
