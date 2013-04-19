<?php
class ChildClass extends ParentClass
{
    private $d = array();

    /**
     * @param array $d
     */
    public function setD($d)
    {
        if (!is_array($d)) {
            $d = array($d);
        }
        $this->d = $d;
    }

    /**
     * Description
     */
    public function myPrint()
    {
        echo get_class() . \PHP_EOL;
        $this->printVars();
        echo \PHP_EOL;
    }

    /**
     *
     */
    private function printVars()
    {
        printf(
            '$a = %s; $b = %s; $c = %s; $d = %s;',
            $this->a, $this->b ? 'true' : 'false', $this->c, print_r($this->d, true)
        );
    }
}
