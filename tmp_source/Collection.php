<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class Collection implements Countable, SortInterface
{
    /**
     * @var array
     */
    private $items = array();

    public function add($item)
    {
        $this->items[] = $item;
    }

    public function remove($item)
    {
        //code
    }

    public function count()
    {
        return count($this->items);
    }

    public function sort()
    {
        //code
    }
}