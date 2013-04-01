<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class Copier extends AbstractMachine
{
    /**
     * @return string
     */
    public function getType()
    {
        return self::COPIER;
    }

    /**
     * @return integer
     */
    public function getPrintingSpeed()
    {
        return 100;
    }

    /**
     * @return integer
     */
    public function getScanSpeed()
    {
        return 10;
    }
}