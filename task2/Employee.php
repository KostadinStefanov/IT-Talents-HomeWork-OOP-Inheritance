<?php
/**
 * Created by PhpStorm.
 * User: Kostadin
 * Date: 29.2.2016 г.
 * Time: 22:38 ч.
 */

class Employee extends Person
{
    private $daySalary;


    public function __construct( $name, $age , $gender, $daySalary)
    {
        parent::__construct($name, $age , $gender);
        $this->daySalary = $daySalary;
    }

    public function showEmployeeInfo()
    {
        parent::showPersonInfo();
        echo "  <b>Daily salary: </b>".$this->daySalary."<br>";
    }

    public function calculateOvertime($hours)
    {

        if ($this->age >18){
            $overtimeTobePaid = $hours*1.5*($this->daySalary/8);
        }else {
            $overtimeTobePaid = 0 ;
        }

        return $overtimeTobePaid;
    }
}