<?php
namespace Fightmaster;

use Countable;

/**
 * Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class News implements Countable
{
    //code

    /**
     * @return integer
     */
    public function count()
    {
        return count($this->comments);
    }
}