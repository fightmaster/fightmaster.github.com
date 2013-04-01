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
