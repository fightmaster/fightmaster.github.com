<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class User extends BasicUser
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    //another methods
}