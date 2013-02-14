<?php
//массив исходных данных
$basicData = array(
    1, //Шелдон
    6, //Шелдон
    1802 //Пенни
);
foreach ($basicData as $n) {
    $result = getNameByNumber($n);
    echo $result . \PHP_EOL;
}

function getNameByNumber($n)
{
    $queue = array('Шелдон', 'Леонард', 'Пенни', 'Раджеш', 'Говард');
    $name = '';
    //ваш код

    return $name;
}
