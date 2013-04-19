<?php
class Calculator
{
    public function delete($a, $b)
    {
        if ($b === 0) {
            return null;
        }

        return $a / $b;
    }
}