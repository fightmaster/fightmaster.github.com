<?php
/**
 * Dmitry Petrov <dmitry.petrov@opensoftdev.ru>
 */
$sortAlgorithm = new QuickSort();
//$sortAlgorithm = new ShellSort();
$service = new Service($sortAlgorithm);
$service->doSomething();
