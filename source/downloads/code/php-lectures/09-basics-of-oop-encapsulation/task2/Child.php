<?php
class Child extends Parent
{
    public $d = array();

    public function _printVars()
    {
        printf(
            '$a = %s; $b = %s; $c = %s; $d = %d; $e = %e',
            $this->a, $this->b ? 'true' : 'false', $this->c, print_r($this->d, true)
        );
    }

    public function print()
    {
        echo get_class() . \PHP_EOL;
        $this->_printVars();
        echo \PHP_EOL;
    }
}
