---
layout: page
title: "Управляющие структуры"
date: 2013-02-13 02:12
comments: true
sharing: true
footer: true
sidebar: true
tags: [php,lectures,if,else,switch,for,foreach,while,do/while,return,exit,die,goto]
lecture: true
---
### Краткое содержание лекции

[Теоретические задания](03-control-structures-theoretical-tasks.html) |
[Практические задания](03-control-structures-practical-tasks.html)

Лекция содержит много примеров на которых объясняется новый материал и закрепляется предыдущий.
В конце каждой подглавы есть best practice.

#### if
Выражение (expr) всегда приводится к boolean типу
```php
if (expr)
    statement
```

```php
<?php
if (1 == 2)
    echo '1==1';
    echo '2';

if (1 != 2) echo 'true';

if (1 !== '1'):
    echo 'true';
endif;

//best practice
if (1 === 1) {
    echo '1==1';
    //code
}
?>
```

#### if / else

```php
<?php
if (true !== 20)
    echo 'true';
else
    echo '20 is not boolean';

if (1 == '1') echo 'true' . PHP_EOL;
else echo 'false';
     echo 'false';

if (1 != '1'):
    echo 'true';
    //code
else:
    echo 'false';
    //code
endif;

//best practice
if (1 == 1) {
    echo 'true';
    //code
} else {
    echo 'false';
    //code
}

//best practice too, but sometimes
$variable = (5 > 3) ? 5 : 2;
echo $variable;

//best practice too, but sometimes, more readable
$variable = ((5 > 3 && 5 > 4 && 3 > 2) || (2 > 4 && 1 <2 ))
    ? ' Hello World'
    : 'The End';
echo $variable;
?>
```

Поведение по умолчанию

```php
<?php
$variable = 2;
$a = 5;
//code
$variable = ($a) ?: 3;
echo $variable;
?>
```

Иногда в html кто-то любит вставлять ```php``` код.

##### Incorrect

```php
<?php if( $condition ) {
    //code
   }
?>

<?php else {
    //code
   }
?>
```

##### Correct:

```php
<?php if( $condition ) {
    //code
?>

<?php } else {
    //code
   }
?>
```

#### if / else if / elseif


Если вы используете ```{//code}```, тогда вы можете использовать и ```elseif```, и ```else if```.
Для ```:``` допустимо лишь использование ```elseif```.

```php
<?php
$a = null;
$b = null;
if ($a > $b):
    echo "a is bigger than b";
    //code
elseif ($a === $b):
    echo "a is identical to b";
    //code
elseif ($a == $b):
    echo "a is equal to b";
    //code
else:
    echo "a is smaller than b";
    //code
endif;

//best practice
if ($a > $b) {
    echo "a is bigger than b";
    //code
} else if ($a === $b) {
    echo "a is identical to b";
    //code
} elseif ($a == $b) {
    echo "a is equal to b";
    //code
} else {
    echo "a is smaller than b";
    //code
}
?>
```

#### switch

 * циклическая структура
 * нестрогое сравнение
 * ```continue``` === ```break```

```php
<?php
if ($i == 0) {
    echo "i equals 0";
} elseif ($i == 1) {
    echo "i equals 1";
} elseif ($i == 2) {
    echo "i equals 2";
}

switch ($i) {
    case 0:
        echo "i equals 0";
        continue;
    case 1:
        echo "i equals 1";
        continue;
    case 2:
        echo "i equals 2";
        continue;
}

switch ($i):
    case 0:
        echo "i equals 0";
        break;
    case 1:
        echo "i equals 1";
        break;
    case 2:
        echo "i equals 2";
        break;
endswitch;

//best practice
switch ($i) {
    case 0:
        echo "i equals 0";
        break;
    case 1:
        echo "i equals 1";
        break;
    case 2:
        echo "i equals 2";
        break;
    default:
        echo 'Default';
        break;
}

// $i может быть строкой
switch ($i) {
    case 'apple':
        echo "i equals 'apple'";
        break;
    case 'fruit':
        echo "i equals 'fruit'";
        break;
    case 'Moscow':
        echo "i equals 'Moscow'";
        break;
}
?>
```

```php
<?php
//$i = 0;
//$i = 1;
switch ($i) {
case 0:
    echo '$i maybe 0';
case 1:
    echo '$i maybe 1';
case 2:
    echo "i is less than 3 but not negative";
    break;
case 3:
    echo "i is 3";
}
switch ($i) {
case 0:
case 1:
case 2:
    echo "i is less than 3 but not negative";
    break;
case 3:
    echo "i is 3";
}
?>
```

