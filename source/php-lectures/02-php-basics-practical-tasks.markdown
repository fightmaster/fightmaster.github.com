---
layout: page
title: "Основы PHP"
date: 2013-02-12 01:22
comments: true
sharing: true
footer: true
sidebar: true
tags: [php,lectures]
---
### Практические задания

[Краткое содержание лекции](02-php-basics.html) |
[Теоретические задания](02-php-basics-theoretical-tasks.html)

Следующие куски кода являются рабочими и не содержат ошибок синтаксиса.
Измените их на свое усмотрение. Выполнять задание только в простейшем блокноте.

```php
<?php
function simple($a) {
    $B = array('яблоко', 'груша', 'мандарин');
    if (in_array($a, $B)) {
        return true;
    } else {
        return FALSE;
    }
}
```

```php
<?php
function simple($a, $b) {
    if ($a > $b) { return 1;
    } elseif ( $a< $b ) {
        return 0;
    }
    else { return 1}
}
```

```php
<?php
function simple($a) {
    $b = array();
    $c = $a[0];
    foreach ($a as $aa) {
        if ($aa > $c) {
            $c = $aa;
        }
    }
    return $c;
}
```
