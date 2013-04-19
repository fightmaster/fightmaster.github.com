<?php
class WorkflowService
{
    public function doAction(WorkflowObjectInterface $workflowObject)
    {
        $workflowObject->getCurrentFulfillmentAction();
    }
}