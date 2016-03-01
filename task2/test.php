<?php

require_once ('autoload.php');
echo" <h3>List of people : </h3><br> ";
//Person:
$person1 = new Person("Boyko Boev", 43, "male");
$person2 = new Person("Ivan Mamalev", 17, "male");
//Student:
$student1= new Student("Gosho Staykov", 23, "male", 4);
$student2 = new Student("Moni Peshev", 20, "male", 3);
//Employee:
$employee1 = new Employee("Hasan Bayram", 24, "male", 12);
$employee2 = new Employee("Lisa Brown", 36, "female", 19);
//Initialize the people array :
$arrPeople = [];
//Put all objects into the  array
$arrPeople = [$person1, $person2, $student1, $student2, $employee1, $employee2];
//Otuput personInfo accordingly
foreach ($arrPeople as $object){
    if ( get_class($object) ==  "Person" ){
        echo "<b><u>Person:</u></b><br>";
        $object->showPersonInfo();
        echo "<br>";
    }else if (get_class($object) ==  "Student" ){
        echo "<b><u>Student:</u></b><br>";
        $object->showStudentInfo();
        echo "<br>";
    }else {
        echo "<b><u>Employee:</u></b><br>";
        $object->showEmployeeInfo();
        echo "<br>";
    }
}
//Overtime paymen output
echo "<br>";
echo" <h3>Overtime to be paid : </h3><br> ";
foreach ($arrPeople as $obj){
    if (get_class($obj) == "Employee"){
        echo "<br>";
        $obj->showEmployeeInfo();
        echo "<font color=\"red\"><i><b> Overtime payment due: $".$obj->calculateOvertime(2)." </b></i><br></font>";
    }
}