<?php
//код другого программиста
$title = 'Заголовок';
$msg = 'У вас новое сообщение';
$to = 'user@google.com';
mail($to, $title, $msg);
