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
