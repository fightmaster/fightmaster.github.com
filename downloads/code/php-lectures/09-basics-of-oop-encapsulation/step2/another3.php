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
