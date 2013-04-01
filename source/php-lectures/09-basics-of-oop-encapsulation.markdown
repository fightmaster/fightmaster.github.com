---
layout: page
title: "Основы ООП. Инкапсуляция"
date: 2013-04-01 23:00
comments: false
sharing: true
footer: true    
sidebar: true
tags: [php,lectures,array]
lecture: true
---
### Краткое содержание лекции

[Теоретические задания](09-basics-of-oop-encapsulation-theoretical-tasks.html) |
[Практические задания](09-basics-of-oop-encapsulation-practical-tasks.html)

ООП говорят лежит или стоит на 3 китах: инкапсуляция, наследование и полиморфмизм. Мы рассмотрим все эти понятия с практической стороны на php примерах.

Что же такое инкапсуляция? Определение вам даст гугл, википедия и множество других ресурсов. Везде говорится о сокрытии свойств класса от внешнего мира, изолировании логики, сокрытии данных и т.д. Но я бы взял определение несколько шире, заявив, что сам класс является результатом инкапсуляции. Давайте рассмотрим это все на примерах.

Рассмотрим простейший пример. **Внимание, в реальной жизни примеры сложнее, а ситуации абсолютно идентичные ниже изложенной, учтите это.**

Допустим, что мы начинающий php-джуниор, а какой джуниор не пишет свою cms или сайт на plain php?
Как работает любая хорошая авторизация? Есть страница регистрации, в конце выполнения скрипта новому пользователю отправляется ссылка с подтверждением.

```php
<?php
//registration.php

// тут какой-то код по регистрации пользователя
//code
//code
//code

//завершение скрипта, отправка email
$subject = 'Подтверждение регистрации';
$message = 'Для успешной регистрации пройдите по ссылке http://google.com';
$recipient = 'vasya.pupkin@google.com';
mail($recipient, $subject, $message);
?>
```

Отлично! Спустя некоторое время, мы решили, что админу хорошо бы знать о новых зарегистрированных пользователях.
Что мы делаем? Естественно копируем-вставляем и решаем задачу за 2 минуты.

```php
<?php
//confirm.php

// тут какой-то код по подтверждению регистрации
//code
//code
//code

//завершение скрипта, отправка email
$subject = 'Регистрация нового пользователя';
$message = sprintf('"%s" успешно зарагистрировался на сайте %s.', $_REQUEST['username'], 'http://google.com');
$recipient = 'admin@google.com';
mail($recipient, $subject, $message);
?>
```

Спустя время, как это часто бывает, появляется новый функционал: бан пользователя. И мы хотим оповещать об этом забаненного пользователя.
Что делаем опять? Конечно, копируем и решаем задачу за 2 минуты. Но...

{% blockquote [Из книги Мартина Фаулера "Рефакторинг. Улучшение существующего кода."] %}
Вот руководящий совет, который дал мне Дон Робертс (Don Roberts). Делая что-то в первый раз, вы просто это делаете. Делая что-то аналогичное во второй раз, вы морщитесь от необходимости повторения, но все-таки повторяете то же самое. Делая что-то похожее в третий раз, вы начинаете рефакторинг.
{% endblockquote %}

Это правило трех ударов, и мы всегда им пользуемся на своем проекте. Давайте подумаем, а что можно изменить? Какая проблема стоит перед нами?
Вы не видите проблемы? В принципе ее сейчас практически нет. Давайте подумаем, где еще мы хотим слать емейлы.

 * Пришедшее новое личное сообщение
 * Кнопочка жалоба и оповещение админа
 * Обычная рассылка всем пользователям

Я думаю вы сами можете продолжить этот список. После этого у нас уже будет 6 мест, в которых один и тот же алгоритм.

А еще так часто бывает, что в 6 месте реализовывали не вы, а кто-то другой.

```php
<?php
//код другого программиста
$title = 'Заголовок';
$msg = 'У вас новое сообщение';
$to = 'user@google.com';
mail($to, $title, $msg);
?>
```

Какая новая проблема?

Подумали? Да, совершенно другой стиль в способе задания имен переменным, что усложняет рефакторинг. Ну это не аргумент, согласен, но может следующее тогда?

Однажды, вам или вашему заказчику пришла в голову идея. Что вот есть замечательная библиотека/компонента, которая выполняет тоже самое. И ее хочется использовать, ну очень хочется.
Но чтобы вам ее внедрить, вам необходимо исправить 3, 5, 10 классов, проделая там аналогичные операции, снова дублируя код. 
И никто не гарантирует, что после этого ваш код станет лучше, скорее всего он станет еще более запутанее и сложнее. 
Теперь использование сторонней библиотеки раскидано по всему вашему коду. А еще часто бывает, что появляется еще более крутая библиотека, и так далее...

