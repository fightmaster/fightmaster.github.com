---
layout: page
title: "Объекты и классы в PHP. Основы синтаксиса"
date: 2013-03-31 23:30
comments: false
sharing: true
footer: true
sidebar: true
tags: [php,lectures]
---
### Теоретические задания

[Краткое содержание лекции](09-objects-and-classes-basic-syntax.html) |
[Практические задания](09-objects-and-classes-basic-syntax-practical-tasks.html)

 1. Какие имена классов являются валидными?
    1. ```_test ```
    1. ```test_```
    1. ```Test_```
    1. ```Test```
    1. ```1Test```
    1. ```Test1```
    1. ```_Хлеб```
    1. ```Хл$b```
    1. ```Bre$ad```
 2. Какие способы объявления аттрибута класса валидны? Какие из них не рекомендуются?
    2. ```public $attribute;```
    2. ```public $_attribute;```
    2. ```public $Attribute;```
    2. ```public $UserInfo;```
    2. ```public $userInfo;```
    2. ```public $userInfo = array();```
    2. ```public static $userInfo;```
    2. ```static public $userInfo;```
    2. ```var $attribute;```
    2. ```private $attribute;```
    2. ```$attribute;```
    2. ```private static $attribute;```
    2. ```protected $attribute;```
    2. ```final protected $attribute;```
    2. ```final public $attribute;```
    2. ```final private $attribute;```
    2. ```abstract private $attribute;```
 3. Какие способы объявления методов класса валидны? Какие из них не рекомендуются?
    3. ```function 101advice() {}```
    3. ```public function getadvice() {}```
    3. ```public function getAdvice() {}```
    3. ```function getAdvice() {}```
    3. ```final private getAdvice() {}```
    3. ```final private static getAdvice() {}```
    3. ```abstract protected static function() {}```
 4. В классе ```Test``` объявлена статическая переменная ```$value = 5;```. Какие способы обращения к этой переменной валидны?
    4. ```echo Test::$value;```
    4. ```echo Test::value;```
    4. ```echo Test::$VALUE;```
    4. ```echo TEST::$value;```
    4. ```$test = new Test(); echo $test::$value;```
    4. ```$test = new Test(); echo $test->$value;```
 5. Какие объявления конструктора в классе ```Test``` являются невалидными?
    5. ```function __construct() {}```
    5. ```public function __construct() {}```
    5. ```protected function __construct() {}```
    5. ```private function __construct() {}```
    5. ```public function __construct($attribute1, $attribute2 = 5) {}```
    5. ```function Test() {}```
    5. ```function TEST() {}```
 6. Какие объявления класса являются валидными и при каких условиях?
    6. ```class User {}```
    6. ```abstract class User {}```
    6. ```final abstract class User {}```
    6. ```final class User {}```
    6. ```private class User {}```
    6. ```class User extends BaseUser {}```
    6. ```abstract class User extends BaseUser {}```
    6. ```abstract class User extends BaseUser, NullUser {}```
    6. ```class User extends BaseUser implements Signed {}```
    6. ```class User extends BaseUser implements SignedInterface {}```
    6. ```class User extends BaseUser implements SignedInterface, AclInterface, NullableInterface {}```
    6. ```abstract class User extends BaseUser implements SignedInterface {}```
 7. Что такое пространство имен? Для чего нужно и как подключить класс из другого пространства имен?