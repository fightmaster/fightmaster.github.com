<?php
$calc = new Calculator();
try {
    $result = $calc->delete(10, 0);
    echo $result;
} catch (\InvalidArgumentException $e) {
    echo $e->getMessage();
}