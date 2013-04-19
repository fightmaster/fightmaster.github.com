<?php
interface WorkflowObjectInterface
{
    public function getFulfillmentActions();

    public function findNextFulfillmentAction();

    public function getCurrentFulfillmentAction();
}