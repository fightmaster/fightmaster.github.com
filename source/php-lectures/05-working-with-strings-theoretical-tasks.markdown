---
layout: page
title: "Работа со строками"
date: 2013-02-21 03:00
comments: true
sharing: true
footer: true
sidebar: true
tags: [php,lectures]
---
### Теоретические задания

[Краткое содержание лекции](05-working-with-strings.html) |
[Практические задания](05-working-with-strings-practical-tasks.html)

*Задание составлено не полностью*

Что выведут на экран следующие блоки кода?

```
<?php
$string = "This is\tan example\nstring";

for ($i = 0; $i < $length = strlen($string); $i++) {
    echo $string[$i];
}
```

```
<?php
//utf
echo strlen("Фыва") . \PHP_EOL;
echo strlen("Asdf") . \PHP_EOL;
```
