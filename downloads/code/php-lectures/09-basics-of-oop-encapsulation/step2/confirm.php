<?php
// тут какой-то код по подтверждению регистрации
//code
//code
//code

//завершение скрипта, отправка email
$mailService = new MailService();
$mailService->subject = 'Регистрация нового пользователя';
$mailService->message = sprintf(
    '"%s" успешно зарагистрировался на сайте %s.',
    $_REQUEST['username'],
    'http://google.com'
);
$mailService->recipient = 'admin@google.com';
$mailService->send();
