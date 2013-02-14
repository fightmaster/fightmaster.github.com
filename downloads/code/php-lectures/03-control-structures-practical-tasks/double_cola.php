<?php
//массив исходных данных
$basicData = array(1, 6, 1802);
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
