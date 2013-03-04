<?php
//массив исходных данных
$basicData = array(
    array('Мачо, но по ночам.'),// YES
    array('Лев с ума даму свел'),//YES
    array('Пеле нелеп'),//YES
    //ваши данные

);
foreach ($basicData as $word) {
    $result = isPalindrome($word);
    echo ($result) ? 'YES' : 'NO';
    echo \PHP_EOL;
}

function isPalindrome($word)
{
    $isPalindrome = false;
    //ваш код

    return $isPalindrome;
}
