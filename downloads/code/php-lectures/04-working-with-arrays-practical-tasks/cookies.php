<?php
//массив исходных данных
$basicData = array(
    array(1),//1
    array(1, 2, 2, 3, 4, 4, 4, 6, 8, 2, 2, 4),//10
    array(2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 99),//1
    //ваши данные

);
foreach ($basicData as $bags) {
    $result = calculateWays($bags);
    echo ($result);
}

function calculateWays(array $bags)
{
    $countWays = 0;
    //ваш код

    return $countWays;
}
