---
layout: page
title: "Исключения в PHP"
date: 2013-04-16 03:00
comments: false
sharing: true
footer: true
sidebar: true
tags: [php,lectures,oop,exceptions]
lecture: true
---
### Краткое содержание лекции

[Теоретические задания](09-exceptions-theoretical-tasks.html) |
[Практические задания](09-exceptions-practical-tasks.html)

```php
<?php
Exception
{
/* Properties */
protected string $message ;
protected int $code ;
protected string $file ;
protected int $line ;
/* Methods */
public __construct ([ string $message = "" [, int $code = 0 [, Exception $previous = NULL ]]] )
final public string getMessage ( void )
final public Exception getPrevious ( void )
final public mixed getCode ( void )
final public string getFile ( void )
final public int getLine ( void )
final public array getTrace ( void )
final public string getTraceAsString ( void )
public string __toString ( void )
final private void __clone ( void )
}
?>
```

```php
<?php
try {
    //code
    throw new \Exception("Error Processing Request", 1);
} catch (\Exception $e) {
    throw new \MyException("Error Processing Request", 1, $e);
}
?>
```

```php
<?php
//php 5.5
try {
    throw new \Exception("Error Processing Request", 1);
    //code
} catch (\Exception $e) {
    throw new \Exception("Error Processing Request", 1, $e);
} finally {
    echo 'You see this text always.';
}
?>
```

#### Собственное исключение

```php
<?php
class MyException extends Exception
{
}
?>
```

```php
<?php
try {
    if ($result == false) {
        throw new MyException('Throw MyException');
    }
} catch (MyException $e) {
    echo $e->getMessage() . \PHP_EOL;
    echo $e->getTraceAsString();
}
?>
```

```php
<?php
try {
    if ($result == false) {
        throw new MyException('Throw MyException');
    } else {
        throw new \Exception('Throw Exception');
    }
} catch (MyException $e) {
    echo $e->getMessage() . \PHP_EOL;
    echo $e->getTraceAsString();
} catch (\Exception $e) {
     echo $e->getMessage() . \PHP_EOL;
     echo $e->getTraceAsString();
}
?>
```

#### SPL

 * Exception
     * LogicException
         * BadFunctionCallException
             * BadMethodCallException
         * DomainException
         * InvalidArgumentException
         * LengthException
         * OutOfRangeException
     * RuntimeException
         * OutOfBoundsException
         * OverflowException
         * RangeException
         * UnderflowException
         * UnexpectedValueException
