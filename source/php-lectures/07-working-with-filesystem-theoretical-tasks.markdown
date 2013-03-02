---
layout: page
title: "Работа с файловой системой"
date: 2013-03-02 23:30
comments: false
sharing: true
footer: true
sidebar: true
tags: [php,lectures]
---
### Теоретические задания

[Краткое содержание лекции](07-working-with-filesystem.html) |
[Практические задания](07-working-with-filesystem-practical-tasks.html)

 * В каких ОС доступна функция ```chroot```?
 * Какая разница между ```opendir```, ```dir```, ```scandir```?
 * Как можно узнать размер файла?
 * Какая разница между функциями ```unlink``` и ```rmdir```.
 * Что выведут на экран следующие блоки кода:

```php
<?php
echo dirname(__DIR__);
echo dirname(__FILE__);
```

```php
<?php
// /home/git/fightmaster.github.com/code.php
chdir('/home/fightmaster/');
echo getcwd() . \PHP_EOL;
echo __DIR__;
```