---
layout: page
title: "Регулярные выражения"
date: 2013-03-18 04:00
comments: false
sharing: true
footer: true
sidebar: true
tags: [php,lectures,array]
lecture: true
---
### Краткое содержание лекции

[Теоретические задания](06-regular-expressions-theoretical-tasks.html) |
[Практические задания](06-regular-expressions-practical-tasks.html)

{% blockquote [D. Tilbrook, 1988] %}
Whenever faced with a problem, some people say `Lets use AWK.' Now, they have two problems.
{% endblockquote %}

{% blockquote [Jamie Zawinski, 12.08.1997] %}
Some people, when confronted with a problem, think 
“I know, I'll use regular expressions.” Now they have two problems.
{% endblockquote %}

#### Разделители

Разделителем может быть любой символ не являющийся буквой, цифрой, обратной косой чертой или каким-либо пробельным символом.

Часто используемыми разделителями являются косые черты (/), знаки решетки (#) и тильды (~).

Не рекомендуется использовать метасимволы

#### Спецсимволы

 ```[ ] \ / ^ $ . | ? * + ( ) { }```

#### Представление символов

 * ```\t``` Табуляция
 * ```\v``` Вертикальная табуляция
 * ```\r``` Возврат каретки
 * ```\n``` Перевод строки
 * ```\f``` Конец страницы
 * ```\e``` Escape-символ
 * ```\b``` backspace Должен находиться внутри квадратных скобок (иначе интерпретируется как граница слова).

#### Символьные классы

 * ```\d``` === ```[0-9]``` Цифра
 * ```\D``` === ```[^\d]``` Любой символ, кроме цифры
 * ```\w``` === ```[A-Za-zА-Яа-я0-9_]``` Символы, образующие «слово» (буквы, цифры и символ подчёркивания)
 * ```\W``` === ```[^\w]``` Символы, не образующие «слово»
 * ```\s``` === ```[ \t\v\r\n\f]``` Пробельный символ
 * ```\S``` === ```[^\s]``` Не пробельный символ

```php
<?php
preg_match_all(
  '/(\d\d)\d/',
    '123456 789 a10b11c12',
    $out
);
print_r($out);
/*
Array
(
    [0] => Array
        (
            [0] => 123
            [1] => 456
            [2] => 789
        )

    [1] => Array
        (
            [0] => 12
            [1] => 45
            [2] => 78
        )

)
*/

