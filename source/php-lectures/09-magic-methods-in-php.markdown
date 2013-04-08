---
layout: page
title: "Магия в PHP"
date: 2013-04-09 03:00
comments: false
sharing: true
footer: true
sidebar: true
tags: [php,lectures,oop,magic methods]
lecture: true
---
### Краткое содержание лекции

[Теоретические задания](09-magic-methods-in-php-theoretical-tasks.html) |
[Практические задания](09-magic-methods-in-php-practical-tasks.html)

Магические методы вызываются самим PHP при определенных обстоятельствах, начинаются с символа ```__```.
Мое мнение, что наличие некоторых из них в вашем коде, может заставить тимлида выписать вам направление к врачу.

#### ```__construct()```

 * Вызывается при инстанцировании объекта
 * Полезен при необходимости задать первоначальное состояние объекта
 * Используется при внедрении зависимости через конструктор

```php
<?php
class Test
{
    /**
     * @var \DateTime
     */
    private $creaionDate;

    public function __construct()
    {
        $this->creationDate = new DateTime();
    }
}
?>
```

```php
<?php
class Test
{
    /**
     * @var \Service
     */
    private $service;

    public function __construct(\Service $service)
    {
        $this->service = $service;
    }
}
?>
```

#### ```__destruct()```

 * Деструктор будет вызван при освобождении всех ссылок на определенный объект или при завершении скрипта.
 * Порядок выполнения деструкторов не гарантируется.
 * Полезен, если ваш класс использует в своих свойствах тип данных ```resource```.


```php
<?php
class Test
{
    /**
     * @var resource
     */
    private $file;

    public function __construct()
    {
        $this->file = fopen('/tmp/log.txt', 'w');
    }

    public function __destruct()
    {
        fclose($this->file);
    }
}
?>
```


#### ```__call()```, ```__callStatic()```

 * В контексте объекта при вызове недоступных методов вызывается метод ```__call()```.
 * В статическом контексте при вызове недоступных методов вызывается метод ```__callStatic()```.
 * Примененимо при лжерефакторинге.
 * При желании проглатывать всевозможные методы, возможно, soap service?

```php
<?php
class Test
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string $method
     * @var array $args
     */
    public function __call($method, $args)
    {
        if ($method == 'getName') {
            return $this->getUsername();
        }

        return false;
    }

    public function getUsername()
    {
        return $this->username;
    }
}
?>
```

```php
<?php
class Test
{
    /**
     * @var string $method
     * @var array $args
     */
    public function __call($method, $args)
    {
      echo "unknown method " . $method;

      return false;
    }
}
?>
```


#### ```__get()```, ```__set()```, ```__isset()```, ```__unset()```

 * Вызываются при обращении к несуществующему/недоступному свойству класса.
 * Примененимо при лжерефакторинге.
 * Применимо при попытки избавиться от сеттеров и геттеров.
 * Грозит потерей инкапсуляции


```php
<?php
class Test
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string $name
     */
    public function __get($name)
    {
        if ($name == 'name') {
            return $this->username;
        }

        return false;
    }
}
?>
```

```php
<?php
$test = new Test();
echo $test->name;
?>
```

```php
<?php
class Test {
    private $firstField;
    private $secondField;

    public function __get($property) {
            if (property_exists($this, $property)) {
                return $this->$property;
            }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
}
?>
```

```php
<?php
$test = new Test();
echo $test->name;
$test->firstField = 12;
echo $test->firstField;
?>
```

#### ```__sleep()```, ```__wakeup()```

 * ```__sleep()``` вызывается до сериализации при вызове ```serialize```
 * Используется для завершении работы над данными
 * При желании сериализовать объект лишь частично
 * ```__wakeup()``` вызывается при вызове ```unserialize()```
 * При желании восстановить какие-нибудь соединения

```php
<?php
//Example from http://php.net/manual/ru/language.oop5.magic.php
class Connection
{
    protected $link;
    private $server, $username, $password, $db;
    
    public function __construct($server, $username, $password, $db)
    {
        $this->server = $server;
        $this->username = $username;
        $this->password = $password;
        $this->db = $db;
        $this->connect();
    }
    
    private function connect()
    {
        $this->link = mysql_connect($this->server, $this->username, $this->password);
        mysql_select_db($this->db, $this->link);
    }
    
    public function __sleep()
    {
        return array('server', 'username', 'password', 'db');
    }
    
    public function __wakeup()
    {
        $this->connect();
    }
}
?>
```

#### ```__clone()```

 * Вызывается при завершении клонирования у свежесозданной копии объекта, для возможного изменения всех необходимых свойств.


#### ```__toString()```

 * Вызывается при попытке преобразовать объект в строку
 * Разумное применение, когда объект имеет строкове представление

```php
<?php
class News
{
    public $id;

    public function __toString()
    {
        return 'News #' . $this->id;
    }
}
?>
```

```php
<?php
$news = new News();
$news->id = 5;
echo $news;
?>
```

```php
<?php
class Workflow
{
    private $action;

    private $status;

    /**
     * Converts workflow string to class attibutes 
     * "is ready for:printing"
     *
     * @param string $workflowAsString
     */
    public function __construct($workflowAsString)
    {
        $tmp = explode(':', $workflowAsString);
        $this->status = $tmp[0];
        $this->action = $tmp[1];
        unset($tmp);
    }

    public function __toString()
    {
        return $this->status . ':' . $this->action;
    }
}
?>
```

#### ```__invoke()```

 * Вызывается при попытке выполнить объект как функцию.

```php
<?php
class News
{
    public $id;

    public function __invoke($value)
    {
        $this->id = $value;
    }
}
?>
```

```php
<?php
$news = new News();
$news(45);
echo $news->id;
?>
```

#### ```__set_state()```

 * Вызывается для тех классов, которые экспортируются функцией ```var_export()``` начиная с PHP 5.1.0.

#### Полезные ссылки

 * [9 Magic Methods in PHP](http://www.lornajane.net/posts/2012/9-magic-methods-in-php)