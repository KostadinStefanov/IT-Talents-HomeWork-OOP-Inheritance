<?php
require_once ('Alltasks.php');

class Employee
{
    private $name;
    private $currentTask;
    private $hoursLeft;
    private $allWork;
    private $hoursToFinish;
    private $currentTaskName;
    private $currentTaskTime;
    private $hasWorkToFinish;
    private $arrUnfinishedWorkFromYesterday;


    public function __construct ($name)
    {
        $this->name = $name;
        $this->hoursLeft = 8;
        $this->allWork = new AllWork();
        $this->currentTask;
        $this->hoursToFinish;
        $this->arrUnfinishedWorkFromYesterday = array ();

    }



    public function work()
    {

        //Check if the employee HAS WORK TO FINISH
        if ( $this->getHasWorkToFinish() ) {

            //Output "Is stil working on ..."
            echo "<br><b>" . $this->name . "</b> is still working on ". $this->getUnfinishedWorkFromYesterdayTaskName(). " for "
                . $this->getUnfinishedWorkFromYesterdayTaskTime(). " hours . " ;

            //Update hours left :
            $timeleft = 8 - $this->getUnfinishedWorkFromYesterdayTaskTime();
            $this->setHoursLeft($timeleft);

            //Calculate working hours for the current day
            do {

                //If employee HAS time for the task until the end of the day :
                if ( $this->getHoursLeft() >=  $this->getCurrentTaskTime()  ){

                    //Output assignment ( "Assigning Task_number to Employee "  )
                    echo "<br>Assigning ".$this->getCurrentTaskName(). " to <b>".$this->name . "</b> . <br>";

                    //Output: "Employee_name is working on  name of task and number of hours "
                    echo "<b>". $this->getName(). "</b> is working on " . $this->getCurrentTaskName(). " for ". $this->getCurrentTaskTime(). " hours.<br>";

                    //Update hours left for today
                    $this->setHoursLeft($this->getHoursLeft() - $this->getCurrentTaskTime());
                    echo "Hours left for today : ". $this->getHoursLeft(). "<br>";
                    // Get a new task from the list

                    //delete the current element of the array
                    $this->allWork->deleteCurrent($this->getCurrentTaskName());

                }else{
                    // If employee DOES NOT HAVE time for the task until the end of the day :
                    // Output assignment ( "Assigning Task_number to Employee "  )
                    echo "<br>Assigning ".$this->getCurrentTaskName(). " to <b>".$this->name . "</b> . <br>";

                    //Output the name of task and number of hours
                    echo "<b>".$this->getName(). "</b> is working on " . $this->getCurrentTaskName(). " for ". $this->getHoursLeft(). " hours. <br>";

                    // Hours left for next day :
                    $hoursLeft = abs( $this->getHoursLeft() - $this->getCurrentTaskTime() ) ;
                    //echo "Hours left to finish on next day (second condition) : ".$hoursLeft . "<br>";

                    //Set hours left
                    $this->setHoursToFinish($hoursLeft);
                    echo "Hours to finish on next day  :".$this->getHoursToFinish() ;

                    //Get the reamining hours for the next day
                    $timeOfTask = $this->getHoursToFinish();
                    //Get name of the current task to send to setUnfinishedWorkFromYesterday()
                    $nameOfTask = $this->getCurrentTaskName();

                    $this->setUnfinishedWorkFromYesterday($nameOfTask, $timeOfTask);
                    $this->setHasWorkToFinish(true);
                    //Delete the current task
                    $this->allWork->deleteCurrent($this->getCurrentTaskName());
                    break;
                }

            }while ($this->getHoursLeft()  > 0 );

        }else {

            // If emplloyee DOES NOT HAVE work to finish:

            //Calculate working hours for the current day
            do {
                //If employee HAS time for the task until the end of the day :
                if ( $this->getHoursLeft() >=  $this->getCurrentTaskTime()  ){

                    //Output assignment ( "Assigning Task_number to Employee "  )
                    echo "<br>Assigning ".$this->getCurrentTaskName(). " to <b>".$this->name . "</b> . <br>";

                    //Output: "Employee_name is working on  name of task and number of hours "
                    echo "<b>". $this->getName(). "</b> is working on " . $this->getCurrentTaskName(). " for ". $this->getCurrentTaskTime(). " hours.<br>";

                    //Update hours left for today
                    $this->setHoursLeft($this->getHoursLeft() - $this->getCurrentTaskTime());
                    echo "Hours left for today : ". $this->getHoursLeft(). "<br>";
                    // Get a new task from the list

                    //delete the current element of the array
                    $this->allWork->deleteCurrent($this->getCurrentTaskName());

                }else{

                    // If employee DOES NOT HAVE  time for the task until the end of the day :
                    //Output assignment ( "Assigning Task_number to Employee "  )
                    echo "<br>Assigning ".$this->getCurrentTaskName(). " to <b>".$this->name . "</b> . <br>";

                    //Output the name of task and number of hours
                    echo "<b>" . $this->getName(). "</b> is working on " . $this->getCurrentTaskName(). " for ". $this->getHoursLeft(). " hours. <br>";

                    // Hours left for next day :
                    $hoursLeft = abs( $this->getHoursLeft() - $this->getCurrentTaskTime() ) ;
                    //echo "Hours left to finish on next day (second condition) : ".$hoursLeft . "<br>";

                    //Set hours left
                    $this->setHoursToFinish($hoursLeft);
                    echo "Hours to finish on next day  :".$this->getHoursToFinish();

                    //Get the reamining hours for the next day
                    $timeOfTask = $this->getHoursToFinish();
                    //Get name of the current task to send to setUnfinishedWorkFromYesterday()
                    $nameOfTask = $this->getCurrentTaskName();

                    $this->setUnfinishedWorkFromYesterday($nameOfTask, $timeOfTask);
                    $this->setHasWorkToFinish(true);
                    //Delete the current task
                    $this->allWork->deleteCurrent($this->getCurrentTaskName());
                    break;
                }
            }while ($this->getHoursLeft()  > 0 );
        }
    }
    public function setHasWorkToFinish ($par)
    {
        $this->hasWorkToFinish = $par;

    }