preg_match_all(
  '/(\d\d)\D/',
    '123456 789 a10b11c12',
    $out
);
print_r($out);
/*
Array
(
    [0] => Array
        (
            [0] => 56 
            [1] => 89 
            [2] => 10b
            [3] => 11c
        )

    [1] => Array
        (
            [0] => 56
            [1] => 89
            [2] => 10
            [3] => 11
        )

)
*/
?>
```

#### Символьные классы POSIX

 * ```[:upper:]``` === ```[A-Z]```   Символы верхнего регистра
 * ```[:lower:]``` === ```[a-z]```   Символы нижнего регистра
 * ```[:alpha:]``` === ```[[:upper:][:lower:]]``` Буквы
 * ```[:digit:]``` === ```[0-9]```, т. е. \d Цифры
 * ```[:xdigit:]``` === ```[[:digit:]A-Fa-f]``` Шестнадцатеричные цифры
 * ```[:alnum:]``` === ```[[:alpha:][:digit:]]```    Буквы и цифры
 * ```[:word:]```    ```[[:alnum:]_]``````, т. е. \w  Символы, образующие «слово»
 * ```[:punct:]```   ```[-!"#$%&'()*+,./:;<=>?@[\\\]_`{|}~]``` Знаки пунктуации
 * ```[:blank:]```   ```[ \t]```   Пробел и табуляция
 * ```[:space:]```   ```[[:blank:]\v\r\n\f]```, т. е. \s   Пробельные символы
 * ```[:cntrl:]```   ```[\x00-\x1F\x7F]``` Управляющие символы
 * ```[:graph:]```   ```[\x21-\x7E]``` Печатные символы
 * ```[:print:]```   ```[\x20-\x7E]```, т. е. [[:graph:] ] Печатные символы с пробелом

#### Метасимволы

 * Вне ```[]```
    * ```\``` - общий экранирующий символ, допускающий несколько вариантов применения
    * ```^``` - декларирует начало данных (или строки в многострочном режиме)
    * ```$``` - декларирует конец данных или до завершения строки (или окончание строки в многострочном режиме)
    * ```.``` - соответствует любому символу, кроме перевода строки (по умолчанию)
    * ```[]``` - начало описания символьного класса / конец описания символьного класса
    * ```()``` - начало подмаски / конец подмаски
    * ```|``` - начало ветки условного выбора
    * ```?``` - расширяет смысл метасимвола (, является также квантификатором, означающим отсутствие либо ровно 1 вхождение, также преобразует жадные квантификаторы в ленивые (смотрите повторение)
    * ```*``` - квантификатор, означающий 0 или более вхождений
    * ```+``` - квантификатор, означающий 1 или более вхождений
    * ```{}``` - начало количественного квантификатора / конец количественного квантификатора
 * Внутри ```[]```
    * ```\``` - общий экранирующий символ
    * ```^``` - означает отрицание класса, допустим только в начале класса
    * ```-``` - означает символьный интервал
    * ```]``` = завершает символьный класс

 * ```^``` Начало строки ```^a```  **a**aa aaa
 * ```$``` Конец строки  ```a$```  aaa aa**a**
 * ```\b``` Граница слова ```a\b```  aa**a** aa**a**
 * ```\ba``` **a**aa **a**aa
 * ```\B``` Не граница слова  ```\Ba\B``` a**a**a a**a**a
 * ```\G``` Предыдущий успешный поиск   ```\Ga``` ***aaa*** aaa (поиск остановился на 4-й позиции — там, где не нашлось a)
 * ```[\dABCDEF]```

```php
<?php
preg_match_all(
  '/(\d\d)\b\D/',
    '123456 789 a10b11c12',
    $out
);
print_r($out);
/*
Array
(
    [0] => Array
        (
            [0] => 56 
            [1] => 89 
        )

    [1] => Array
        (
            [0] => 56
            [1] => 89
        )

)
*/

preg_match_all(
  '/\G(\d\d)/',
    '123456 789 a10b11c12',
    $out
);
print_r($out);
/*
Array
(
    [0] => Array
        (
            [0] => 12
            [1] => 34
            [2] => 56
        )

    [1] => Array
        (
            [0] => 12
            [1] => 34
            [2] => 56
        )

)
*/

preg_match_all(
  '/^123/',
    '123456 789 a10b11c12',
    $out
);
print_r($out);
/*
Array
(
    [0] => Array
        (
            [0] => 123
        )
)
*/

preg_match_all(
  '/[^123]/',
    '123456 789 a10b11c12',
    $out
);
print_r($out);
/*
Array
(
    [0] => Array
        (
            [0] => 4
            [1] => 5
            [2] => 6
            [3] =>  
            [4] => 7
            [5] => 8
            [6] => 9
            [7] =>  
            [8] => a
            [9] => 0
            [10] => b
            [11] => c
        )
)
*/
?>
```
#### Квантификаторы

Квантификаторы могу стоять за:

 * произвольным, возможно экранированным, символом
 * метасимволом "точка"
 * символьным классом
 * ссылкой на предыдущий фрагмент шаблона (см. следующий раздел)
 * взятой в круглый скобки подмаской (если это не утверждение - см. далее)

 * ```{n}``` Ровно n раз ```colou{3}r``` соответствует ```colouuur```
 * ```{m,n}``` От m до n включительно ```colou{2,4}r``` соответствует ```colouur, colouuur, colouuuur```
 * ```{m,}``` Не менее m  ```colou{2,}r``` соответствует ```colouur, colouuur, colouuuur и т. д.```
 * ```{,n}``` Не более n  ```colou{,3}r``` соответствует ```color, colour, colouur, colouuur```
 * ```*``` Ноль или более  {0,}  ```colou*r``` соответствует ```color, colour и т. д.```
 * ```+``` Одно или более  {1,}  ```olou+r``` соответствует ```colour, colouur и т. д. (но не color)```
 * ```?``` Ноль или одно   {0,1}  ```colou?r``` соответствует ```color, colour```

 * Жадность ```?``` после квантификатора

```php
<?php
preg_match_all(
    '/<.*>/',
    '<h1>Header</h1><div>body</div>',
    $out
);
print_r($out);
/*
Array
(
    [0] => Array
        (
            [0] => <h1>Header</h1><div>body</div>
        )
)
*/

