---
layout: page
title: "Работа с массивами"
date: 2013-02-19 01:00
comments: false
sharing: true
footer: true
sidebar: true
tags: [php,lectures]
---
### Теоретические задания

[Краткое содержание лекции](04-working-with-arrays.html) |
[Практические задания](04-working-with-arrays-practical-tasks.html)

Что выведут на экран следующие блоки кода?

```php
<?php
$str = 'one|two|three|four';

print_r(explode('|', $str, 2));
print_r(explode('|', $str, -1));
print_r(explode('|', $str, 0));
```

```php
<?php
$array = array('lastname', 'email', 'phone');
$string = implode(",", $array);
echo $string;
echo implode('hello', array());
echo implode(array('a', 'b', 'c'));
```

```php
<?php
foreach (range('1', '10') as $letter) {
    echo $letter;
}
foreach (range('z', 'a') as $letter) {
    echo $letter;
}
```

```php
<?php
$array1 = array("fruit" => "apple", 2, 10, "1" => "1");
$array2 = array("Moscow", "London", "fruit" => null, "1" => 54, 4);
$result = array_merge($array1, $array2);
print_r($result);

$result = array_merge_recursive($array1, $array2);
print_r($result);
```

```php
<?php
$array = array('numbers' => array(1, 2, 3, 4, 5),
              'letters' => array('a', 'b', 'c', 'd', 'e'));
echo count($array, COUNT_RECURSIVE);
echo count($array);
```

```php
<?php
$input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
list ($a, $b, $c) = $input;
echo $a. ' ' . $b . ' ' . $c . \PHP_EOL;

list ($a, $b, $c, $d, $e, $f) = $input;
echo $a. ' ' . $b . ' ' . $c . ' ' . $d . ' ' . $e . ' ' . $f . \PHP_EOL;

$input = array("Neo" => 1, "Morpheus" => 2, "Trinity" => 3, "Cypher" => 4, "Tank" => 5);
list ($a, $b, $c) = $input;
echo $a. ' ' . $b . ' ' . $c . \PHP_EOL;

list ($a, $b, $c) = array_flip($input);
echo $a. ' ' . $b . ' ' . $c . \PHP_EOL;
```

```php
<?php
$input = range(0, 5);
if (in_array('1', $input, true)) {
    echo 'Содержится в массиве';
} else {
    echo 'Элемент не содержится в массиве';
}

if (!in_array('1', $input)) {
    echo 'Элемент не содержится в массиве';

    return false;
}
echo 'Содержится в массиве';
```

```php
<?php
$input = array(1, 2, 3, 4, 5);
$keys = array_keys($input);
print_r($keys);
```


```php
<?php
$input = array(1, 2, 3, 4, 5);
$a = 2;
$b = 5;
$result = compact($input, 'output', 'a', $b);
print_r($result);

$vars = array('input');
$result = compact($vars);
print_r($result);
```

```php
<?php
$input = array (2, 3, 5, 1, 4);
print_r(sort($input));
print_r(rsort($input));
print_r(asort($input));
```

```php
<?php
$input = array (2, 3, 5, 1, 4);
sort($input);
print_r($input);
rsort($input);
print_r($input);
asort($input);
print_r($input);
```

```php
<?php
//массив исходных данных
$array = array(1, 2, 3, 4, 5, 6, 7, 8);
foreach($array as &$element) {
    next($array);
    echo $element . ' ' . current($array) . \PHP_EOL;
}
```

 * Как разбить массив ```array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10)``` на части по 3 элемента?
 * С помощью каких функций можно реализовать очередь FIFO (FirstInFirstOut)?
 * Является ли стабильной сортировка ```sort```? Объясните свой ответ.
