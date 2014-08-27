---
layout: page
title: "Работа со строками"
date: 2013-02-24 00:40
comments: false
sharing: true
footer: true
sidebar: true
tags: [php,lectures]
---
### Теоретические задания

[Краткое содержание лекции](05-working-with-strings.html) |
[Практические задания](05-working-with-strings-practical-tasks.html)

 1. Объясните разницу между single quoted и double quoted.
 2. Объясните разницу между Heredoc и Newdoc.
 3. Какой суффикс у функций для работы с мультибайтовыми кодировками?
 4. С помощью какой функции можно удалить все whitespaces?
 5. Как можно перемешать все символы в строке?

Что выведут на экран следующие блоки кода?

```php
<?php
$number = 2;
$fruit = 'яблока';
$string = 'У Маши было %d %s' . \PHP_EOL;
echo sprintf($string, $number, $fruit);
echo sprintf($string, $fruit, $number);
$string = 'У Маши было %1$d %2$s';
echo sprintf($string, $number, $fruit);
echo sprintf($string, $fruit, $number);
```

```php
<?php
echo printf('%d+%d=', 2, 2);
```

```php
<?php
$string = "This is\tan example\nstring";

for ($i = 0; $i < $length = strlen($string); $i++) {
    echo $string[$i];
}
```

```php
<?php
//кодировка utf-8
echo strlen("Фыва") . \PHP_EOL;
echo strlen("Asdf") . \PHP_EOL;
```