preg_match_all(
    '/<.*?>/',
    '<h1>Header</h1><div>body</div>',
    $out
);
print_r($out);
/*
Array
(
    [0] => Array
        (
            [0] => <h1>
            [1] => </h1>
            [2] => <div>
            [3] => </div>
        )
)
*/
?>
```

 * Захватывание ```+``` после квантификатора

```php
<?php
preg_match_all(
    '/ab(xa)*+a/',
    'abxaabxaa',
    $out
);
print_r($out);
?>
```


#### Подмаски

 * ```cat(aract|erpillar|)```
 * ```the ((red|white) (king|queen))```
 * ```the ((?:red|white) (king|queen))```

```php
<?php
preg_match_all(
    '/(?:Chapter|Section) [1-9][0-9]{0,1}/U',
    'Chapter 50  Section 85',
    $out
);
print_r($out);
/*
Array
(
    [0] => Array
        (
            [0] => Chapter 5
            [1] => Section 8
        )
)
*/
?>
```

 * ```(?i:saturday|sunday)``` === ```(?:(?i)saturday|sunday)```
 * ```(?:(Sat)ur|(Sun))day``` vs ```(?|(Sat)ur|(Sun))day```

```php
<?php
preg_match_all(
    '/(?:(Chapter)|(Section)) [1-9][0-9]{0,1}/U',
    'Chapter 50  Section 85',
    $out
);
print_r($out);
/*
Array
(
    [0] => Array
        (
            [0] => Chapter 5
            [1] => Section 8
        )

    [1] => Array
        (
            [0] => Chapter
            [1] => 
        )

    [2] => Array
        (
            [0] => 
            [1] => Section
        )

)
*/
preg_match_all(
    '/(?|(Chapter)|(Section)) [1-9][0-9]{0,1}/U',
    'Chapter 50  Section 85',
    $out
);
print_r($out);
/*
Array
(
    [0] => Array
        (
            [0] => Chapter 5
            [1] => Section 8
        )

    [1] => Array
        (
            [0] => Chapter
            [1] => Section
        )
)
*/
preg_match_all(
    '/(?:(Chapter)|(Section)) [1-9][0-9]{0,1}/U',
    'Section 85',
    $out
);
print_r($out);
/*
Array
(
    [0] => Array
        (
            [0] => Section 8
        )

    [1] => Array
        (
            [0] => 
        )

    [2] => Array
        (
            [0] => Section
        )

)
*/
preg_match_all(
    '/(?|(Chapter)|(Section)) [1-9][0-9]{0,1}/U',
    'Section 85',
    $out
);
print_r($out);
/*
Array
(
    [0] => Array
        (
            [0] => Section 8
        )

    [1] => Array
        (
            [0] => Section
        )
)
*/
?>
```
 * ```((?i)rah)\s+\1```
 * ```(?P<name>pattern)``` === ```(?<name>pattern)``` === ```(?'name'pattern)```

 Обращение к подмаскам ```(?P=name)```, ```\k<name>```, ```k'name'```, ```\1```, ```\g1```, ```\g{1}```



```php
<?php
preg_match_all(
  '/(та|ту)-\1/',
    'та-та ту-ту та-ту',
    $out
);
print_r($out);
/*
Array
(
    [0] => Array
        (
            [0] => та-та
            [1] => ту-ту
        )

    [1] => Array
        (
            [0] => та
            [1] => ту
        )

)
*/

preg_match_all(
  '/(\d\d)\d \1/',
    '123456 789 a10b11c12',
    $out
);
print_r($out);
/*
Array
(
    [0] => Array
        (
        )

    [1] => Array
        (
        )
)
*/
?>
```

Что необходимо изменить в последнем примере для получения результата?

```php
<?php
preg_match_all(
  '/(\d\d)\d \1/',
    '123456 459 a10b11c12',
    $out
);
print_r($out);
/*
Array
(
    [0] => Array
        (
            [0] => 456 45
        )

    [1] => Array
        (
            [0] => 45
        )

)
*/
?>
```

#### Однократные подмаски ```(?>\d+)bar

