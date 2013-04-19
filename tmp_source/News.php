<?php
class News implements Countable
{
    //code
    //code

    public function count()
    {
        return count($this->comments);
    }
}