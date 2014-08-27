<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class LaminatingMachine extends AbstractMachine
{
    /**
     * @return string
     */
    public function getType()
    {
        return self::LAMINATING_MACHINE;
    }
}