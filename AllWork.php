<?php

const TASK_NUM = 10;

class AllWork
{
    private $tasks ;
    private $freePlacesForTasks;
    private $nextUnassignedTask;


    public function __construct ()
    {
        $this->tasks = [];
        $this->freePlacesForTasks = TASK_NUM ;
        $this->nextUnassignedTask ;
    }

    public function addTask($newTask)
    {
        $this->tasks[] = $newTask;

    }


    public function getNextTask()
    {
        return $this->$nextUnassignedTask;
    }


    public function setAllTasks($tasks)
    {
        $this->tasks = $tasks;
        $this->nextUnassignedTask = reset($tasks);
    }

    public function getAlltasks()
    {
        return $this->tasks;

    }

    public function deleteCurrent($elementName)
    {
        unset ($this->tasks["$elementName"]);
    }

    public function isAllWorkDone()
    {
        return empty($this->tasks);
    }

}