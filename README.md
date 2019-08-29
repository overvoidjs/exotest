eXo-test

Пример использования:
```php
<?php
require_once 'exo.test.php';

$i = new Exo;
$url = 'https://google.com/';
echo $i->is_ok($url);
//var_dump($i->is_ok($url, 'Каталог'));

```
