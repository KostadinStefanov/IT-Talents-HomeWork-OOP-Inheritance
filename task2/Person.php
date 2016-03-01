<?php
/**
 * Created by PhpStorm.
 * User: Kostadin
 * Date: 29.2.2016 г.
 * Time: 22:24 ч.
 */

class Person

{
    protected $name;
    protected $age;
    protected $gender;


    public function __construct($name, $age, $gender)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
    }

    public function getName()
    {
        return $this->name;
    }


    public function getAge()
    {
        return $this->age;
    }

    public function getGender()
    {
        return $this->gender;
    }


    public function showPersonInfo()
    {
        echo "<b>Name: </b>" . $this->name . "<br>";
        echo "<b>Age: </b> " . $this->age . "<br>";
        echo "<b>Gender: </b> " . $this->gender . "<br>";
    }
}