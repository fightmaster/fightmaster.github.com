<?php
/**
 * Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class Service
{
    /**
     * @var SortInterface
     */
    private $sortAlgorithm;

    /**
     * @param SortInterface $sortAlgorithm
     */
    public function __construct(SortInterface $sortAlgorithm)
    {
        $this->sortAlgorithm = $sortAlgorithm;
    }

    public function doSomething()
    {
        //code        
        $this->sortAlgorithm->sort();
        //code
    }

    //code
}