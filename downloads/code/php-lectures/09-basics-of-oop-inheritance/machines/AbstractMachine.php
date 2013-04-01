<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
abstract class AbstractMachine
{
    const PRINTING_PRESS = 'printing press';
    const UV_PRESS = 'uv press';
    const LAMINATING_MACHINE = 'laminating machine';
    const COPIER = 'copier';

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $vendorName;

    /**
     * @var integer
     */
    private $year;

    /**
     * @return string
     */
    abstract public function getType();

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getVendorName()
    {
        return $this->vendorName;
    }

    /**
     * @param string $vendorName
     */
    public function setVendorName($vendorName)
    {
        $this->vendorName = $vendorName;
    }

    /**
     * @return integer
     */
    public function getYear()
    {
        return $this->name;
    }

    /**
     * @param integer $year
     */
    public function setName($year)
    {
        $this->year = $year;
    }
}
