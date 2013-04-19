<?php
$user = new User();
if ($user->save(array())) {
    echo 'Saved';
} else {
    echo 'Could not save';
}