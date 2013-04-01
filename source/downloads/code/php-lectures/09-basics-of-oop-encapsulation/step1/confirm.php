<?php
// тут какой-то код по подтверждению регистрации
//code
//code
//code

//завершение скрипта, отправка email
$subject = 'Регистрация нового пользователя';
$message = sprintf(
    '"%s" успешно зарагистрировался на сайте %s.',
    $_REQUEST['username'],
    'http://google.com'
);
$recipient = 'admin@google.com';
mail($recipient, $subject, $message);
