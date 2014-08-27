<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class UvPress extends AbstractMachine
{
    /**
     * @return string
     */
    public function getType()
    {
        return self::UV_PRESS;
    }
}