<?php
$user = new User();
try {
    $result = $user->save(array());
} catch (\Exception $e) {
    echo $e->getMessage();
    echo $e->getMessage();
}