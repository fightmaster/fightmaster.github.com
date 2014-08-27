<?php
//код другого программиста
$mailService = new MailService();
$mailService->subject = 'Заголовок';
$mailService->message = 'У вас новое сообщение';
$mailService->recipient = 'user@google.com';
$mailService->send();
