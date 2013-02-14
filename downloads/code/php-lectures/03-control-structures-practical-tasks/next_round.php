<?php
//массив исходных данных
$basicData = array(
    //число k и массив очков в убывающем порядке
    array(5, array(10, 9, 8, 7, 7, 7, 5, 5)),//6 участников
    array(2, array(0, 0, 0, 0))//0 участников
    //ваши данные
);
foreach ($basicData as $inputData) {
    list($k, $points) = $inputData;
    $result = calculateMembersOfNextRound($k, $points);
    echo $result . \PHP_EOL;
}

function calculateMembersOfNextRound($k, $points)
{
    $membersOfNextRound = 0;
    //ваш код

    return $membersOfNextRound;
}
