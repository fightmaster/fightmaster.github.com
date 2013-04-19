<?php
class Calculator
{
    /**
     * @throws \InalidArgumentException
     */
    public function delete($a, $b)
    {
        if ($b === 0) {
            throw new \InvalidArgumentException();
        }

        return $a / $b;
    }
}