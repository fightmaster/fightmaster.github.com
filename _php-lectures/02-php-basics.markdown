---
layout: page
title: "Основы PHP"
date: 2013-02-11 22:44
comments: false
sharing: true
footer: true
sidebar: true
tags: [php,lectures]
lecture: true
---
### Краткое содержание лекции

[Теоретические задания](02-php-basics-theoretical-tasks.html) |
[Практические задания](02-php-basics-practical-tasks.html)

 * Синтаксис
    * PHP теги
        * long tags
        * short tags
        * script tags
        * ASP tags
        * best practice
    * Комментарии
        * single line
        * multi-line
        * особенности single line комментариев
        * best practice
            * phpdoc
            * когда нужно писать комментарии
            * когда не нужно писать комментарии
 * Переменные
    * допустимые имена переменных
    * Типы данных
        * Скалярные
            * string
                * не забыть про unicode
                * не забыть про лимит
                * quoted
                    * single quotes
                    * double quotes
                    * Heredoc
                    * Nowdoc (5.3)
            * integer
                * decimal
                * hexadecimal
                * octal
                * platform dependent
            * float (double)
                * standard decimal notations
                * scientific notations (1.2e3, 7E-10)
            * boolean
                * integer cast
                * case-insensitive
                * best practice
        * Составные
            * array
            * object
        * Специальные
            * resource
            * null
                * определение
                * приведение к null
        * приведение типов данных
    * переменная от переменной
    * функции по работе с переменными
        * boolval, floatval, doubleval, intval, strval
        * empty, isset, get_defined_vars
        * gettype. get_resource_type, settype
        * is_bool
        * is_int, is_integer, is_long
        * is_float, is_double, is_real
        * is_string
        * is_numeric
        * is_scalar
        * is_array
        * is_object
        * is_resource
        * is_callable
        * is_null
        * print_r, var_dump, var_export, debug_ zval_ dump
        * unset

    * best practice
        * camalCase
        * как не нужно называть переменные
 * Константы
    * свойства
    * define
    * const
    * best practice
 * Операторы
    * Присваивания
        * Оперетор =
        * Оператор = и &
    * Арифметические
        * "+", "-", "%", "*", "/"
        * пост и пре инкремент
        * оператор +=
    * Строковые
        * конкатенация строк
    * Побитовые
        * Сдвиг вправо
        * Сдвиг влево
    * Логические
        * AND
        * OR
        * XOR
        * NOT
    * Сравнения
        * == vs ===
    * Другие
        * @
        * backticks
        * instanceof