#### for

```
for (expr1; expr2; expr3)
    statement
```

```php
<?php
/* example 0 */
for ($i = 1; $i <= 10; $i++):
    echo $i;
endfor;

/* example 1 */
for ($i = 1; $i <= 10; $i++) {
    echo $i;
}

/* example 2 */
for ($i = 1;; $i++) {
    if ($i > 10) {
        break;
    }
    echo $i;
}

/* example 3 */

$i = 1;
for (;;) {
    if ($i > 10) {
        break;
    }
    echo $i;
    $i++;
}

/* example 4 */

for ($i = 1, $j = 0; $i <= 10; $j += $i, print $i, $i++);
?>
```

```php
<?php
for($i = 0; $i < count($array); $i++) {
    $array[$i] = $i;
}
//better
for($i = 0; $i < $count = count($array); $i++) {
    $array[$i] = $i;
}

//best practice, imho
$count = count($array);
for($i = 0; $i < $count; $i) {
    $array[$i] = $i;
}
?>
```

#### foreach

```
foreach (array_expression as $value)
    statement
foreach (array_expression as $key => $value)
    statement
```

 * при исполнении сбрасывает указатель массива сбрасывается на первый элемент массива
 * не поддерживает подавление ошибок с помощью ```@```
 * после завершения цикла переменные ```$key``` и ```$value``` сохраняют свои значения

```php
<?php
$arr = array(1, 2, 3, 4);

foreach ($arr as $value):
    $value = $value * 2;
endforeach;
unset($value);

foreach ($arr as $value) {
    $value = $value * 2;
}
unset($value);

foreach ($arr as $key => $value) {
    $arr[$key] = $value * 2;
}
unset($key, $value);

foreach ($arr as &$value) {
    $value = $value * 2;
}
unset($value);

foreach (array(1, 2, 3, 4) as &$value) {
    $value = $value * 2;
}
unset($value);
```

#### while

```
while (expr)
    statement
```

```php
<?php
$i = 0;
while (true):
    $i++;
    if ($i == 5):
        break;
    endif;
    //code
endwhile;

$i = 0;
while (true) {
    $i++;
    if ($i == 5) {
        break;
    }
    //code
}

//best practice
$i = 0;
while ($i < 5) {
    $i++;
    //code
}
?>
```

#### do while

```
do
    statement
while (expr)
```

```php
<?php
$i = 0;
do {
    echo $i;
} while ($i > 0);

do {
    echo $i;
} while (0);
?>
```

#### break / continue

```php
<?php
$i = 0;
while (++$i) {
    switch ($i) {
    case 5:
        echo "Exit only the switch";
        break 1;
    case 10:
        echo "Exit the switch and the while";
        break 2;
    default:
        break;
    }
}
?>
```

```php
<?php
$i = 0;
while ($i++ < 5) {
    echo "Outer<br />\n";
    while (1) {
        echo "Middle<br />\n";
        while (1) {
            echo "Inner<br />\n";
            continue 3;
        }
        echo "This never gets output.<br />\n";
    }
    echo "Neither does this.<br />\n";
}
?>
```


С ```php 5.4```

 * ```break/continue 0;``` больше невалидно. В предыдущих версиях эти записи были эквивалентны ```break/continue 1;```.
 * Удалена возможность передачи численной переменной в виде аргумента (например ```$num = 2; break $num; continue $num;```).

#### return

 * Возвращение значения ```return $a;```
 * Возвращение результата выражения ```return ($a)```, ```return ($a !== $b);```;
 * ```return;```
 * ```return(); //error```

#### exit

 * returns exit status 0-255 or message
 * ```exit();```
 * ```exit('message');```
 * ```exit(1);```
 * ```exit(0);```
 * ```die();```
 * ```die('message');```

#### goto

 * доступно с ```php 5.3```
 * метка должна находиться в том же файле, в том же контексте
 * нельзя перейти внутрь любой циклической структуры или оператора ```switch```
 * можно выйти из циклической структуры или ```switch```

```php
<?php
goto a;
echo 'Foo';
//code
a:
echo 'Bar';
?>
```

Допустимо

```php
<?php
for($i=0, $j=50; $i<100; $i++) {
    while($j--) {
        if($j==17) goto end;
    }
}
echo "i = $i";
end:
echo 'j hit 17';
?>
```

Недопустимо

```php
<?php
goto loop;
for($i=0,$j=50; $i<100; $i++) {
  while($j--) {
    loop:
  }
}
echo "$i = $i";
?>
```