    public function getHasWorkToFinish()
    {
        return $this->hasWorkToFinish;
    }




    public function setUnfinishedWorkFromYesterday ($unfinishedTaskName , $unfinishedTaskTime){

        $this->arrUnfinishedWorkFromYesterday = ["$unfinishedTaskName" => "$unfinishedTaskTime" ];

    }

    public function getUnfinishedWorkFromYesterday ()
    {

        return $this->arrUnfinishedWorkFromYesterday;
    }

    public function getUnfinishedWorkFromYesterdayTaskName ()
    {
        foreach ( $this-> getUnfinishedWorkFromYesterday () as $key=>$value) {
            return $key;
        }

    }

    public function getUnfinishedWorkFromYesterdayTaskTime ()
    {
        foreach ( $this-> getUnfinishedWorkFromYesterday () as $key=>$value) {
            return $value;
        }

    }


    public function startWorkingDay()
    {
        $this->setHoursLeft( 8 );

    }


    public function getName()
    {
        return $this->name;
    }


    public function getCurrentTaskName()
    {


        foreach ($this->allWork->getAlltasks()  as $key =>$value ){
            $this->currentTaskName = $key;
            break;
        }
        return $this->currentTaskName;

    }

    public function setCurrentTask($currentTask)
    {
        $this->currentTask = $currentTask;
    }


    public function getCurrentTaskTime()
    {

        foreach ( $this->getAllowork() as $key =>$value ){

            $this->currentTaskTime = $value;
            break;
        }

        return $this->currentTaskTime;
    }


    public function setHoursLeft($n)
    {
        $this->hoursLeft = $n;
    }

    public function getHoursLeft()
    {
        return $this->hoursLeft;
    }



    public function setTask($allTasks)
    {
        $this->allTasks = $allTasks;

    }


    public function setAllwork($tasks)
    {
        $this->allWork->setAllTasks($tasks);
    }

    public function getAllowork()
    {
        return $this->allWork->getAlltasks() ;
    }

    public function setHoursToFinish($hoursToFinish){
        $this->hoursToFinish = $hoursToFinish;
    }

    public function getHoursToFinish()
    {
        return $this->hoursToFinish;
    }

    public function isAllWorkDone ()
    {
        if ($this->allWork-> isAllWorkDone() )
            return $this->allWork-> isAllWorkDone();
    }
}