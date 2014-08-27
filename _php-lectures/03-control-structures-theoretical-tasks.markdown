---
layout: page
title: "Управляющие структуры"
date: 2013-02-16 16:14
comments: false
sharing: true
footer: true
sidebar: true
tags: [php,lectures]
---
### Теоретические задания

[Краткое содержание лекции](03-control-structures.html) |
[Практические задания](03-control-structures-practical-tasks.html)

Что вывведут на экран следующие блоки кода?

```php
<?php
$a = 5;
$b = 3;
$c = &$b;
while ($b < 10) {
    $b += $c;
    $a++;
}
echo $a . ' ' . $b . ' ' . $c;
?>
```

```php
<?php
for ($i = 0; $i < 10; $i++) {
    if ($i == 5) {
        break;
    }
    echo $i . \PHP_EOL;
}
?>
```

```php
<?php
$array = array(1, 2, 3, 4, 5);
foreach($array as $element) {
    $element *= 2;
}
foreach($array as $element) {
    echo $element . \PHP_EOL;
}
?>
```

```php
<?php
goto a;
echo 'Foo';
//code
a:
echo 'Bar';
?>
```

```php
<?php
for ($i = 0; $i < 10; $i++) {
    if ($i > 0) {
        continue;
    }
    echo $i . \PHP_EOL;
}
?>
```

```php
<?php
for ($i = 1; $i < 10; $i++) {
    switch ($i) {
        case 1:
            echo $i . \PHP_EOL;
        case 2:
            echo $i . \PHP_EOL;
            continue;
        case 3:
        case 4:
        case 5:
            echo $i . \PHP_EOL;
        default:
            echo 'no value' . \PHP_EOL;
            break 2;
    }
    echo $i . \PHP_EOL;
}
?>
```

Какая разница между ```return $a;``` и ```return ($a);```
