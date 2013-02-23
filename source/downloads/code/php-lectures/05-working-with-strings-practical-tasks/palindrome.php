<?php
//массив исходных данных
$basicData = array(
    array('Мачо, но по ночам.'),// YES
    array('Лев даму с ума свел'),//Yes
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
