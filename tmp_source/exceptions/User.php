<?php
class User
{
    public function save(array $userData)
    {

        if (!$this->isAdmin()) {
            return false;
        }

        if (!$this->isValidData($userData)) {
            return false;
        }
        //save

        return true;
    }

    private function isValidData(array $userData)
    {
        //code
        if ($userData['username'] == '') {
            return false;
        }
        if ($userData['password'] == '') {
            return false;
        }
        if (strlen($userData['password']) < 6) {
            return false;
        }

        return true;
    }

    private function isAdmin()
    {
        return isset($_SESSION['admin']) ? true : false;
    }
}