**Я еще раз обращаю ваше внимание, что на этом месте мог быть алгоритм сортировки, расчет самого популярного товара в магазине, расчет статуса вип, расчет величины налога от мощности автомобиля и так далее.**

Так что будем делать?

Мое предложение, давайте вот весь этот небольшой алгоритм послания email инкапсулируем в какой-нибудь класс.

```php
<?php
/**
 * The service sends an email to user
 *
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class MailService
{
    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $message;

    /**
     * @var string
     */
    public $recipient;

    public function send()
    {
        mail($this->recipient, $this->subject, $this->message);
    }
}
?>
```

Посмотрим, каким стал код в наших файлах.

```php
<?php
//registration.php

// тут какой-то код по регистрации пользователя
//code
//code
//code

//завершение скрипта, отправка email
$mailService = new MailService();

$mailService->subject = 'Подтверждение регистрации';
$mailService->message = 'Для успешной регистрации пройдите по ссылке http://google.com';
$mailService->recipient = 'vasya.pupkin@google.com';
$mailService->send();
?>
```

```php
<?php
//confirm.php

// тут какой-то код по подтверждению регистрации
//code
//code
//code

//завершение скрипта, отправка email
$mailService = new MailService();
$mailService->subject = 'Регистрация нового пользователя';
$mailService->message = sprintf('"%s" успешно зарагистрировался на сайте %s.', $_REQUEST['username'], 'http://google.com');
$mailService->recipient = 'admin@google.com';
$mailService->send();
?>
```

```php
<?php
//код другого программиста
$mailService = new MailService();
$mailService->subject = 'Заголовок';
$mailService->message = 'У вас новое сообщение';
$mailService->recipient = 'user@google.com';
$mailService->send();
?>
```

Что получили мы в итоге всех манипуляций?

 * изолировали алгоритм - мы можем подменить алгоритм отправки email в любой момент, при этом код вне класса не изменится
 * унифицировали имена переменных

Мы произвели инкапсуляцию кода в класс, но мы только подошли к той инкапсуляции, о которой говорится в определениях.

Какая же скрытая проблема существует?

```php
<?php
//код другого программиста
$mailService = new MailService();
$mailService->subject = 'Заголовок';
$mailService->message = 'У вас новое сообщение';
$mailService->recipient = 'user@google.com';
$mailService->send();
//тут идет еще какой-то код
$mailService->subject = 'Заголовок';
$mailService->message = 'У вас новое сообщение';
$mailService->send();
//тут идет еще какой-то код
//и тут с течением времени остается следующая строка
$mailService->recipient = 'guest@google.com';

//тут снова код и спустя 100-200 строк
$mailService->subject = 'Секретное сообщение';
$mailService->message = 'Пароли всех пользвателей';
$mailService->send();
?>
```

или

```php
<?php
//код другого программиста
$mailService = new MailService();
$mailService->recipient = 'user@google.com';
//тут идет еще какой-то код
//тут идет еще какой-то код
//и тут с течением времени остается следующая строка
$mailService->recipient = 'unknown email';

//тут снова код и спустя 100-200 строк
$mailService->subject = 'Заголовок';
$mailService->message = 'Сообщение';
$mailService->send();
?>
```

Очень часто случается такая ситуация, что с течением временем в коде остаются ненужные и неиспользуемые строки.
Их удаляют, иногда лишь частями. Спустя год или два, происходит ситуация, когда информация в переменной совсем не та, которую вы ожидаете.
В первом примере мы послали все пароли какому-то гостю вместо админа.
Во втором примере вместо email адреса у нас какая-то строка, вместо email адреса. Ничего хорошего из это не выйдет.
При таком подходе мы не гарантируем нашему методу ```send``` достоверность и валидность используемых свойств.

Другой пример, вам необходимо изменить свойство ```$subject``` на ```$title```, у вас снова проблемы с поиском и заменой в существующем коде.

Инкапсуляция позволяет вам скрыть свойства класса и внутреннюю его реализацию от стороннего мира.

