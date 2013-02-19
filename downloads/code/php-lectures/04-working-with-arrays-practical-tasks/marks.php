<?php
//массив исходных данных
$basicData = array(
    array(
        'Шелдон' => array(2, 2, 3),
        'Леонард' => array(2, 3, 2),
        'Пенни' => array(1, 1, 2),
        'Раджеш' => array(0, 0 , 0),
        'Говард' => array(0, 0 , 0)
    ),//Шелдон лучший в 1 и 3, Леонард - лучший в 1 и 2.
    //ваши данные
);
foreach ($basicData as $students) {
    $result = findSuccessfulStudents($students);
    var_dump($result);
}

function findSuccessfulStudents(array $students)
{
    $successfulStudents = array();
    //ваш код

    return $successfulStudents;
}
