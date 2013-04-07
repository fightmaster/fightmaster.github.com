<?php
class Square
{
    /**
     * @var float
     */
    public $a = 0;

    /**
     * @var float
     */
    public $b = 0;

    public function calculateSquare()
    {
        return $this->a * $this->b;
    }

    public function isQuadrate()
    {
        return $this->a == $this->b;
    }
}
