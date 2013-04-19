<?php
class Workflow
{
    private $status;
    private $action;

    public function __construct($workflowString)
    {
        $tmp = explode(':', $workflowString);
        $this->status = $tmp[0];
        $this->action = $tmp[1];
        unset($tmp);
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function __toString()
    {
        return $this->status . ':' . $this->action;
    }

    public function __set_state()
    {
        $this->status = 11111111111;
    }
}