```php
<?php
preg_match_all(
  '/\d+foo/',
    '123456bar',
    $out
);
print_r($out);

preg_match_all(
  '/(?>\d+)foo/',
    '123456bar',
    $out
);
print_r($out);

preg_match_all(
  '/^.*abcd$/',
    'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
    $out
);
print_r($out);

preg_match_all(
  '/^(?>.*)(?<=abcd)/',
    'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
    $out
);
print_r($out);
?>
```

#### Просмотр вперед / назад

  * ```(?=шаблон)``` Позитивный просмотр вперёд  ```Людовик(?=XVI)```  ЛюдовикXV, **Людовик**XVI, **Людовик**XVIII, ЛюдовикLXVII, ЛюдовикXXL
  * ```(?!шаблон)```  Негативный просмотр вперёд (с отрицанием)   ```Людовик(?!XVI)```  **Людовик**XV, ЛюдовикXVI, ЛюдовикXVIII, **Людовик**LXVII, **Людовик**XXL
  * ```(?<=шаблон)``` Позитивный просмотр назад   ```(?<=Сергей )Иванов```  Сергей **Иванов**, Игорь Иванов
  * ```(?<!шаблон)``` Негативный просмотр назад (с отрицанием)    ```(?<!Сергей )Иванов```  Сергей Иванов, Игорь **Иванов**

#### Поиск по условию

 * ```(?(?=если)то|иначе)``` Если операция просмотра успешна, то далее выполняется часть то, иначе выполняется часть иначе. В выражении может использоваться любая из четырёх операций просмотра. Следует учитывать, что операция просмотра нулевой ширины, поэтому части то в случае позитивного или иначе в случае негативного просмотра должны включать в себя описание шаблона из операции просмотра. ```(?(?<=а)м|п)```    **м**ам,**п**ап
 * ```(?(n)то|иначе)```  Если n-я группа вернула значение, то поиск по условию выполняется по шаблону то, иначе по шаблону иначе. ```(а)?(?(1)м|п)```  м**ам**,**п**а**п**

#### Рекурсия

#### Модификаторы

Модификаторы действуют с момента вхождения и до конца регулярного выражения или противоположного модификатора. Некоторые интерпретаторы могут применить модификатор ко всему выражению, а не с момента его вхождения.

 * i (PCRE_CASELESS) - нечувствительность выражения к регистру символов (англ. case insensitivity)
 * m (PCRE_MULTILINE) - Символы ^ и $ вызывают соответствие только (после и до символов новой строки|с началом и концом строки)
 * s (PCRE_DOTALL) - режим соответствия точки символам переноса строки и возврата каретки
 * x (PCRE_EXTENDED) - режим без учёта пробелов между частями регулярного выражения и позволяет использовать # для комментариев

 ```(?i-sm)```
 ```А(?#тут комментарий)Б```

##### Самостоятельно

 * e (PREG_REPLACE_EVAL)
 * A (PCRE_ANCHORED)
 * D (PCRE_DOLLAR_ENDONLY)
 * S
 * U (PCRE_UNGREEDY)
 * X (PCRE_EXTRA)
 * J (PCRE_INFO_JCHANGED)
 * u (PCRE_UTF8)

#### Функции для работы в php

 * ```string preg_quote ( string $str [, string $delimiter = null ] )```

Экранирует символы ```\ + * ? [ ^ ] $ ( ) { } = ! < > | : -``` в регулярных выражениях.


 * ```array preg_grep ( string $pattern , array $input [, int $flags = 0 ] )```

 * ```mixed preg_filter ( mixed $pattern , mixed $replacement , mixed $subject [, int $limit = -1 [, int &$count ]] )```
 * ```mixed preg_replace ( mixed $pattern , mixed $replacement , mixed $subject [, int $limit = -1 [, int &$count ]] )```

```php
<?php
$subject = array('1', 'а', '2', 'б', '3', 'А', 'Б', '4'); 
$pattern = array('/\d/', '/[а-я]/', '/[1а]/'); 
$replace = array('А:$0', 'Б:$0', 'В:$0'); 

print_r(preg_filter($pattern, $replace, $subject)); 

/*
Array
(
    [0] => А:В:1
    [1] => Б:В:а
    [2] => А:2
    [3] => Б:б
    [4] => А:3
    [7] => А:4
)
*/

print_r(preg_replace($pattern, $replace, $subject)); 

/*
Array
(
    [0] => А:В:1
    [1] => Б:В:а
    [2] => А:2
    [3] => Б:б
    [4] => А:3
    [5] => А
    [6] => Б
    [7] => А:4
)
*/
?>
```

 * ```array preg_split ( string $pattern , string $subject [, int $limit = -1 [, int $flags = 0 ]] )```

