<?php
//массив исходных данных
$basicData = array(
    array(4, 17),//8 операций
    array(5, 2),//4 операций
    array(1, 0)//0 оперций
    //ваши данные
);

foreach ($basicData as $inputData) {
    list($a, $b) = $inputData;
    $result = calculateOperations($a, $b);
    echo $result . \PHP_EOL;
}

function calculateOperations($a, $b)
{
    $numberOfOperations = 0;
    //ваш код

    return $numberOfOperations;
}
