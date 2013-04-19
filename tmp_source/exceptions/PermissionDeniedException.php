<?php
class PermissionDeniedException extends \Exception
{
    protected $message = 'User is not admin';
}