```php
<?php
$keywords = preg_split("/[\s,]+/", "hypertext language, programming");
print_r($keywords);
/*
Array
(
    [0] => hypertext
    [1] => language
    [2] => programming
)
*/

$str = 'string';
$chars = preg_split('//', $str, -1);
print_r($chars);
/*
Array
(
    [0] => 
    [1] => s
    [2] => t
    [3] => r
    [4] => i
    [5] => n
    [6] => g
    [7] => 
)
*/

$str = 'string';
$chars = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
print_r($chars);
/*
Array
(
    [0] => s
    [1] => t
    [2] => r
    [3] => i
    [4] => n
    [5] => g
)
*/

$regexp_code = "/( )/U";
$regexp_text = "abccaxcc fff";
$out = preg_split($regexp_code,$regexp_text, -1, PREG_SPLIT_DELIM_CAPTURE);
print_r($out);
/*
Array
(
    [0] => abccaxcc
    [1] =>  
    [2] => fff
)
*/

$regexp_code = "/( )/U";
$regexp_text = "abccaxcc fff";
$out = preg_split($regexp_code,$regexp_text, -1, PREG_SPLIT_OFFSET_CAPTURE|PREG_SPLIT_DELIM_CAPTURE);
print_r($out);
/*
Array
(
    [0] => Array
        (
            [0] => abccaxcc
            [1] => 0
        )

    [1] => Array
        (
            [0] =>  
            [1] => 8
        )

    [2] => Array
        (
            [0] => fff
            [1] => 9
        )

)
*/
?>
```

 * ```int preg_match ( string $pattern , string $subject [, array &$matches [, int $flags = 0 [, int $offset = 0 ]]] )```

```php
<?php
$subject = "abcdef";
$pattern = '/^def/';
preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE, 3);
print_r($matches);
/*
Array
(
)
*/

$subject = "abcdef";
$pattern = '/def/';
preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE, 3);
print_r($matches);
/*
Array
(
    [0] => Array
        (
            [0] => def
            [1] => 3
        )

)
*/

$subject = "abcdef";
$pattern = '/^def/';
preg_match($pattern, substr($subject,3), $matches, PREG_OFFSET_CAPTURE);
print_r($matches);
/*
Array
(
    [0] => Array
        (
            [0] => def
            [1] => 0
        )

)
*/
?>
```


 * ```int preg_match_all ( string $pattern , string $subject [, array &$matches [, int $flags = PREG_PATTERN_ORDER [, int $offset = 0 ]]] )```

```php
<?php
preg_match_all(
    "|<[^>]+>(.*)</[^>]+>|U",
    "<b>пример: </b><div align=left>это тест</div>",
    $out, 
    PREG_PATTERN_ORDER
);
print_r($out);
/*
Array
(
    [0] => Array
        (
            [0] => <b>пример: </b>
            [1] => <div align=left>это тест</div>
        )

    [1] => Array
        (
            [0] => пример: 
            [1] => это тест
        )

)
*/

preg_match_all(
    "|<[^>]+>(.*)</[^>]+>|U",
    "<b>пример: </b><div align=left>это тест</div>",
    $out, 
    PREG_SET_ORDER
);
print_r($out);

/*
Array
(
    [0] => Array
        (
            [0] => <b>пример: </b>
            [1] => пример: 
        )

    [1] => Array
        (
            [0] => <div align=left>это тест</div>
            [1] => это тест
        )

)
*/
?>
```
 * ```int preg_last_error ( void )```


#### Полезные ссылки

 * [Конструктор регулярных выражений](http://www.pcre.ru/eval/)
 * [Регулярные выражения](http://on-line-teaching.com/php/regexp.htm)
 * [Регулярные выражения (Wiki)](http://ru.wikipedia.org/wiki/%D0%A0%D0%B5%D0%B3%D1%83%D0%BB%D1%8F%D1%80%D0%BD%D1%8B%D0%B5_%D0%B2%D1%8B%D1%80%D0%B0%D0%B6%D0%B5%D0%BD%D0%B8%D1%8F)
