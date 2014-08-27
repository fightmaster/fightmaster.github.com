<?php
namespace Fightmaster;

use Countable;

/**
 * Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class Collection implements Countable
{
    //code
    private $items = array();

    /**
     * @param mixed $item
     */
    public function add($item)
    {
        if (!$this->has()) {
            $this->items[] = $item;
        }
    }

    /**
     * @param mixed $item
     */
    public function remove($item)
    {
        if ($this->has()) {
            //code
        }
    }

    /**
     * @param boolean $item
     */
    public function has($item)
    {
        //code
    }

    /**
     * @return integer
     */
    public function count()
    {
        return count($this->items);
    }
}