---
layout: page
title: "Работа с массивами"
date: 2013-02-19 01:00
comments: true
sharing: true
footer: true
sidebar: true
tags: [php,lectures,array]
lecture: true
---
### Краткое содержание лекции

[Теоретические задания](04-working-with-arrays-theoretical-tasks.html) |
[Практические задания](04-working-with-arrays-practical-tasks.html)

#### Операторы, работающие с массивами

 * ```+``` - "объединение" массивов
 * ```+``` vs ```array_unique(array_merge($a, $b))```
 * ```==``` - равенство
 * ```===``` - тождественное равенство (массивы содержат пары ключ/значение в одинаковом порядке и одного типа)
 * ```!=``` / ```<>``` - неравенство массивов
 * ```!===``` - тождественное неравенство

```php
<?php
$a = array("apple", "banana");
$b = array(1 => "banana", "0" => "apple");
$c = array(1 => "banana", 0 => "apple");

var_dump($a == $b); // bool(true)
var_dump($a === $b); // bool(false)

var_dump($a == $c); // bool(true)
var_dump($a === $c); // bool(false)

var_dump($c == $b); // bool(true)
var_dump($c === $b); // bool(true)

var_dump($a == $b); // bool(true)
var_dump($a === $b); // bool(false)

var_dump($a == $c); // bool(true)
var_dump($a === $c); // bool(false)

var_dump($c == $b); // bool(true)
var_dump($c === $b); // bool(true)
```

#### Функции по работе с массивами

Полный список функций доступен в [документации](http://www.php.net/manual/en/ref.array.php).

 * [is_array](02-php-basics.html) - проверяет, является ли переменная массивом
 * ```array explode ( string $delimiter , string $string [, int $limit ] )```
 * ```string implode ( string $glue , array $pieces )```
 * ```string implode ( array $pieces )```

##### Создание массива

 * ```array array ([ mixed $... ] )```
 * ```array range ( mixed $start , mixed $end [, number $step = 1 ] )```
 * ```array array_fill(int $start_index, int $num, mixed $value)```
 * ```array array_fill_keys(array $keys, mixed $value)```
 * ```array array_combine ( array $keys , array $values )```
 * ```array array_pad ( array $input , int $pad_size , mixed $pad_value )```

##### Получение содержимого массива

 * ```array array_values ( array $input )```
 * ```array array_keys (array $input [, mixed $search_value = null [, bool $strict = false]])```

##### Проверка / поиск элементов

 * ```bool in_array ( mixed $needle , array $haystack [, bool $strict = false ] )```
 * ```mixed array_search ( mixed $needle , array $haystack [, bool $strict = false ] )```
 * ```bool array_key_exists ( mixed $key , array $search )```

##### Подсчет элементов

 * ```int count ( mixed $var [, int $mode = COUNT_NORMAL ] )``` / sizeof / Countable
 * ```array array_count_values ( array $input )```
 * ```number array_sum ( array $array )```

##### Слияние массивов

 * ```array array_merge ( array $array1 [, array $... ] )```
 * ```array array_merge_recursive ( array $array1 [, array $... ] )```
 * ```array array_unique ( array $array [, int $sort_flags = SORT_STRING ] )```

##### Преобразование переменных

 * ```array list ( mixed $varname [, mixed $... ] )```
 * ```array compact ( mixed $varname [, mixed $... ] )```
 * ```int extract ( array &$var_array [, int $extract_type = EXTR_OVERWRITE [, string $prefix =null ]] )```

##### "Очереди"

 * ```int array_push ( array &$array , mixed $var [, mixed $... ] )```
 * ```mixed array_pop ( array &$array )```
 * ```int array_unshift ( array &$array , mixed $var [, mixed $... ] )```
 * ```mixed array_shift ( array &$array )```

##### Изменение ключей массива

 * ```array array_flip ( array $trans )```
 * ```array array_change_key_case ( array $input [, int $case = CASE_LOWER ] )```

##### Изменение элементов массива (самостоятельно)

 * ```array array_map ( callable $callback , array $arr1 [, array $... ] )```
 * ```number array_product ( array $array )```
 * ```mixed array_reduce ( array $input , callable $function [, mixed $initial = NULL ] )```
 * ```array array_replace ( array $array , array $array1 [, array $... ] )```
 * ```array array_replace_recursive ( array $array , array $array1 [, array $... ] )```

##### Работа с "кусками" массива (самостоятельно)

 * ```array array_chunk ( array $input , int $size [, bool $preserve_keys = false ] )```
 * ```array array_slice ( array $array , int $offset [, int $length = NULL [, bool $preserve_keys = false ]] )```
 * ```array array_splice ( array &$input , int $offset [, int $length = 0 [, mixed $replacement ]] )```
 * ```array array_filter ( array $input [, callable $callback = "" ] )```

##### Итерация по массиву
 * ```mixed current ( array &$array )``` / pos
 * ```array each ( array &$array )```
 * ```mixed end ( array &$array )```
 * ```mixed key ( array &$array )```
 * ```mixed next ( array &$array )```
 * ```mixed prev ( array &$array )```
 * ```mixed reset ( array &$array )```
 * ```bool array_walk_recursive ( array &$input , callable $funcname [, mixed $userdata = null ] )```
 * ```bool array_walk ( array &$array , callable $funcname [, mixed $userdata = null ] )```

##### Функции сортировки

 * array_rand — Pick one or more random entries out of an array
 * shuffle — Shuffle an array
 * array_multisort — Sort multiple or multi-dimensional arrays
 * array_reverse — Return an array with elements in reverse order
 * sort — Sort an array
 * rsort — Sort an array in reverse order
 * asort — Sort an array and maintain index association
 * arsort — Sort an array in reverse order and maintain index association
 * ksort — Sort an array by key
 * krsort — Sort an array by key in reverse order
 * natsort — Sort an array using a "natural order" algorithm
 * natcasesort — Sort an array using a case insensitive "natural order" algorithm
 * usort — Sort an array by values using a user-defined comparison function
 * uksort — Sort an array by keys using a user-defined comparison function
 * uasort — Sort an array with a user-defined comparison function and maintain index association

##### Вычисление разницы / пересечения между массивами (самостоятельно при желании)

 * array_diff — Computes the difference of arrays
 * array_diff_assoc — Computes the difference of arrays with additional index check
 * array_diff_uassoc — Computes the difference of arrays with additional index check which is performed by a user supplied callback function
 * array_diff_key — Computes the difference of arrays using keys for comparison
 * array_diff_ukey — Computes the difference of arrays using a callback function on the keys for comparison
 * array_udiff — Computes the difference of arrays by using a callback function for data comparison
 * array_udiff_assoc — Computes the difference of arrays with additional index check, compares data by a callback function
 * array_udiff_uassoc — Computes the difference of arrays with additional index check, compares data and indexes by a callback function

 * array_intersect — Computes the intersection of arrays
 * array_intersect_assoc — Computes the intersection of arrays with additional index check
 * array_intersect_uassoc — Computes the intersection of arrays with additional index check, compares indexes by a callback function
 * array_intersect_key — Computes the intersection of arrays using keys for comparison
 * array_intersect_ukey — Computes the intersection of arrays using a callback function on the keys for comparison
 * array_uintersect — Computes the intersection of arrays, compares data by a callback function
 * array_uintersect_assoc — Computes the intersection of arrays with additional index check, compares data by a callback function
 * array_uintersect_uassoc — Computes the intersection of arrays with additional index check, compares data and indexes by a callback functions


