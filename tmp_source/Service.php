<?php
/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
class Service
{
    //code
    /**
     * @var SortInterface
     */
    private $sortAlgorithm;

    public function __construct(SortInterface $sortAlgorithm)
    {
        $this->sortAlgorithm = $sortAlgorithm;
    }

    public function doSomething()
    {
        //code
        $sortAlgorithm->sort();
        //$shellSort = new ShellSort();
        //$shellSort->sort();

        //code
    }

    //code


}