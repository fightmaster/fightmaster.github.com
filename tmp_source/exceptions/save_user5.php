<?php
$user = new User();
try {
    $result = $user->save(array());
} catch (PermissionDeniedException $e) {
    echo $e->getMessage();
} catch (ValidationException $e) {
    echo $e->getMessage();
}