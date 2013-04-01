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
