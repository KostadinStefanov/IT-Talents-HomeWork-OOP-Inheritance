<?php


class Task
{
    private $name;
    private $workingHours;

    public function __construct ($nameofTask , $hoursToComplete)
    {
        $this->name= $nameofTask;
        $this->workingHours = $hoursToComplete;
    }


    public function getName()
    {
        return $this->nameofTask;
    }

    public function getWorkingHours ()
    {
        return $this->workingHours;
    }


    public function setWorkingHours( $workingHours)
    {
        $this->workingHours = $workingHours;
    }
}