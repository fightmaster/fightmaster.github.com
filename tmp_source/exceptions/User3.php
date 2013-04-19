<?php
class User
{
    public function save(array $userData)
    {

        if (!$this->isAdmin()) {
            return 'User is not admin';
        }

        $error = $this->isValidData($userData);
        if ($error !== true) {
            return 'Invalid data: ' . $error;
        }
        //save

        return true;
    }

    private function isValidData(array $userData)
    {
        //code
        if ($userData['username'] == '') {
            return 'Invalid username';
        }
        if ($userData['password'] == '') {
            return 'inalid password';
        }
        if (strlen($userData['password']) < 6) {
            return 'short password';
        }

        return true;
    }

    private function isAdmin()
    {
        return isset($_SESSION['admin']) ? true : false;
    }
}