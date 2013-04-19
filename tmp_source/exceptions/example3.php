<?php
$calc = new Calculator();
$result = $calc->delete(10, 0);
if ($result === null) {
    echo 'Error';
}

echo $result;