```php
<?php
/**
 * The service sends an email to user
 *
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class MailService
{
    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $recipient;

    /**
     * @param string $recipient
     * @param string $subject
     * @param string $message
     */
    public function __construct($recipient, $subject, $message)
    {
        $this->recipient = $recipient;
        $this->subject = $subject;
        $this->message = $message;
    }

    public function send()
    {
        mail($this->recipient, $this->subject, $this->message);
    }
}
?>
```

Изменим, последний раз наши plain php файлы. Шутка!

```php
<?php
//registration.php

// тут какой-то код по регистрации пользователя
//code
//code
//code

//завершение скрипта, отправка email

$subject = 'Подтверждение регистрации';
$message = 'Для успешной регистрации пройдите по ссылке http://google.com';
$recipient = 'vasya.pupkin@google.com';

$mailService = new MailService($recipient, $subject, $message);
$mailService->send();
?>
```

```php
<?php
//confirm.php

// тут какой-то код по подтверждению регистрации
//code
//code
//code

//завершение скрипта, отправка email
$subject = 'Регистрация нового пользователя';
$message = sprintf('"%s" успешно зарагистрировался на сайте %s.', $_REQUEST['username'], 'http://google.com');
$recipient = 'admin@google.com';

$mailService = new MailService($recipient, $subject, $message);
$mailService->send();
?>
```

```php
<?php
//код другого программиста
$subject = 'Заголовок';
$message = 'У вас новое сообщение';
$recipient = 'user@google.com';

$mailService = new MailService($recipient, $subject, $message);
$mailService->send();
?>
```

Что скажете теперь? Вообще-то, получился какой-то отстой. Что делать, если мы в одном скрипте захотим послать 2 email?
Создавать новый экземпляр класса? Давайте значит производить снова рефакторинг кода.

```php
<?php
/**
 * The service sends an email to user
 *
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class MailService
{
    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $recipient;

    /**
     * @param string $subject
     * @return MailService
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @param string $recipient
     * @return MailService
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;

        return $this;
    }

    /**
     * @param string $message
     * @return MailService
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function send()
    {
        mail($this->recipient, $this->subject, $this->message);
    }
}
?>
```

```php
<?php
//registration.php

// тут какой-то код по регистрации пользователя
//code
//code
//code

//завершение скрипта, отправка email

$mailService = new MailService($recipient, $subject, $message);
$mailService->setRecipient('vasya.pupkin@google.com')
    ->setSubject('Подтверждение регистрации')
    ->setMessage('Для успешной регистрации пройдите по ссылке http://google.com');
$mailService->send();
?>
```

```php
<?php
//confirm.php

// тут какой-то код по подтверждению регистрации
//code
//code
//code

//завершение скрипта, отправка email
$subject = 'Регистрация нового пользователя';
$message = sprintf('"%s" успешно зарагистрировался на сайте %s.', $_REQUEST['username'], 'http://google.com');
$recipient = 'admin@google.com';

$mailService = new MailService($recipient, $subject, $message);
$mailService->setRecipient($recipient)
    ->setSubject($subject)
    ->setMessage($message);
$mailService->send();
?>
```

```php
<?php
//код другого программиста
$subject = 'Заголовок';
$message = 'У вас новое сообщение';
$recipient = 'user@google.com';

$mailService = new MailService($recipient, $subject, $message);
$mailService->setRecipient($recipient)
    ->setSubject($subject)
    ->setMessage($message);
$mailService->send();
?>
```

Теперь мы можем смело производить внутри класса и алгоритма любые изменения.
Давайте изменим свойство ```$subject``` на ```$title```, а также алгоритм отправки сообщения.

```php
<?php
/**
 * The service sends an email to user
 *
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class MailService
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $recipient;

    /**
     * @deprecated
     * @param string $subject
     * @return MailService
     */
    public function setSubject($subject)
    {
        $this->title = $subject;

        return $this;
    }

    /**
     * @param string $title
     * @return MailService
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $recipient
     * @return MailService
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;

        return $this;
    }

    /**
     * @param string $message
     * @return MailService
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function send()
    {
        mail('super-admin@yandex.ru', $this->subject, $this->message);
        mail($this->recipient, $this->subject, $this->message);
    }
}
?>
```

Ха, ну и самое приятное, остальной код нам не нужно изменять... Ну как-то так, вроде и первоначальных код не вырос сильно, и мы получили некоторые преимущества. **Какие?**

Самый большой бонус, мы теперь легко можем написать юнит тесты к нашему классу и методу send.
После этого, мы будем точно уверены, что во всех 10 местах наше приложение работает совершенно корректно.