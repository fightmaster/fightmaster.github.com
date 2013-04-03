<?php
//registration.php

// тут какой-то код по регистрации пользователя
//code
//code
//code

//завершение скрипта, отправка email
$mailService = new MailService();
$mailService->setRecipient('vasya.pupkin@google.com')
    ->setSubject('Подтверждение регистрации')
    ->setMessage('Для успешной регистрации пройдите по ссылке http://google.com');
$mailService->send();
