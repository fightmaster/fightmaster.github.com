<?php
$user = new User();
$result = $user->save(array());
if ($result) {
    echo 'Saved';
} else {
    echo $result;
}