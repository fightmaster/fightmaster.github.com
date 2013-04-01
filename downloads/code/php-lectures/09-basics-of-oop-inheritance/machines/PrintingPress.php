<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class PrintingPress extends AbstractMachine
{
    /**
     * @var integer
     */
    private $speed;

    /**
     * @return boolean
     */
    public function isDuplexPrinting()
    {
        return true;
    }

    /**
     * @return boolean
     */
    public function isQuickPrint()
    {
        return true;
    }

    /**
     * @return integer
     */
    public function getSpeed()
    {
        return true;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return self::PRINTING_PRESS;
    }
}