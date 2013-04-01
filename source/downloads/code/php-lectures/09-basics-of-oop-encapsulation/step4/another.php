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
