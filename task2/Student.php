<?php


class Student extends Person
{

    private $score ;


    public function __construct ($name, $age , $gender, $score )
    {
        parent::__construct( $name, $age , $gender);
        $this->setScore($score);
    }

    public function showStudentInfo()
    {
        parent::showPersonInfo();
        echo "<b>Score:</b> ".$this->score."<br>" ;
    }

    public function setScore($score)
    {
        if ($score >= 2 && $score <= 6) {
            $this->score = $score;
        } else {
            $this->score = null;
        }
    }
    public function getScore()
    {
        return $this->score;
    }
}